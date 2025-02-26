<?php

namespace App\Http\Controllers;

use App\Models\GroupPage;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Store;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class AutoposterController extends Controller
{
    public function index()
    {
        dd('You R Here');
    }

    public function facebookLogin()
    {
        $groupPages = GroupPage::where('admin_id', Auth::id())->get();

        return view('product.auto-poster.facebookLogin',compact('groupPages'));
    }

    public function redirectToFacebook()
    {

        try {

//            $user = Socialite::driver('facebook')->user();
            return Socialite::driver('facebook')->scopes(['pages_show_list', 'pages_manage_posts'])->redirect();
        } catch (\Exception $e) {


            // Redirect back with an error message
            return redirect()->route('product-facebook-auto-poster')->with('error', 'Failed to login with Facebook. Please try again.');
        }

    }

    public function handleFacebookCallback_old()
    {
        $user = Socialite::driver('facebook')->user();
        $finduser = User::where('facebook_id', $user->id)->first();
        if ($finduser) {
            return redirect()->route('product-facebook-auto-poster');
        } else {

//            $newUser = User::whereId(Auth::guard('admin')->user()->id)
//                ->update([
//                    'facebook_id'=> $user->id,
//                ]);
            $newUser = User::whereId(Auth::user()->id)->update([
                'facebook_id' => $user->id,
            ]);

            return redirect()->route('product-facebook-auto-poster');
        }

    }

    public function handleFacebookCallback_old2()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            // Check if user exists
            $user = User::where('facebook_id', $facebookUser->id)->first();

            if (!$user) {
                // Create user if not exists
                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email ?? 'no-email@facebook.com',
                    'facebook_id' => $facebookUser->id,
                    'password' => bcrypt('randompassword'), // Set a dummy password
                ]);
            }

            Auth::login($user);

            // Store Facebook token for future use
            session(['facebook_access_token' => $facebookUser->token]);
            return redirect()->route('product-facebook-auto-poster')->with('success', 'Logged in with Facebook!');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $token = $facebookUser->token;

            // Check if user exists in the database
            $user = User::where('facebook_id', $facebookUser->id)->first();

            if (!$user) {
                // Create user if not exists
                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email ?? 'no-email@facebook.com',
                    'facebook_id' => $facebookUser->id,
                    'password' => bcrypt('randompassword'), // Set a dummy password
                ]);
            }

            // Log the user in
            Auth::login($user);

            // Store Facebook access token
            session(['facebook_access_token' => $token]);

            // Fetch Facebook pages
            $pages = $this->getFacebookPages($token);

            // Pass the pages to the view
            return view('product-facebook-auto-poster', compact('pages'))->with('success', 'Logged in with Facebook!');
//            return redirect()->route('product-facebook-auto-poster')->with('success', 'Logged in with Facebook!');

        } catch (\Exception $e) {
//            return redirect('/login')->with('error', 'Something went wrong! ' . $e->getMessage());
            return redirect()->route('product-facebook-auto-poster')->with('error', 'Failed to login with Facebook. Please try again.');

        }
    }
    public function storeGroupPage(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'link' => 'required|url|unique:group_pages,link',
            ]);
            GroupPage::create([
                'name' => $request->name,
                'link' => $request->link,
                'admin_id' => Auth::id(),
            ]);
            return redirect()->back()->with('success', 'Group/Page created successfully!');
        }
        $groupPages = GroupPage::where('admin_id', Auth::id())->get();


        return view('product.auto-poster.facebookLogin')
            ->with([
                'success' => 'Group or Page added successfully!',
                'groupPages' => $groupPages,
            ]);
    }


    // Fetch user pages from Facebook
    public function showPostForm()
    {
        $token = session('facebook_access_token');

        if (!$token) {
            return redirect('/login/facebook')->with('error', 'Please log in to Facebook first.');
        }

        // Fetch user pages
        $response = Http::get("https://graph.facebook.com/v18.0/me/accounts?access_token=$token");
        $pages = $response->json()['data'] ?? [];

        return view('product.auto-poster.facebookLogin', compact('pages'));
    }

    // Handle Post Submission
    public function postToSocialMedia(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'image'       => 'required|image|mimes:jpg,jpeg,png',
            'post_time'   => 'required|date',
            'platform'    => 'required',
            'page_id'     => 'required',
        ]);

        $token = session('facebook_access_token');
        if (!$token) {
            return redirect('/login/facebook')->with('error', 'Facebook login required.');
        }

        // Store image locally
        $imagePath = $request->file('image')->store('public/posts');
        $imageUrl = asset(Storage::url($imagePath));

        // Post to Facebook
        if ($request->platform === 'facebook') {
            $pageId = $request->page_id;
            $pageAccessToken = $this->getPageAccessToken($pageId, $token);

            if (!$pageAccessToken) {
                return back()->with('error', 'Failed to retrieve page token.');
            }

            $postUrl = "https://graph.facebook.com/$pageId/photos";
            $postData = [
                'message' => $request->title . "\n\n" . $request->description,
                'url'     => $imageUrl,
                'published' => false, // Schedule post
                'scheduled_publish_time' => strtotime($request->post_time),
                'access_token' => $pageAccessToken,
            ];

            $response = Http::post($postUrl, $postData);
            if ($response->successful()) {
                return back()->with('success', 'Post scheduled successfully!');
            } else {
                return back()->with('error', 'Failed to post: ' . $response->body());
            }
        }

        return back()->with('error', 'Invalid platform selected.');
    }

    // Get Page Access Token
    private function getPageAccessToken($pageId, $userToken)
    {
        $response = Http::get("https://graph.facebook.com/$pageId?fields=access_token&access_token=$userToken");
        return $response->json()['access_token'] ?? null;
    }
    // Get the Facebook Pages using the access token
    private function getFacebookPages($token)
    {
        // Fetch user pages using the token
        $response = Http::get("https://graph.facebook.com/v18.0/me/accounts?access_token=$token");

        // Return the pages or an empty array if no pages are found
        return $response->json()['data'] ?? [];
    }

}

