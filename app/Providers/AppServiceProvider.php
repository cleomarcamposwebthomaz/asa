<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if (empty($_SERVER['HTTPS'])) {
        //     $query_string = !empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';

        //     if (!empty($query_string)) $query_string = '?' . $query_string;

        //     header("Location: https://www.{$_SERVER['HTTP_HOST']}{$query_string}");
        // }

        view()->composer('*', function (View $view) {

            $listSettings = Setting::all();
            $settings = [];

            foreach ($listSettings as $setting) {
                $settings[$setting->name] = $setting;
            }

            $view->with('appSetting', $settings);
        });
    }
}