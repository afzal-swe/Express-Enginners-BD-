<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserRoleController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\WebsiteSettingsController;
use App\Http\Controllers\Backend\SocialController;

Route::get('/author', function () {
    return view('backend.layouts.main');
});

// User Route Section
Route::group(['prefix' => 'user'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/create', 'User_Create')->name('user.create');
        Route::get('/view', 'User_View')->name('user.view');
        Route::post('/store', 'User_Store')->name('user.store');
        Route::get('/edit/{slug}', 'User_Edit')->name('user.edit');
        Route::post('/update/{slug}', 'User_Update')->name('user.update');
        Route::get('/delete/{slug}', 'User_Delete')->name('user.delete');
    });
});

// Manage Role Section
Route::group(['prefix' => 'manage-role'], function () {
    Route::controller(UserRoleController::class)->group(function () {
        Route::get('/', 'Manage_Role')->name('manage.role');
        Route::post('/create', 'Role_Create')->name('role.create');
        Route::get('/edit/{slug}', 'Role_edit')->name('role.edit');
        Route::post('/update/{slug}', 'Role_Update')->name('role.update');
        Route::get('/delete/{slug}', 'Role_Delete')->name('role.delete');
    });
});


Route::group(['prefix' => 'setting'], function () {

    // Notice Role Section
    Route::group(['prefix' => 'notice'], function () {
        Route::controller(NoticeController::class)->group(function () {
            Route::get('/', 'Notice')->name('notice');
            Route::post('/create', 'Notice_Create')->name('notice.create');
            Route::post('/update/{id}', 'Notice_Update')->name('notice.update');
        });
    });

    // Website Settings Role Section
    Route::group(['prefix' => 'website'], function () {
        Route::controller(WebsiteSettingsController::class)->group(function () {
            Route::get('/', 'Website_Settings')->name('website.setting');
            Route::post('/store', 'Website_Setting_Store')->name('website_setting.store');
            Route::post('/update/{id}', 'Website_Setting_Update')->name('website_setting.update');
        });
    });

    // Social Settings Role Section
    Route::group(['prefix' => 'social'], function () {
        Route::controller(SocialController::class)->group(function () {
            Route::get('/', 'Social_Section')->name('social.section');
            Route::post('/store', 'Social_Store')->name('social.store');
            Route::post('/update/{id}', 'Social_Update')->name('social.update');
        });
    });
});
