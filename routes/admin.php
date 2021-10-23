<?php


Route::get('/' , function() {
   return view('admin.index');
});

Route::resource('users', 'User\UserController');
Route::get('/users/{user}/permissions', 'User\PermissionController@create')->name('users.permissions')->middleware('can:staff-user-permissions');
Route::post('/users/{user}/permissions', 'User\PermissionController@store')->name('users.permissions.store')->middleware('can:staff-user-permissions');
Route::resource('permissions', 'PermissionController');
Route::resource('roles', 'RoleController');
