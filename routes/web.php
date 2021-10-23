<?php

Route::get('/' , function() {
    return view('welcome');
});

require 'admin.php';
