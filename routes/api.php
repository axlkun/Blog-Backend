<?php

use App\Http\Controllers\Api\ArticlesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('articles',[ArticlesController::class,'index']);
