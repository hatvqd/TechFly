<?php

Route::controller('auth', 'Auth\AuthController', [
    'getLogin' => 'auth.login',
    'getLogout' => 'auth.logout'
]);

Route::get('backed/users/{users}/confirm', ['as' => 'backend.users.confirm', 'uses' => 'Backend\UsersController@confirm']);
Route::resource('backend/users', 'Backend\UsersController');

Route::get('backed/pages/{pages}/confirm', ['as' => 'backend.pages.confirm', 'uses' => 'Backend\PagesController@confirm']);
Route::resource('backend/pages', 'Backend\PagesController', ['except' => ['show']]);

Route::get('backend/blog/{blog}/confirm', ['as' => 'backend.blog.confirm', 'uses' => 'Backend\BlogController@confirm']);
Route::resource('backend/blog', 'Backend\BlogController');

Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);


Route::get('backend/fileManager', ['as' => 'backend.fileManager', 'uses' => 'Backend\MediaController@fileManager']);


// Route::get('/', function () {
//     return view('welcome');
// });
