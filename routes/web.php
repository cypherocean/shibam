<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    return "Cache cleared successfully";
});

Route::get('key-generate', function() {
    Artisan::call('key:generate');
    return "Key generate successfully";
});

Route::get('migrate', function() {
    Artisan::call('migrate:refresh');
    return "Database migration generated";
});

Route::get('seed', function() {
    Artisan::call('db:seed');
    return "Database seeded successfully";
});

Route::group(['namespace' => 'front'], function(){
    Route::get('/', 'RootController@index')->name('home');
});

Route::group(['middleware' => ['prevent-back-history'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    // Route::group(['middleware' => ['guest:admin']], function () {
    //     Route::get('/', 'AuthController@login')->name('login');
    //     Route::post('signin', 'AuthController@signin')->name('signin');

    //     Route::get('forget-password', 'AuthController@forget_password')->name('forget.password');
    //     Route::post('password-forget', 'AuthController@password_forget')->name('password.forget');
    //     Route::get('reset-password/{string}', 'AuthController@reset_password')->name('reset.password');
    //     Route::post('recover-password', 'AuthController@recover_password')->name('recover.password');
    // });

    // Route::group(['middleware' => ['auth:admin']], function () {
    //     Route::get('logout', 'AuthController@logout')->name('logout');

    //     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // });

    Route::get("{path}", function(){ return redirect()->route('admin.login'); })->where('path', '.+');
});