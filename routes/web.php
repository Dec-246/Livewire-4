<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// use :: to reference files from directories instead of classes
// 'Route/ endpoint', 'name of livewire component'
Route::livewire('/post/create', 'pages::post.create');
