<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

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


Auth::routes(['register' => false,'login' => false]);

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');


    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        /**
         * User Routes
         */

       
        Route::get('index', 'StudentsController@index')->name('students.index');
        Route::get('student/{id}', 'StudentsController@allow')->name('students.all');

        
        Route::get('try', 'StudentsController@try')->name('students.try');
        Route::get('trial', 'StudentsController@trial')->name('students.trial');

       
         
        Route::group(['prefix' => 'students'], function() {
            Route::get('/create', 'StudentsController@create')->name('students.create');
            Route::post('/create', 'StudentsController@store')->name('students.store');
            Route::get('/show/{id}', 'StudentsController@show')->name('students.show');
            Route::get('/edit/{id}', 'StudentsController@edit')->name('students.edit');
            Route::patch('/{student}/update', 'StudentsController@update')->name('students.update');
            Route::delete('/delete/{id}', 'StudentsController@destroy')->name('students.destroy');
         });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});