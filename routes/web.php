<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AuthController@index')->middleware('IsDashboard')->name('login_form');
Route::post('/login', 'AuthController@login')->name('login_submit');
Route::get('/logout', 'AuthController@logout')->middleware('IsAuth')->name('logout');

Route::prefix('admin')->name('admin.')->middleware('IsAuth')->group(function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/', 'Admin\AdminController@index')->name('index');
        Route::get('/edit/{id}', 'Admin\AdminController@edit')->name('edit');
        Route::delete('/delete/{id}', 'Admin\AdminController@delete')->name('delete');
        Route::post('/update/{id}', 'Admin\AdminController@update')->name('update');
        Route::get('/add', 'Admin\AdminController@add')->name('add');
        Route::post('/store', 'Admin\AdminController@store')->name('store');
    });
    Route::prefix('member')->name('member.')->group(function(){
        Route::get('/', 'Admin\MemberController@index')->name('index');
        Route::get('/edit/{id}', 'Admin\MemberController@edit')->name('edit');
        Route::get('/show/{id}', 'Admin\MemberController@show')->name('show');
        Route::delete('/delete/{id}', 'Admin\MemberController@delete')->name('delete');
        Route::post('/update', 'Admin\MemberController@update')->name('update');
        Route::get('/add', 'Admin\MemberController@add')->name('add');
        Route::post('/store', 'Admin\MemberController@store')->name('store');
    });
});
// Regsiter
Route::get('register','Member\RegisterController@register')->name('register_form');
Route::post('register','Member\RegisterController@create')->name('register_submit');

// wilayah
Route::post('/kabupaten','Service\WilayahController@kabupaten')->name('kabupaten');
Route::post('/kecamatan','Service\WilayahController@kecamatan')->name('kecamatan');
Route::post('/kelurahan','Service\WilayahController@kelurahan')->name('kelurahan');

// admin
Route::get('admin','Admin\AdminPageController@beranda')->middleware('IsAuth')->name('beranda');

// Member
// Route::get('admin/member','Admin\MemberController@datamember')->middleware('IsAuth')->name('data_member');
Route::delete('admin/member-delete/{id}','Admin\MemberController@delete')->middleware('IsAuth')->name('admin.member.delete');
Route::get('admin/request','Admin\MemberController@index')->middleware('IsAuth')->name('member_request');
Route::get('admin/request/{id}','Admin\MemberController@detailMember')->middleware('IsAuth')->name('member_detail');


// Cetak

Route::get('admin/cetak/{id}','Admin\MemberController@cetak')->middleware('IsAuth')->name('layout_cetak');;
Route::get('admin/detail-profile/{id}','Admin\MemberController@detail')->name('layout_detail');;

Route::put('admin/member-approve/{id}','Admin\MemberController@approve')->name('admin.member.approve');;


