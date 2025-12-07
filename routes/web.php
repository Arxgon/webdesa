<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\VillageProfileController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/history', [VillageProfileController::class, 'history'])->name('history');
Route::get('/profile-area', [VillageProfileController::class, 'profileArea'])->name('profile-area');
Route::get('/profile-potention', [VillageProfileController::class, 'profilePotention'])->name('profile-potention');
Route::get('/development', [VillageProfileController::class, 'development'])->name('development');
Route::get('/stall', [VillageProfileController::class, 'stall'])->name('stall');

Route::get('/lang/{locale}', function ($locale) {
    // Hanya izinkan id & en
    if (! in_array($locale, ['id', 'en'])) {
        abort(404);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('lang.switch');

?>