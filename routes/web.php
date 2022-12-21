<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::middleware('termsAccepted')->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
        Route::view('about', 'about')->name('about');
        Route::resource('users', UserController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('projects', ProjectController::class);

        Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('media/{mediaItem}/download', [MediaController::class, 'download'])->name('media.download');
        Route::delete('media/{mediaItem}/destroy', [MediaController::class, 'destroy'])->name('media.destroy');
    });

    Route::withoutMiddleware('termsAccepted')->group(function () {
        Route::get('terms', [TermsController::class, 'index'])->name('terms');
        Route::post('terms', [TermsController::class, 'store'])->name('terms.store');
    });
});

require __DIR__.'/auth.php';
