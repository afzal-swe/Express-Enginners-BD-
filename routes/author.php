<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;

Route::get('/author', function () {
    return view('backend.layouts.main');
});

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
