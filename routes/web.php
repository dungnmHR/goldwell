<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.layouts.default',['flag' => 'dashboard']);
    })->name('dashboard');
    Route::get('/gallery', function () {
        return view('admin.gallery',['flag' => 'gallery']);
    })->name('gallery');

    Route::prefix('user')->group(function () {
    	Route::get('/list', '\App\Http\Controllers\Admin\UserController@index')->name('list-user');
    });

    //Quản lý thông tin hệ thống
    Route::prefix('system')->group(function () {
        //quản lí trang liên kết
        Route::prefix('lien-ket')->group(function () {
            Route::get('/danh-sach', function () {
                return view('admin.system.lien-ket.link-lien-ket',['flag' => 'lien_ket']);
            })->name('danh-sach-lien-ket');
            Route::get('/them-moi', function () {
                return view('admin.system.lien-ket.them-moi',['flag' => 'lien_ket']);
            })->name('them-moi-lien-ket');
        });


    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
