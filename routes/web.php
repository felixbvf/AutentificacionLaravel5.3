<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\User;
Route::get('/', function () {
    return view('welcome');
});

Route::get('points', function () {
    //$users= User::all();  // Eloquent
    $users= DB::table('users')->get();  // Fluent obtiene una coleccion en laravel 5.3
    //calcula el promedio de points
    return $users->avg(function ($user) {
        return $user->points;
    });
    //Relaiza sumatoria de points
    // return $users->sum(function ($user) {
    //     return $user->points;
    // });

    //utilizando dd y filter  en una coleccion falta progra
    // dd($user->posts->filter(function ($post) {
    //     return $post->points > 10;
    // }));

});

//Authentication Routes.....
Auth::routes();// 5.3 // Route::auth(); Laravel 5.2
// $router->get('login','Auth\LoginController@showLoginForm')->name('login');
// $router->post('login','Auth\LoginController@login');
// $router->post('logout','Auth\LoginController@logout');
//
// //Registration Routes....
// $router->get('register','Auth\RegisterController@showRegistrationForm');
// $router->post('register','Auth\RegisterController@register');
//
// //Password Reset Routes....
// $router->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// $router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// $router->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// $router->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index');
