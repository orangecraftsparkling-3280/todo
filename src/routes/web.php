<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function (){

    Route::get('/', [TodoController::class, 'index']);
    Route::post('/todos', [TodoController::class, 'store']);
    Route::patch('/todos/update', [TodoController::class, 'update']);
    Route::delete('/todos/delete', [TodoController::class, 'destroy']);
    Route::get('/todos/search', [TodoController::class, 'search']);

    Route::get('/categories',[CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::patch('/categories/update', [CategoryController::class, 'update']);
    Route::delete('/categories/delete', [CategoryController::class, 'destroy']);

    });
    Route::post('/contacts/confirm',[ContactController::class, 'confirm']);
    Route::post('/contacts',[ContactController::class, 'store']);
    Route::get('/inquiry',[ContactController::class, 'index']);
