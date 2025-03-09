<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Http\Requests\UserPhoto\SavePhoto;
use App\Models\UserPhoto;
use App\Models\AdminPhoto;


class PhotoEditorController extends Controller
{
    public function index(){

      if (Auth::user()->id) {

//         $user_id = Auth::guard('admin')->user()->id;
          $user_id = Auth::user()->id;
         $photos = AdminPhoto::where('admin_id',$user_id)->get();

      }else{

         $user_id = auth()->user()->id;
         $photos = UserPhoto::where('user_id',$user_id)->get();

      }

        return view('photo_editor.index',compact('photos'));

    }


    public function savePhoto(Request $request)
    {
        // Get the user ID
        $user_id = auth()->user()->id;

        // Check if there is a Base64 encoded photo in the request
        if ($request->has('photo')) {
            // Get the Base64 encoded image string
            $image = $request->input('photo');

            // Make sure to extract the image data without the Base64 prefix
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image); // Ensure there are no spaces
            $imageData = base64_decode($image);

            // Generate a unique file name
            $fileName = Str::random(10) . '_' . $user_id . '.png';

            // Define the path to save the image (in the user's directory)
            $path = public_path("storage/users/$user_id/uploads/editor");

            // Ensure the directory exists, if not, create it
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true);
            }

            // Save the image to the file system
            file_put_contents($path . '/' . $fileName, $imageData);

            // Save the photo path in the database
            $photoPath = 'storage/users/' . $user_id . '/uploads/editor/' . $fileName;

            // Check if the user is an admin and store data accordingly
            if (Auth::user()->id) {
                // Save admin photo data
                $data = array(
                    'admin_id' => $user_id,
                    'photo'    => $photoPath,
                );
                AdminPhoto::create($data);
            } else {
                // Save user photo data
                $data = array(
                    'user_id' => $user_id,
                    'photo'   => $photoPath,
                );
                UserPhoto::create($data);
            }

            // Flash success message to the session and redirect back to the photo editor page
            return redirect()->route('product-photo-editor')->with('success', 'Image saved successfully');
        }

        // Return error response if no image data was found
        return redirect()->route('product-photo-editor')->with('error', 'No photo data found');
    }




    public function savePhoto_success(Request $request)
    {
        $user_id = auth()->id();

        // Decode Base64 image
        $image = $request->input('photo');
        if (!$image) {
            return back()->with('error', 'No image data received.');
        }

        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageData = base64_decode($image);

        // Generate filename and save
        $fileName = Str::random(10) . '_' . $user_id . '.png';
        $filePath = "users/$user_id/" . $fileName;
        Storage::disk('public')->put($filePath, $imageData);

        // Save to database
        $data = [
            'user_id' => $user_id,
            'photo' => 'storage/' . $filePath,
        ];
        UserPhoto::create($data);

        return back()->with('success', 'Image saved successfully!');
    }


    public function deletePhoto($id){


      if (Auth::guard('admin')) {


        $photo = AdminPhoto::whereId($id)->first();


      }else{

        $photo = UserPhoto::whereId($id)->first();


      }

    if (isset($photo)) {

      $photo->delete();
      #chechk image and remove it
      $image_path = public_path($photo->photo);
      if(file_exists($image_path) && $photo->photo != NULL){
        unlink($image_path);
      }

      return response()->json(['message' => 'Photo delete successfully']);

    }else{

      return response()->json(['message' => 'Photo not Found']);

    }


    }
}
