<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImagGalleryController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/' ,[GuestController::class, 'index'])->name('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::controller(AuthController::class)->group(function() {
    Route::get("/login", "index")->middleware("guest");
    Route::post("/login", "login")->name("login");
    Route::get("/register", "tampilanRegister");
    Route::post("/register", "register")->name("register");
});


Route::controller(ImageController::class)->middleware("auth")->group(function() {
    Route::get('/dashboard', 'index');
    Route::get("/tambah-gambar", "tambahGambar");
    Route::post("/tambah-gambar", "create")->name("image.store");
    Route::get("/image/{id}/edit", "edit")->name("image.edit");
    Route::put("/image/{id}/edit", "update")->name("image.update");
    Route::delete("/image/{id}/delete", "delete")->name("image.destroy");
    Route::post('/likes/{id}', 'like')->name('like');
});


Route::controller(ImagGalleryController::class)->middleware("auth")->group(function() {
    Route::get("/album", "index");
    Route::post("/album", "store")->name("album.store");
    Route::get("/album/view", "album");
    Route::get("/album/detail/{title}", "show")->name("album.detail");
    Route::delete("/album/delete/{title}", "deleteAlbum")->name("album.delete");
});

Route::controller(CommentController::class)->middleware('auth')->group(function() {
    Route::get('/comment/{id}', 'index')->name('comments.index');
    Route::post('/comment/post/{id}', 'post')->name('comments.post');
});

