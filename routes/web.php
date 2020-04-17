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

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/profile', 'UserProfile@index')->name('profile');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dashboard', function () {
    return 'Welcome Admin!';
})->name('admin.dashboard');
