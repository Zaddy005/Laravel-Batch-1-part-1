<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        view()->composer("*",function($view){
//            $getyear = date("Y");
//            $gettoday = date("d/M/Y");
//            $view->with('getyear',$getyear)->with('gettoday',$gettoday);
//        });

        View::composer("*",function ($view){
            $getyear = date("Y");
            $gettoday = date("d/M/Y");
            $view->with('getyear',$getyear)->with('gettoday',$gettoday);
        });

        View::composer("employees.index",function($view){
            $thanks = "Thanks you for  shopping with us";
            $view->with("thanks",$thanks);
        });

        View::composer(['layouts.index','members.index'],function($view){
            $service = "Thanks you for using our service";
            $view->with("service",$service);
        });

        View::share("demo","Do you want our demo version");

    }
}
