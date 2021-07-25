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
Route::get('admin/member','Admin\MemberController@datamember')->middleware('IsAuth')->name('data_member');
Route::get('admin/request','Admin\MemberController@index')->middleware('IsAuth')->name('member_request');
Route::get('admin/request/{id}','Admin\MemberController@detailMember')->middleware('IsAuth')->name('member_detail');


// Cetak

Route::get('admin/cetak/{id}','Admin\MemberController@cetak')->middleware('IsAuth')->name('layout_cetak');;
Route::get('admin/detail-profile/{id}','Admin\MemberController@detail')->name('layout_detail');;

Route::put('admin/member-approve/{id}','Admin\MemberController@approve')->name('admin.member.approve');;


