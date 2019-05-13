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
    //Quản lý sản phẩm
    Route::prefix('san-pham')->group(function () {
        //quản lí trang liên kết
        Route::get('/tao-moi', function () {
                return view('admin.products.create',['flag' => 'p_n']);
        })->name('create-sp');

        //Thong tin trang danh muc san pham
        Route::get('/thong-tin-trang', '\App\Http\Controllers\Admin\ProductController@getInfoTrangDanhMuc')->name('thong-tin-trang');
        Route::get('/thong-tin-trang/thay-doi', '\App\Http\Controllers\Admin\ProductController@updateInfoTrangDanhMuc')
        ->name('thong-tin-trang-td');
        Route::post('/thong-tin-trang/thay-doi', '\App\Http\Controllers\Admin\ProductController@storeInfoTrangDanhMuc')
        ->name('thong-tin-trang-td');
    });

    //Quản lý quy trình
    Route::prefix('quy-trinh')->group(function () {
        //quản lí trang liên kết
        Route::get('/tao-moi', function () {
                return view('admin.quy-trinh.create',['flag' => 'quy_t_n']);
        })->name('create-qt');
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

Route::get('/home', '\App\Http\Controllers\Admin\ProductController@index')->name('home');
