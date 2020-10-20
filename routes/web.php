<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'HomeController@index')->name('home');
Route::get('/city/{state_id}', 'CityController@index')->name('city');
Route::get('/imoveis', 'PropertyController@index')->name('property');
Route::get('/categoria/{id}-{slug}', 'PropertyController@index')->name('property.category');
Route::get('/imovel/{id}-{slug}', 'PropertyController@show')->name('property.show');
Route::post('/imovel/{id}', 'PropertyController@store')->name('property.store');
Route::get('/pagina/{id}-{slug}', 'PageController@show')->name('page');
Route::get('/contato', 'ContactController@index')->name('contact');
Route::post('/contato', 'ContactController@store')->name('contact.store');
Route::get('/blog', 'PostController@index')->name('post');
Route::get('/blog/{id}-{slug}', 'PostController@show')->name('post.show');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard.index');
        }

        redirect()->route('login');
    });

    Route::resource('dashboard', 'DashboardController');
    Route::resource('contact', 'ContactController');
    Route::resource('property-contact', 'PropertyContactController');
    Route::resource('post', 'PostController');
    Route::resource('page', 'PageController');
    Route::resource('category', 'CategoryController');
    Route::resource('banner', 'BannerController');
    Route::resource('banner-type', 'BannerTypeController');
    Route::resource('advertiser', 'AdvertiserController');
    Route::resource('broker', 'BrokerController');
    Route::resource('offer-type', 'OfferTypeController');
    Route::resource('setting', 'SettingController');

    Route::resource('enterprise', 'EnterpriseController');
    Route::resource('enterprise.photo', 'EnterprisePhotoController');
    Route::post('/enterprise/{enterprise}/photo/reorder', 'EnterprisePhotoController@reorder');

    Route::resource('feature', 'FeatureController');
    Route::resource('feature.option', 'FeatureOptionController');

    Route::resource('state', 'StateController');
    Route::resource('city', 'CityController');
    Route::resource('state.city', 'StateCityController');

    // property
    Route::resource('property', 'PropertyController');
    Route::resource('property-type', 'PropertyTypeController');
    Route::resource('property.photo', 'PropertyPhotoController');
    Route::post('/property/{property}/photo/reorder', 'PropertyPhotoController@reorder');
    Route::get('/property-copy/{id}', 'PropertyController@copy')->name('property.copy');

    Route::resource('user', 'UserController');
    Route::get('/logout', 'UserController@logout');
});

Route::get('/admin/login', 'Admin\LoginController@index')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@store')->name('admin.login');
Route::get('/login', 'Admin\LoginController@index')->name('login');
Route::post('/login', 'Admin\LoginController@store')->name('login');