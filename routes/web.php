<?php

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

// Route::get('/', function () {
//     return redirect('home');
// });
Route::get('/', function () {
    return redirect('all-blogs');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/all-blogs', [App\Http\Controllers\PublicBlogController::class, 'index'])->name('all-blogs');

Route::middleware(['auth'])->group(function () {

    //blog routes
    Route::controller(\App\Http\Controllers\BlogController::class)->name('blogs.')->group(function () {
        Route::get('/blogs', 'index')->name('index');
        Route::get('/blogs/create', 'create')->name('create');
        Route::post('/blogs/store', 'store')->name('store');
        Route::get('/blogs/{id}/edit', 'edit')->name('edit');
        Route::put('/blogs/{id}', 'update')->name('update');
        Route::delete('/blogs/delete/{id}', 'destroy')->name('delete');
    });
});


Route::controller(\App\Http\Controllers\PublicBlogController::class)->name('all-blogs.')->group(function () {
    Route::get('/all-blogs/{id}/view', 'view')->name('view');
});

// Route::group(function () {

//     //blog routes
//     Route::controller(\App\Http\Controllers\BlogController::class)->name('all-blogs.')->group(function () {
        
//         Route::put('/all-blogs/{id}', 'index')->name('view');
//     });
// });


Auth::routes();
