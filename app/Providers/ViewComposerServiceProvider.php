<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\AdminStudentsController;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     *
     */
    public $student;

    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeNavigation() {

//        view()->composer('includes.top-nav', function($view) {
//            $view->with('variable', 'value');
//        });
        view()->composer( 'includes.top-nav', 'App\Http\Composers\NavigationComposer');
    }
}
