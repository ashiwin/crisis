<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
	'as' => 'home',
	'uses' => 'SessionController@index'
]);


/*
 * Users
 */
Route::get('users', [
	'as' => 'users',
	'uses' => 'UserController@index'
]);

Route::get('register', [
	'as' => 'user_create',
	'uses' => 'UserController@create'
]);

Route::post('register', [
	'as' => 'user_create',
	'uses' => 'UserController@store'
]);

Route::get('users/{id}/edit', [
	'as' => 'user_edit',
	'uses' => 'UserController@edit'
]);

Route::put('users/{id}', [
	'as' => 'user_update',
	'uses' => 'UserController@update'
]);

Route::delete('users/{id}', [
	'as' => 'user_destroy',
	'uses' => 'UserController@destroy'
]);

/*
 * Sessions
 */
Route::get('login', [
	'as' => 'login',
	'uses' => 'SessionController@create'
]);

Route::post('login', [
	'as' => 'login',
	'uses' => 'SessionController@store'
]);

Route::get('logout', [
	'as' => 'logout',
	'uses' => 'SessionController@destroy'
]);

/*
 * Help
 */
Route::get('help', [
	'as' => 'help',
	'uses' => 'HomeController@help'
]);

/*
 * OAuth 2.0
 */
Route::post('oauth/access_token', 'OAuthController@postAccessToken');

Route::get('oauth/authorize', 'OAuthController@getAuthorize');

Route::post('oauth/authorize', 'OAuthController@postAuthorize');

/*
 * API
 */
Route::get('api/user', 'APIController@user');

