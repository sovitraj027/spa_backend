<?php
 
namespace App\Providers;

use App\Models\Blog;
use App\View\Composers\GalleryComposer;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
 
class ViewServiceProvider extends ServiceProvider
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
        // Using class based composers...
        View::composer('frontend.*', GalleryComposer::class);
 
        // Using closure based composers...
        View::composer('frontend.*', function ($view) {
            $view->with('single_blog',Blog::where('type','blog')->with('category')->orderBy('created_at','desc')->first());
        });
    }
}