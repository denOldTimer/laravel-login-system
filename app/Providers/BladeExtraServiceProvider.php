<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\User;

class BladeExtraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::if('hasRole', function($expression){
            if (Auth::user()) {
                if( Auth::user()->hasAnyRole($expression)){
                    return true;
                }
            }
            return false;
        });

        //
        Blade::if('impersonate', function(){
            if (session()->get('impersonate')){
                return true;
            }
            return false;
        });
    }
}
