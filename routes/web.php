<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ContactSection;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ServicesController;
use App\Http\Controllers\frontend\ProjectsController;
use App\Http\Controllers\frontend\BlogController;


Route::group(['prefix' => '/'], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home_page')->name('home_page');
    });

    // Contact Page Route Section //
    Route::group(['prefix' => 'contact'], function () {
        Route::controller(ContactSection::class)->group(function () {
            Route::get('/', 'Contact_Section')->name('Contact.section');
        });
    });

    // About Page Route Section //
    Route::group(['prefix' => 'about'], function () {
        Route::controller(AboutController::class)->group(function () {
            Route::get('/', 'About_Section')->name('About.section');
        });
    });

    // Services Page Route Section //
    Route::group(['prefix' => 'services'], function () {
        Route::controller(ServicesController::class)->group(function () {
            Route::get('/', 'Services_Section')->name('services.section');
        });
    });

    // Projects Page Route Section //
    Route::group(['prefix' => 'projects'], function () {
        Route::controller(ProjectsController::class)->group(function () {
            Route::get('/', 'Projects_Section')->name('projects.section');
        });
    });

    // Blog Page Route Section //
    Route::group(['prefix' => 'blog'], function () {
        Route::controller(BlogController::class)->group(function () {
            Route::get('/', 'Blog_Section')->name('blog.section');
        });
    });
});
