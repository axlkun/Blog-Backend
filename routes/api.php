<?php

use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\ArticlesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('articles',[ArticlesController::class,'index']);
Route::get('articles/{article:slug}',[ArticlesController::class,'show']);
Route::get('settings',[SettingsController::class,'index']);
