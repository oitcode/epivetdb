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
Route::get('/admin/users/filter', 'Admin\UserController@filterUsers');
Route::post('/admin/users/filter', 'Admin\UserController@filterUsers');

/* Animal */
Route::get('/admin/animal/create', 'Admin\AnimalController@showAnimalCreatePage');
Route::post('/admin/animal/create/process', 'Admin\AnimalController@animalCreateProcess');
Route::get('/admin/animal/list', 'Admin\AnimalController@listAnimals');

/* Disease */
Route::get('/admin/disease/create', 'Admin\DiseaseController@showDiseaseCreatePage');
Route::post('/admin/disease/create/process', 'Admin\DiseaseController@diseaseCreateProcess');
Route::get('/admin/disease/list', 'Admin\DiseaseController@listDiseases');

/* Status */
Route::get('/admin/status/create', 'Admin\StatusController@showStatusCreatePage');
Route::post('/admin/status/create/process', 'Admin\StatusController@statusCreateProcess');
Route::get('/admin/status/list', 'Admin\StatusController@listStatuses');

/* Address */
Route::get('/admin/address/input', 'Admin\AddressController@showAddressForm');
Route::post('/admin/address/input/process', 'Admin\AddressController@inputAddressProcess');

/*
|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
| Operator Routes
|~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
|
| Here is where you can register web routes for operator accessible pages.
|
*/


/* Dashboard */
Route::get('/dashboard', 'Operator\OperatorDashboardController@showOperatorDashboard');

/* Disease report form */
Route::get('/operator/form', 'Operator\FormController@showFormPage');
Route::post('/operator/form/process', 'Operator\FormController@processReportForm');
