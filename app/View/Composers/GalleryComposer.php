<?php
 
namespace App\View\Composers;

use App\Models\Gallery;
use App\Repositories\UserRepository;
use Illuminate\View\View;
 
class GalleryComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
 
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */

 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with('galleries', Gallery::take(4)->get());
    }
}