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

// Auth Provider
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::prefix('admin')->group(function () {
    // Auth
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', 'RegistrasiController@index')->name('dashboard');

    Route::get('profile', 'ProfileController@show')->name('profile.show');
    Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile/edit', 'ProfileController@update')->name('profile.update');

    Route::resource('registration', 'RegistrasiController');
    
    Route::put('program/{id}/status', 'ProgramController@status')->name('program.status');
    Route::resource('program', 'ProgramController');
    Route::resource('detail-program', 'DetailProgramController');
    
    Route::resource('jadwal', 'JadwalController');

    Route::resource('diskon', 'DiskonController');

    Route::resource('tutor', 'TutorController');
    
    Route::resource('testimoni', 'TestimoniController');    

    Route::get('setting', 'SettingController@show')->name('setting.show');
    Route::get('setting/edit', 'SettingController@edit')->name('setting.edit');
    Route::put('setting/edit', 'SettingController@update')->name('setting.update');
});

// App
Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/courses', 'HomeController@courses')->name('courses');
Route::get('/course/{id}', 'HomeController@course')->name('course');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/registrasi', 'HomeController@registrasi')->name('registrasi');
Route::post('/registrasi', 'HomeController@registrasiSubmit')->name('registrasi-submit');
Route::get('/konfirmasi', 'HomeController@konfirmasi')->name('konfirmasi');