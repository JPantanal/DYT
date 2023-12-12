<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\EventController;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});




Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/role', [ProfileController::class, 'role'])->name('profile.role');
});

//Route::resource('chirps', ChirpController::class)
   // ->only(['index', 'store', 'update', 'destroy'])
   // ->middleware(['auth', 'verified']);


//Route::resource('chirps', ChirpController::class)
   // ->only(['index', 'store', 'update', 'destroy'])
   // ->middleware(['auth', 'verified']);

Route::get('events', [EventController::class, 'index'])->middleware(['auth', 'verified'])->name("events.index");
Route::get('tutoring/usersevents', [EventController::class, 'usersEvents'])->middleware(['auth', 'verified'])->name("events.usersEvents");
Route::get('tutoring/tutorevents', [EventController::class, 'usersEvents'])->middleware(['auth', 'verified'])->name("events.tutorEvents");

Route::get('calendar', [EventController::class, 'index']);

Route::post('/tutoring/store', [EventController::class, 'store'])->middleware(['auth', 'verified'])->name("events.store");
Route::post('/tutoring/update', [EventController::class, 'update'])->middleware(['auth', 'verified'])->name("events.update");
//Route::inertia('privacypolicy', 'privacypolicy');
Route::get('/PrivacyPolicy', function () {
    return Inertia::render('PrivacyPolicy');
})->middleware(['auth', 'verified'])->name('PrivacyPolicy');
Route::get('/TermsOfUse', function () {
    return Inertia::render('TermsOfUse');
})->middleware(['auth', 'verified'])->name('TermsOfUse');

require __DIR__.'/auth.php';
