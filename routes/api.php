<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SkillsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/banners', [BannerController::class, 'index']);
Route::get('/banners/{id}', [BannerController::class, 'show']);
Route::put('/banners/{id}', [BannerController::class, 'edit']);

Route::get('/about', [AboutController::class, 'index']);
Route::get('/about/{id}', [AboutController::class, 'show']);
Route::put('/about/{id}', [AboutController::class, 'edit']);

Route::get('/projects', [ProjectsController::class, 'index']);
Route::post('/projects', [ProjectsController::class, 'store']); // Route for creating a new project
Route::get('/projects/{id}', [ProjectsController::class, 'show']); // Route for retrieving a project by ID
Route::put('/projects/{id}', [ProjectsController::class, 'update']); // Route for updating an existing project
Route::delete('/projects/{id}', [ProjectsController::class, 'destroy']); // Route for deleting a project by ID

Route::get('/skills', [SkillsController::class, 'index']);
Route::post('/skills', [SkillsController::class, 'store']);
Route::get('/skills/{id}', [SkillsController::class, 'show']);
Route::put('/skills/{id}', [SkillsController::class, 'update']);
Route::delete('/skills/{id}', [SkillsController::class, 'destroy']);


Route::post('/contact', [ContactsController::class, 'store']);
Route::get('/contact', [ContactsController::class, 'index']);
Route::delete('/contact/{id}', [ContactsController::class, 'destroy']);







