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

/**
 * Fronts page
 */
Route::get('/', ['as' => 'home', 'uses' => 'FrontController@home']);
Route::post('/contact', ['as' => 'contact', 'middleware' => 'auth', 'uses' => 'FrontController@contact']);

/**
 * Notifications actions
 */
Route::get('/notif/list', ['as' => 'list_notifs', 'middleware' => 'auth', 'uses' => 'NotificationController@list_notifications']);
Route::get('/notif/send', ['as' => 'send_notifs_page', 'middleware' => 'auth', 'uses' => 'NotificationController@send_form']);
Route::post('/notif/send', ['as' => 'send_notifs', 'middleware' => 'auth', 'uses' => 'NotificationController@send']);
Route::get('/notif/view/{id}', ['as' => 'view_notif', 'middleware' => 'auth', 'uses' => 'NotificationController@view']);
Route::post('/api/seen', ['middleware' => 'ajax', 'uses' => 'NotificationController@seen']);

/**
 * Users actions
 */
Route::get('/user/create', ['as' => 'create_user', 'middleware' => 'auth:admin', 'uses' => 'UserController@create']);
Route::post('/user/create', ['as' => 'post_create_user', 'middleware' => 'auth:admin', 'uses' => 'UserController@store']);
Route::get('/api/subordinates', ['middleware' => 'auth', 'uses' => 'UserController@subordinates']);
Route::post('/api/register', ['middleware' => 'ajax', 'uses' => 'UserController@register']);
Route::get('/api/register', function () {
    return ['error' => 'GET method is not allowed'];
});

/**
 * Groupes actions
 */
Route::get('/groupe/manage', ['as' => 'manage_groupe', 'middleware' => 'auth:admin', 'uses' => 'GroupeController@manage']);


/**
 * Authentification actions
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
]);
