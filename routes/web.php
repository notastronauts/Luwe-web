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
    Route::resource('profile', 'UserProfile');
    Route::put('profile/update-profile/{id}', 'UserProfile@updateProfile')->name('updateProfile');
    Route::put('profile/change-password/{id}', 'UserProfile@updatePassword')->name('updatePassword');
    Route::resource('myrestaurants', 'RestaurantController');
    Route::get('table-manager/{id}', 'MejaController@index')->name('table-manager.index');
    Route::get('table-manager/{id}/create', 'MejaController@create')->name('table-manager.create');
    Route::post('table-manager', 'MejaController@store')->name('table-manager.store');
    Route::post('provinces/getProvinces', 'StateAndProvinceController@ProvinceAutoComplete')->name('provinces.get');
    Route::post('cities/getCities', 'CityController@getCity')->name('cities.get');
    Route::post('sub-district/getSubDistrict', 'SubDistrictController@getSubDistrict')->name('sub-district.get');
    Route::post('postal-code/getPostalCode', 'PostalCodeController@getPostalCode')->name('postal-code.get');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dashboard', function () {
    return 'Welcome Admin!';
})->name('admin.dashboard');

