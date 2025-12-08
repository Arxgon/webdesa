<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\VillageIdentityController;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/history', [VillageIdentityController::class, 'history'])->name('history');
Route::get('/profileArea', [VillageIdentityController::class, 'profileArea'])->name('profile-area');
Route::get('/profilePotention', [VillageIdentityController::class, 'profilePotention'])->name('profile-potention');
Route::get('/development', [VillageIdentityController::class, 'development'])->name('development');
Route::get('/stall', [VillageIdentityController::class, 'stall'])->name('stall');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::name('articles.')->group(function () {
    Route::get('/test',               [ArticleController::class, 'index'])->name('index');            // Beranda: listing artikel
    Route::get('/test/artikel',        [ArticleController::class, 'index'])->name('list');             // Alias
    Route::get('/test/artikel/{slug}', [ArticleController::class, 'show'])->name('show');              // Detail artikel

    Route::get('/test/kategori/{slug}', [ArticleController::class, 'byCategory'])->name('category');
    Route::get('/test/tag/{slug}',      [ArticleController::class, 'byTag'])->name('tag');

    Route::get('/cari', [ArticleController::class, 'search'])->name('search');

    // Komentar (opsional, bisa dibatasi ke pengguna login)
    Route::post('/test/artikel/{slug}/komentar', [ArticleController::class, 'storeComment'])
        ->name('comment.store');
});

Route::get('/test/desa', [VillageIdentityController::class, 'landing'])->name('villageidentity.landing');
Route::view('/test/docs', 'test.docs')->name('docs.test');