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
    Route::controller(RootController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
        Route::get('/products', 'products')->name('products');
        Route::get('/products-details/{id?}', 'productDetails')->name('product.details');
        Route::get('/about', 'about')->name('about');
        Route::get('/contact', 'contact')->name('contact');
    });
    // Route::any('{catchall}', 'RootController@notfound')->where('catchall', '.*');
});

Route::group(['middleware' => ['prevent-back-history'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    Route::group(['middleware' => ['guest:admin']], function () {
        Route::controller(AuthController::class)
        ->group(function () {
            Route::get('/', 'login')->name('login');
            Route::post('/signin', 'signin')->name('signin');
            Route::get('/forgot-password', 'forgot_password')->name('forgot.password');
            Route::post('password-forgot', 'password_forgot')->name('password.forgot');
            Route::get('reset-password/{string}', 'reset_password')->name('reset.password');
            Route::post('/recover-password', 'recover_password')->name('recover.password');
        });
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        /** users */
        Route::any('user', 'UserController@index')->name('user');
        Route::get('user/create', 'UserController@create')->name('user.create');
        Route::post('user/insert', 'UserController@insert')->name('user.insert');
        Route::get('user/view/{id?}', 'UserController@view')->name('user.view');
        Route::get('user/edit/{id?}', 'UserController@edit')->name('user.edit');
        Route::patch('user/update', 'UserController@update')->name('user.update');
        Route::post('user/change-status', 'UserController@change_status')->name('user.change.status');
        Route::post('user/profile-remove', 'UserController@profile_remove')->name('user.profile.remove');
        /** users */

        /** settings */
        Route::get('settings', 'SettingsController@index')->name('settings');
        Route::post('settings/update', 'SettingsController@update')->name('settings.update');
        Route::post('settings/update/logo', 'SettingsController@logo_update')->name('settings.update.logo');
        /** settings */

        /** profile */
        Route::get('profile', 'DashboardController@profile')->name('profile');
        Route::post('profile-update', 'DashboardController@profile_update')->name('profile.update');
        /** profile */

        /** Product Category */
        Route::controller(ProductCategoryController::class)
            ->prefix('product-category')
            ->name('product_category.')
            ->group(function () {
                Route::any('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/insert', 'insert')->name('insert');
                Route::get('/edit/{id?}', 'edit')->name('edit');
                Route::patch('/update', 'update')->name('update');
                Route::post('/change-status', 'change_status')->name('change.status');
            });
        /** Product Category */
        
        /** Product */
        Route::controller(ProductController::class)
            ->prefix('product')
            ->name('product.')
            ->group(function () {
                Route::any('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/insert', 'insert')->name('insert');
                Route::get('/view/{id?}', 'view')->name('view');
                Route::get('/edit/{id?}', 'edit')->name('edit');
                Route::patch('/update', 'update')->name('update');
                Route::post('/change-status', 'change_status')->name('change.status');
                Route::post('/image-store', 'image_store')->name('image.store');
                Route::post('/image-remove', 'image_remove')->name('image.remove');
            });
        /** Product */
        
        /** Team */
        Route::controller(TeamController::class)
            ->prefix('team')
            ->name('team.')
            ->group(function () {
                Route::any('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/insert', 'insert')->name('insert');
                Route::get('/view/{id?}', 'view')->name('view');
                Route::get('/edit/{id?}', 'edit')->name('edit');
                Route::patch('/update', 'update')->name('update');
                Route::post('/change-status', 'change_status')->name('change.status');
                Route::post('/image-store', 'image_store')->name('image.store');
                Route::post('/image-remove', 'image_remove')->name('image.remove');
            });
        /** Team */

    });

    Route::get("{path}", function(){ return redirect()->route('admin.login'); })->where('path', '.+');
});