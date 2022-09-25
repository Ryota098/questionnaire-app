<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //この行を追加
use Illuminate\Support\Facades\URL;    //この行を追加
use Illuminate\Support\Facades\Auth;


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
        Schema::defaultStringLength(191);   //この行を追加
        URL::forceScheme('https');          //この行を追加   
        
        view()->composer('*', function($view) {

            $user= Auth::user();

            $view->with('user', $user);
        });
    }
}
