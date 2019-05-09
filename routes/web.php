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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
| Admin Routes
|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
|
| Here is where you can register web routes for admin accessible pages.
|
*/

/* Dashboard */
Route::get('/admin', 'Admin\AdminDashboardController@showAdminDashboard')
    ->name('admin');

/* Users */
Route::get('/admin/listusers', 'Admin\UserController@listUsers');
Route::get('/admin/changeupw', 'Admin\UserController@changeUserPw');
Route::post('/admin/changeupw', 'Admin\UserController@changeUserPw');

/* Animal */
Route::get('/admin/animal/create', 'Admin\AnimalController@showAnimalCreatePage');
Route::post('/admin/animal/create/process', 'Admin\AnimalController@animalCreateProcess');
