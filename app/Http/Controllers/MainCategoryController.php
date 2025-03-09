<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\MainCategory;
use App\Models\Utility;
use Aws\Api\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\ShopifyConection;
use App\Models\WoocommerceConection;
use App\DataTables\MainCategoryDataTable;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(MainCategoryDataTable $dataTable)
    {
        if (auth()->user() && auth()->user()->isAbleTo('Manage Product Category'))
        {
            return  $dataTable->render('maincategory.index');
        }else{
            return redirect()->back()->with('error',__('Permission Denied.'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maincategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(auth()->user() && auth()->user()->isAbleTo('Create Product Category')) {

            // Validate the form
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'name' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            // Define the upload directory
            $directory = 'themes/' . APP_THEME() . '/uploads';

            // Ensure directory exists
            $fullPath = storage_path('app/public/' . $directory);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);  // Create directory if it doesn't exist
            }

            // Handle Image Upload
            $imageUrl = asset('storage/uploads/default.jpg');  // Default image URL if no image uploaded
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image->isValid()) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    // Move the image to the specified directory
                    $imagePath = $image->move($fullPath, $imageName);  // Use move() instead of storeAs
                    $imageUrl = 'storage/' . $directory . '/' . $imageName; // Public URL path
                } else {
                    return redirect()->back()->with('error', __('The uploaded image is invalid.'));
                }
            }

            // Handle Icon Upload
            $iconUrl = asset('storage/uploads/default.jpg');  // Default icon URL if no icon uploaded
            if ($request->hasFile('icon_image')) {
                $iconImage = $request->file('icon_image');
                if ($iconImage->isValid()) {
                    $iconName = time() . '_' . $iconImage->getClientOriginalName();
                    // Move the icon to the specified directory
                    $iconPath = $iconImage->move($fullPath, $iconName);  // Use move() instead of storeAs
                    $iconUrl = 'storage/' . $directory . '/' . $iconName;  // Public URL path
                } else {
                    return redirect()->back()->with('error', __('The uploaded icon is invalid.'));
                }
            }

            // Save to the database
            $MainCategory = new MainCategory();
            $MainCategory->name = $request->name;
            $MainCategory->slug = 'collections/' . strtolower(preg_replace("/[^\w]+/", "-", $request->name));
            $MainCategory->image_url = $imageUrl;
            $MainCategory->image_path = $imageUrl;
            $MainCategory->icon_path = $iconUrl;
            $MainCategory->trending = $request->trending;
            $MainCategory->status = $request->status;
            $MainCategory->theme_id = APP_THEME();
            $MainCategory->store_id = getCurrentStore();
            $MainCategory->save();

            return redirect()->back()->with('success', __('Category successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }







    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MainCategory $mainCategory)
    {
        return view('maincategory.edit', compact('mainCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, MainCategory $mainCategory)
    {
        if (auth()->user() && auth()->user()->isAbleTo('Edit Product Category')) {

            // Validate incoming request
            $validator = \Validator::make(
                $request->all(), [
                    'name' => 'required',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $dir = 'themes/' . APP_THEME() . '/uploads';

            $MainCategory = $mainCategory;
            $MainCategory->name = $request->name;

            $totalImageSize = 0;

            // Check if image file is uploaded
            if ($request->hasFile('image')) {
                $totalImageSize += $request->file('image')->getSize();
            }
            // Check if icon image file is uploaded
            if ($request->hasFile('icon_image')) {
                $totalImageSize += $request->file('icon_image')->getSize();
            }

            // Update storage limit
            $result = Utility::updateStorageLimit(\Auth::user()->creatorId(), $totalImageSize);
            if ($result != 1) {
                return redirect()->back()->with('error', $result);
            }

            // Handle Image File Upload with move()
            if ($request->hasFile('image')) {
                $file_path = $mainCategory->image_path;

                // Check if previous image file exists, and if so, remove it
                if (!empty($file_path) && $file_path != '/storage/uploads/default.jpg' && \File::exists(base_path($file_path))) {
                    Utility::changeStorageLimit(\Auth::user()->creatorId(), $file_path);
                }

                $image = $request->file('image');
                $fileName = rand(10, 100) . '_' . time() . "_" . $image->getClientOriginalName();

                // Using move() to store the file
                $path = $image->move(public_path($dir), $fileName);

                if ($path) {
                    $url = asset($dir . '/' . $fileName);  // Get public URL from the storage path
                    $MainCategory->image_url = $url;
                    $MainCategory->image_path = $dir . '/' . $fileName;
                } else {
                    return redirect()->back()->with('error', __('Error saving image.'));
                }
            } else {
                // If no image file uploaded, use default image
                $path['full_url'] = asset(Storage::url('uploads/default.jpg'));
                $path['url'] = Storage::url('uploads/default.jpg');
            }

            // Handle Icon Image File Upload with move()
            if ($request->hasFile('icon_image')) {
                $file_path = $mainCategory->icon_path;

                // Check if previous icon file exists, and if so, remove it
                if (!empty($file_path) && $file_path != '/storage/uploads/default.jpg' && \File::exists(base_path($file_path))) {
                    Utility::changeStorageLimit(\Auth::user()->creatorId(), $file_path);
                }

                $iconImage = $request->file('icon_image');
                $fileName = rand(10, 100) . '_' . time() . "_" . $iconImage->getClientOriginalName();

                // Using move() to store the file
                $path = $iconImage->move(public_path($dir), $fileName);

                if ($path) {
                    $url = asset($dir . '/' . $fileName);  // Get public URL from the storage path
                    $MainCategory->icon_path = $url;
                } else {
                    return redirect()->back()->with('error', __('Error saving icon image.'));
                }
            } else {
                // If no icon file uploaded, use default icon
                $paths['url'] = Storage::url('uploads/default.jpg');
            }

            // Update other category fields
            $MainCategory->slug = 'collections/' . strtolower(preg_replace("/[^\w]+/", "-", $request->name));
            $MainCategory->trending = $request->trending;
            $MainCategory->status = $request->status;
            $MainCategory->save();

            return redirect()->back()->with('success', __('Category successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainCategory $mainCategory)
    {

        if(auth()->user() && auth()->user()->isAbleTo('Delete Product Category'))
        {
            $category = $mainCategory;

            if(!empty($category)) {

                MainCategory::mainCategoryImageDelete($category);

                $subCategories = $mainCategory->subCategoryDetail;
                foreach ($subCategories as $subCategory) {
                    SubCategory::subCategoryImageDelete($subCategory);
                }

                $products = $mainCategory->product_details;
                foreach ($products as $product) {
                    Product::productImageDelete($product);
                }

                WoocommerceConection::where('module', 'category')->where('original_id', $category->id)->delete();

                ShopifyConection::where('module', 'category')->where('original_id', $category->id)->delete();

                $category->delete();


            }
            return redirect()->back()->with('success', __('Category delete successfully.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function getProductCategories()
    {
        $store_id = Store::where('id', getCurrentStore())->first();
        $productCategory = MainCategory::where('theme_id',$store_id->theme_id)->where('store_id',getCurrentStore())->get();
        $html = '<div class="col-xxl-2 col-lg-3  col-sm-4 zoom-in ">
                    <div class="cat-active overflow-hidden" data-id="0">
                    <div class="category-select h-100" data-cat-id="0">
                        <button type="button" class="btn h-100 w-100 btn-primary btn-sm active pos-product-text">'.__("All Categories").'</button>
                    </div>
                    </div>
                </div>';
        foreach($productCategory as $key => $cat){
            $dcls = 'category-select';
            $html .= ' <div class="col-xxl-2 col-lg-3  col-sm-4 zoom-in cat-list-btn">
            <div class="overflow-hidden" data-id="'.$cat->id.'">
               <div class="h-100 '.$dcls.'" data-cat-id="'.$cat->id.'">
                  <button type="button" class="btn h-100 w-100 btn-primary btn-sm pos-product-text">'.$cat->name.'</button>
               </div>
            </div>
         </div>';

        }
        return Response($html);
    }
}
