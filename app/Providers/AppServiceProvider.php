<?php

namespace App\Providers;



use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {

            $view->with('site', \App\Models\SiteSetting::first());
            $view->with('feedbacks ', \App\Models\Feedback::all());
            $view->with('countries', \App\Models\Country::orderBy('title')->get());
            $view->with('general', \App\Models\GeneralDetail::first());



        });
            // if(App::environment() == "production")
        // {
        //     $url = \Request::url();
        //     $check = strstr($url,"http://");
        //     if($check)
        //     {
        //        $newUrl = str_replace("http","https",$url);
        //        header("Location:".$newUrl);

        //     }
        // }
}
}
