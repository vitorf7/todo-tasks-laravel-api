<?php

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(array( 'prefix' => 'api/v1/' ), function(){
   Route::resource('tasks', 'ApiTasksController');
});