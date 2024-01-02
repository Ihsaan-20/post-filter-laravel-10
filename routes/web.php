<?php


use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::get('/post/edit/{post_id}', [PostController::class, 'edit'])->name('post.edit');
Route::get('/post/show/{post_id}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/update/{post_id}', [PostController::class, 'update'])->name('post.update');
Route::get('/post/delete/{post_id}', [PostController::class, 'destroy'])->name('post.delete');
