<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Property;
use App\Services\Setting;
use App\User;
use Illuminate\Http\Request;

use Google_Client;

class DashboardController extends Controller
{

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $totalProperties = Property::query()->count();
        $totalUsers = User::query()->count();
        $totalCategories = Category::query()->count();
        $totalPosts = Post::query()->count();

        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/analytics'));

        $file = (dirname(dirname(dirname(dirname(__DIR__)))) . '/storage/app/analytics.json');

        $client->setAuthConfig($file);

        // apply the JSON file on the current client
        $client->useApplicationDefaultCredentials();

        if ($client->isAccessTokenExpired()) {
            $client->refreshTokenWithAssertion();
        }

        // an array with information about access token
        $arrayInfo = $client->getAccessToken();

        // access the access token directly
        $accesstoken = $arrayInfo['access_token'];

        $ga_id = $this->setting->getSetting('google_ga_id', 'value');

        // pass the token to the view, to be used for authentication
        return view('admin.pages.dashboard', [
            'totalProperties' => $totalProperties,
            'totalUsers' => $totalUsers,
            'totalCategories' => $totalCategories,
            'totalPosts' => $totalPosts,
            'accesstoken' => $accesstoken,
            'ga_id' => $ga_id
        ]);
    }
}