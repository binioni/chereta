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


Route::get('/', 'HomeController@index')->name('home');

Route::get('/notification', 'HomeController@notification')->name('notification');

Auth::routes();

Route::get('/about', 'PageController@about')->name('about');

Route::resource("posts",'PostsController')->middleware('can:manage-user');

Route::resource("company",'CompanyController')->middleware('can:manage-user');

Route::resource("catagory",'CatagoryController')->middleware('can:manage-user');

Route::resource("user",'UserController')->middleware('can:manage-user');

Route::resource("profile",'ProfileController');

Route::get('/admin', function(){
    return 'you did it man';
})->middleware(['auth','auth.admin']);

Route::get("email", "InvoiceController@sendEmail");

Route::get('/get','UserController@getCurrentUser');
Route::post('/reg','UserController@register');
Route::post('/log','UserController@login');




