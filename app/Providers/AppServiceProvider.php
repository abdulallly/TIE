<?php

namespace App\Providers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function boot(){
        $day=new Carbon();
        $year=$day->format("Y");
        $years=$day->format("d-m-Y");
        view()->composer('includes.footer', function($view) use ($year){
            $view->with('year',$year);
        });
       view()->composer('pages.invoice.print', function($view) use ($years){
            $view->with('years',$years);
        });
       view()->composer('pages.invoice.print1', function($view) use ($years){
            $view->with('years',$years);
        });

    }
}
