<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->post('register_token','App\Http\Controllers\Auth\AuthenticateController@register');
	$api->post('test_token','App\Http\Controllers\Auth\AuthenticateController@authenticate');
	$api->group(['middleware'=>'jwt.auth'],function ($api){
		$api->post('register','App\Http\Controllers\Auth\AuthenticateController@register');

		$api->post('add_article', 'App\Http\Controllers\Auth\ArticleController@createArticle');
		$api->post('get_article', 'App\Http\Controllers\Auth\ArticleController@getArticle');

		$api->post('add_category', 'App\Http\Controllers\Auth\CategoryController@createCategory');
		$api->post('get_category', 'App\Http\Controllers\Auth\CategoryController@getCategory');

		$api->post('register_member', 'App\Http\Controllers\Auth\MemberController@registerMember');
		$api->post('login', 'App\Http\Controllers\Auth\MemberController@login');

	});
});
