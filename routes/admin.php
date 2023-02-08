<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [AdminController::class, "index"])->name('dashboard');

    // Users Routes
    Route::get("/users", [UserController::class, "index"])->name("admin.users.index");
    Route::get("/users/create", [UserController::class, "create"])->name("admin.users.create");
    Route::post("/users/store", [UserController::class, "store"])->name("admin.users.store");
    Route::get("/users/{user:username}/edit", [UserController::class, "edit"])->name("admin.users.edit");
    Route::patch("/users/{user:username}/update", [UserController::class, "update"])->name("admin.users.update");
    Route::delete("/users/{user:username}/destroy", [UserController::class, "destroy"])->name("admin.users.destroy");

    // Categories Routes
    Route::get("/categories", [CategoryController::class, "index"])->name("admin.categories.index");
    Route::get("/categories/create", [CategoryController::class, "create"])->name("admin.categories.create");
    Route::post("/categories/store", [CategoryController::class, "store"])->name("admin.categories.store");
    Route::get("/categories/{category:slug}/edit", [CategoryController::class, "edit"])->name("admin.categories.edit");
    Route::patch("/categories/{category:slug}/update", [CategoryController::class, "update"])->name("admin.categories.update");
    Route::delete("/categories/{category:slug}/destroy", [CategoryController::class, "destroy"])->name("admin.categories.destroy");

    // Movies Routes
    Route::get("/movies", [MovieController::class, "index"])->name("admin.movies.index");
    Route::get("/movies/filter", [MovieController::class, "data"])->name("admin.movies.filter");
    Route::get("/movies/create", [MovieController::class, "create"])->name("admin.movies.create");
    Route::post("/movies/store", [MovieController::class, "store"])->name("admin.movies.store");
    Route::get("/movies/{movie:slug}/edit", [MovieController::class, "edit"])->name("admin.movies.edit");
    Route::patch("/movies/{movie:slug}/update", [MovieController::class, "update"])->name("admin.movies.update");
    Route::delete("/movies/{movie:slug}/destroy", [MovieController::class, "destroy"])->name("admin.movies.destroy");
});