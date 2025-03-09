<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductBrand;
use App\Models\Utility;
use App\DataTables\ProductBrandDataTable;
use Illuminate\Support\Facades\Storage;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductBrandDataTable $dataTable)
    {
        if (auth()->user() && auth()->user()->isAbleTo('Manage Product Brand')) {
            return $dataTable->render('product_brand.index');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user() && auth()->user()->isAbleTo('Create Product Brand')) {

            // Validate the form
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'name' => 'required|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation for logo
            ]);

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            // Generate slug
            $slug = ProductBrand::slugs($request->name);

            // Define the upload directory
            $directory = 'themes/' . APP_THEME() . '/uploads';

            // Ensure directory exists
            $fullPath = storage_path('app/public/' . $directory);
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);  // Create directory if it doesn't exist
            }

            // Handle logo upload
            $logoUrl = asset('storage/uploads/default.jpg');  // Default logo URL if no logo uploaded
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                if ($logo->isValid()) {
                    $logoName = rand(10, 100) . '_' . time() . '_' . $logo->getClientOriginalName();
                    // Move the logo to the specified directory
                    $logoPath = $logo->move($fullPath, $logoName); // Use move() instead of storeAs
                    $logoUrl = 'storage/' . $directory . '/' . $logoName; // Public URL path
                } else {
                    return redirect()->back()->with('error', __('The uploaded logo is invalid.'));
                }
            }



            // Save to the database
            $productBrand = new ProductBrand();
            $productBrand->name = $request->name;
            $productBrand->slug = $slug;
            $productBrand->logo = $logoUrl;
            $productBrand->status = $request->status;
            $productBrand->is_popular = $request->is_popular;
            $productBrand->theme_id = APP_THEME();
            $productBrand->store_id = getCurrentStore();
            $productBrand->created_by = auth()->user()->id;
            $productBrand->save();

            return redirect()->back()->with('success', __('Product Brand successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductBrand $productBrand)
    {
        return view('product_brand.edit', compact('productBrand'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductBrand $productBrand)
    {
        if (auth()->user() && auth()->user()->isAbleTo('Edit Product Brand')) {

            // Validate incoming request
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'name' => 'required|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate logo
            ]);

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            // Define the upload directory
            $dir = 'themes/' . APP_THEME() . '/uploads';

            $productBrand = $productBrand;
            $productBrand->name = $request->name;

            $totalImageSize = 0;

            // Check if the logo file is uploaded and add its size
            if ($request->hasFile('logo')) {
                $totalImageSize += $request->file('logo')->getSize();
            }

            // Update storage limit
            $result = Utility::updateStorageLimit(auth()->user()->creatorId(), $totalImageSize);
            if ($result != 1) {
                return redirect()->back()->with('error', $result);
            }

            // Handle Logo File Upload with move()
            if ($request->hasFile('logo')) {
                $file_path = $productBrand->logo;

                // Check if the previous logo file exists, and if so, remove it
                if (!empty($file_path) && $file_path != '/storage/uploads/default.jpg' && \File::exists(base_path($file_path))) {
                    Utility::changeStorageLimit(auth()->user()->creatorId(), $file_path);
                }

                $logo = $request->file('logo');
                $fileName = rand(10, 100) . '_' . time() . '_' . $logo->getClientOriginalName();

                // Use move() to store the file
                $path = $logo->move(public_path($dir), $fileName);

                if ($path) {
                    $url = asset($dir . '/' . $fileName);  // Get public URL from the storage path
                    $productBrand->logo = $url;
                } else {
                    return redirect()->back()->with('error', __('Error saving logo.'));
                }
            } else {
                // If no logo file uploaded, use the default logo
                $url = Storage::url('uploads/default.jpg');
                $productBrand->logo = $url;
            }

            // Update other fields
            $productBrand->slug = 'brands/' . strtolower(preg_replace("/[^\w]+/", "-", $request->name));
            if (isset($request->status)) {
                $productBrand->status = $request->status;
            }
            if (isset($request->is_popular)) {
                $productBrand->is_popular = $request->is_popular;
            }
            $productBrand->theme_id = APP_THEME();
            $productBrand->store_id = getCurrentStore();
            $productBrand->created_by = auth()->user()->id;

            // Save the changes
            $productBrand->save();

            return redirect()->back()->with('success', __('Product Brand successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductBrand $productBrand)
    {
        if (auth()->user() && auth()->user()->isAbleTo('Delete Product Brand')) {
            if ($productBrand->logo !== '/storage/uploads/default.jpg' && \File::exists(base_path($productBrand->logo))) {
                Utility::changeStorageLimit(\Auth::user()->creatorId(), $productBrand->logo );
            }

            $productBrand->delete();
            return redirect()->back()->with('success', __('Product Brand delete successfully.'));

        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $productBrand = ProductBrand::find($request->id);
        if ($productBrand) {
            $productBrand->status = $request->status;
            $productBrand->save();
            $return['status'] = 'success';
            $return['message'] = __('Status change successfully.');
            return response()->json($return);
        } else {
            $return['status'] = 'error';
            $return['message'] = __('Something went wrong!!');
            return response()->json($return);
        }
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function changePopular(Request $request)
    {
        $productBrand = ProductBrand::find($request->id);

        if ($productBrand) {
            $productBrand->is_popular = $request->is_popular;
            $productBrand->save();
            $return['status'] = 'success';
            $return['message'] = __('Status change successfully.');
            return response()->json($return);
        } else {
            $return['status'] = 'error';
            $return['message'] = __('Something went wrong!!');
            return response()->json($return);
        }
    }
}
