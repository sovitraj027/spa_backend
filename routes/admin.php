<?php

use App\Http\Controllers\Backend\AboutusController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CkeditorImageController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\HomePageController;
use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\RealStateController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TeamsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Backend\PopUpController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('backend')->name('admin.')->namespace('Backend')->middleware('auth')->group(function(){
    
    Route::get('/dashboard',[DashboardController::class,'index'])->name('index');
    Route::prefix('homepage')->name('homepage.')->group(function(){
        //global store for homepage
        Route::post('/store',[HomePageController::class,'store'])->name('store');
        Route::put('/update/{id}',[HomePageController::class,'update'])->name('update');
        Route::get('/delete/{id}',[HomePageController::class,'delete'])->name('delete');
        //sliders
        Route::prefix('sliders')->name('sliders.')->group(function(){
            Route::get('/list',[SliderController::class,'index'])->name('index');
            Route::get('/create',[SliderController::class,'create'])->name('create');
            Route::get('/edit/{id}',[SliderController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[SliderController::class,'update'])->name('update');
            Route::get('/delete/{id}',[SliderController::class,'delete'])->name('delete');
            Route::post('/store',[SliderController::class,'store'])->name('store');
        });

       //popup
        Route::prefix('popups')->name('popups.')->group(function(){
            Route::get('/list',[PopUpController::class,'index'])->name('index');
            Route::get('/create',[PopUpController::class,'create'])->name('create');
            Route::get('/edit/{id}',[PopUpController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[PopUpController::class,'update'])->name('update');
            Route::get('/delete/{id}',[PopUpController::class,'delete'])->name('delete');
            Route::post('/store',[PopUpController::class,'store'])->name('store');
            Route::get('changeStatus',[PopUpController::class,'changeStatus']);
        });
        
        //review
        Route::prefix('reviews')->name('reviews.')->group(function(){
            Route::get('/list',[ReviewController::class,'index'])->name('index');
            Route::get('/create',[ReviewController::class,'create'])->name('create');
            Route::get('/edit/{id}',[ReviewController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[ReviewController::class,'update'])->name('update');
            Route::get('/delete/{id}',[ReviewController::class,'delete'])->name('delete');
            Route::post('/store',[ReviewController::class,'store'])->name('store');
            Route::get('changeStatus',[ReviewController::class,'changeStatus']);
        });
        
     
        //section 1
        Route::prefix('section1')->name('section-one.')->group(function(){
            Route::get('/list',[HomePageController::class,'index'])->name('index');
            Route::get('/create',[HomePageController::class,'create'])->name('create');
            Route::get('/edit/{id}',[HomePageController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[HomePageController::class,'update'])->name('update');
            Route::get('/delete/{id}',[HomePageController::class,'delete'])->name('delete');
            Route::post('/store',[HomePageController::class,'store'])->name('store');
        });
        //section 1
        Route::prefix('section2')->name('section-two.')->group(function(){
            Route::get('/create',[HomePageController::class,'createSectionTwo'])->name('create');

        });
        Route::prefix('section3')->name('section-three.')->group(function(){
            Route::get('/create',[HomePageController::class,'createSectionThree'])->name('create');
        });
        Route::prefix('section4')->name('section-four.')->group(function(){
            Route::get('/create',[HomePageController::class,'createSectionFour'])->name('create');
        });
        Route::prefix('section5')->name('section-five.')->group(function(){
            Route::get('/create',[HomePageController::class,'createSectionFive'])->name('create');
        });



        
    });
    Route::prefix('aboutus')->name('about-us.')->group(function(){
        Route::post('store',[AboutusController::class,'store'])->name('store');
        Route::put('update/{id}',[AboutusController::class,'update'])->name('update');
        Route::get('delete/{id}',[AboutusController::class,'delete'])->name('delete');
        Route::prefix('banner')->name('banner.')->group(function(){
            Route::get('create',[AboutusController::class,'bannerCreate'])->name('create');
        });
          //section 1
          Route::prefix('section1')->name('section-one.')->group(function(){
            Route::get('/create',[AboutusController::class,'createSectionOne'])->name('create');
        });
          Route::prefix('section2')->name('section-two.')->group(function(){
            Route::get('/create',[AboutusController::class,'createSectionTwo'])->name('create');
        });
    });
    Route::prefix('teams')->name('teams.')->group(function(){
        Route::post('store',[TeamsController::class,'store'])->name('store');
    Route::put('update/{id}',[TeamsController::class,'update'])->name('update');
        Route::get('delete/{id}',[TeamsController::class,'delete'])->name('delete');
        Route::prefix('banner')->name('banner.')->group(function(){
            Route::get('create',[TeamsController::class,'bannerCreate'])->name('create');
        });
          //teams
        Route::get('create',[TeamsController::class,'teamCreate'])->name('create');
        Route::get('list',[TeamsController::class,'teamList'])->name('list');
        Route::get('edit/{id}',[TeamsController::class,'teamEdit'])->name('edit');

    });
    Route::prefix('gallery')->name('services.')->group(function(){
        Route::get('list',[ServicesController::class,'servicesList'])->name('list');
        Route::get('create',[ServicesController::class,'create'])->name('create');
        Route::get('edit/{id}',[ServicesController::class,'edit'])->name('edit');
        Route::post('store',[ServicesController::class,'store'])->name('store');
        Route::put('update/{id}',[ServicesController::class,'update'])->name('update');
        Route::get('delete/{id}',[ServicesController::class,'delete'])->name('delete');
        Route::prefix('banner')->name('banner.')->group(function(){
            Route::get('create',[ServicesController::class,'bannerCreate'])->name('create');
        });
        Route::prefix('section1')->name('section-one.')->group(function(){
            Route::get('/create',[ServicesController::class,'createSectionOne'])->name('create');
        });
        Route::prefix('section2')->name('section-two.')->group(function(){
            Route::get('/create',[ServicesController::class,'createSectionTwo'])->name('create');
        });
        Route::prefix('section3')->name('section-three.')->group(function(){
            Route::get('/create',[ServicesController::class,'createSectionThree'])->name('create');
        });

       
    });
    //gallery
    Route::post('galleries/store',[GalleryController::class,'store'])->name('gallery.store');
    Route::put('galleries/update/{id}',[GalleryController::class,'update'])->name('gallery.update');
    Route::get('galleries/edit/{id}',[GalleryController::class,'edit'])->name('gallery.edit');
    Route::get('galleries/delete/{id}',[GalleryController::class,'delete'])->name('gallery.delete');
    Route::post('galleries/delete/image/{id}',[GalleryController::class,'deleteImage'])->name('gallery.delete.image');

    Route::prefix('portfolio')->name('portfolio.')->group(function(){
        Route::post('store',[PortfolioController::class,'store'])->name('store');
        Route::put('update/{id}',[PortfolioController::class,'update'])->name('update');
        Route::get('delete/{id}',[PortfolioController::class,'delete'])->name('delete');
        Route::prefix('banner')->name('banner.')->group(function(){
            Route::get('create',[PortfolioController::class,'bannerCreate'])->name('create');
        });
        Route::prefix('categories')->name('category.')->group(function(){
            Route::get('create',[CategoryController::class,'create'])->name('create');
            Route::post('store',[CategoryController::class,'store'])->name('store');
            Route::get('edit/{id}',[CategoryController::class,'edit'])->name('edit');
            Route::put('update/{id}',[CategoryController::class,'update'])->name('update');
            Route::get('delete/{id}',[CategoryController::class,'delete'])->name('delete');
        });
        Route::prefix('realstate')->name('realstate.')->group(function(){
            Route::get('list',[RealStateController::class,'index'])->name('index');
            Route::get('create',[RealStateController::class,'create'])->name('create');
            Route::post('store',[RealStateController::class,'store'])->name('store');
            Route::get('edit/{id}',[RealStateController::class,'edit'])->name('edit');
            Route::put('update/{id}',[RealStateController::class,'update'])->name('update');
            Route::get('delete/{id}',[RealStateController::class,'delete'])->name('delete');
            Route::post('delete/image/{id}',[RealStateController::class,'deleteImage'])->name('delete.image');
        });


    });
    Route::prefix('blog/category')->name('blog-categories.')->group(function(){
        Route::get('list',[BlogCategoryController::class,'index'])->name('index');
        Route::get('create',[BlogCategoryController::class,'create'])->name('create');
        Route::post('store',[BlogCategoryController::class,'store'])->name('store');
        Route::get('edit/{id}',[BlogCategoryController::class,'edit'])->name('edit');
        Route::put('update/{id}',[BlogCategoryController::class,'update'])->name('update');
        Route::get('delete/{id}',[BlogCategoryController::class,'delete'])->name('delete');
    });
    Route::prefix('blog')->name('blog.')->group(function(){
        Route::get('banner',[BlogController::class,'banner'])->name('banner');
        Route::get('list',[BlogController::class,'index'])->name('index');
        Route::get('create',[BlogController::class,'create'])->name('create');
        Route::post('store',[BlogController::class,'store'])->name('store');
        Route::get('edit/{id}',[BlogController::class,'edit'])->name('edit');
        Route::put('update/{id}',[BlogController::class,'update'])->name('update');
        Route::get('delete/{id}',[BlogController::class,'delete'])->name('delete');
        
    });

    Route::prefix('contactus')->name('contact.')->group(function(){
        Route::get('banner',[ContactController::class,'banner'])->name('banner');
        Route::get('contacts',[ContactController::class,'contacts'])->name('contacts');
        Route::post('store',[ContactController::class,'store'])->name('store');
        Route::get('section-one',[ContactController::class,'sectionOne'])->name('section-one');
        Route::put('update/{id}',[ContactController::class,'update'])->name('update');
        Route::get('delete/{id}',[ContactController::class,'delete'])->name('delete');
        
    });

    Route::prefix('settings')->name('settings.')->group(function(){
        Route::get('index',[SettingController::class,'index'])->name('index');
        Route::post('store',[SettingController::class,'store'])->name('store');
        Route::put('update',[SettingController::class,'update'])->name('update');
        Route::get('delete/{id}',[SettingController::class,'delete'])->name('delete');

    });

    Route::prefix('gift')->name('client.')->group(function(){
        Route::get('/bookings',[ClientController::class,'bookingList'])->name('bookings');
        Route::get('/booking/{id}',[ClientController::class,'deleteBooking'])->name('deleteBooking');
        Route::get('/list',[ClientController::class,'index'])->name('index');
        Route::get('/create',[ClientController::class,'create'])->name('create');
        Route::get('/edit/{id}',[ClientController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[ClientController::class,'update'])->name('update');
        Route::get('/delete/{id}',[ClientController::class,'delete'])->name('delete');
        Route::post('/store',[ClientController::class,'store'])->name('store');
    });
    Route::prefix('package')->name('package.')->group(function(){
        Route::get('/list',[PackageController::class,'index'])->name('index');
        Route::get('/bookings',[PackageController::class,'bookingList'])->name('bookings');
        Route::get('/create',[PackageController::class,'create'])->name('create');
        Route::get('/edit/{id}',[PackageController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[PackageController::class,'update'])->name('update');
        Route::get('/delete/{id}',[PackageController::class,'delete'])->name('delete');
        Route::post('/store',[PackageController::class,'store'])->name('store');
        Route::prefix('category')->name('category.')->group(function(){
       
            Route::get('/edit/{id}',[PackageController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[PackageController::class,'updateCategory'])->name('update');
            Route::get('/delete/{id}',[PackageController::class,'deleteCategory'])->name('delete');
            Route::post('/store',[PackageController::class,'storeCategory'])->name('store');
    
        });
    });


    Route::post('image',[ImageController::class,'ckImage']);
    Route::post('dropzone/image',[ImageController::class,'dropZoneImage']);
    Route::post('delete/dropzone/image',[ImageController::class,'deleteImage'])->name('delete.image');

    //send image


    //booking



   

});
