<?php

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', array(
    'as'    => 'home',
    'uses'  => 'PagesController@home'
));

Route::group(array( 'prefix' => 'api/v1/' ), function(){
   Route::resource('tasks', 'ApiTasksController');
});