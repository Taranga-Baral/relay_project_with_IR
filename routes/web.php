<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Relay1StatusController;
use App\Http\Controllers\Relay2StatusController;
use App\Http\Controllers\Relay3StatusController;
use App\Http\Controllers\Relay4StatusController;
use App\Http\Controllers\Relay5StatusController;
use App\Http\Controllers\Relay6StatusController;
use App\Http\Controllers\Relay7StatusController;
use App\Http\Controllers\Relay8StatusController;
use App\Models\EighthRelay;
use App\Models\FifthRelay;
use App\Models\FirstRelay;
use App\Models\FourthRelay;
use App\Models\SecondRelay;
use App\Models\SeventhRelay;
use App\Models\SixthRelay;
use App\Models\ThirdRelay;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $relay1 = FirstRelay::first()->is_first_relay;
    $relay2 = SecondRelay::first()->is_second_relay;
    $relay3 = ThirdRelay::first()->is_third_relay;
    $relay4 = FourthRelay::first()->is_fourth_relay;
    $relay5 = FifthRelay::first()->is_fifth_relay;
    $relay6 = SixthRelay::first()->is_sixth_relay;
    $relay7 = SeventhRelay::first()->is_seventh_relay;
    $relay8 = EighthRelay::first()->is_eighth_relay;
    return view('dashboard',compact('relay1','relay2','relay3','relay4','relay5','relay6','relay7','relay8'));
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/dashboard#controller', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('controller_dashboard');




Route::resource('/first-relay', Relay1StatusController::class)->middleware(['auth','verified'])->names('first-relay');
Route::resource('/second-relay', Relay2StatusController::class)->middleware(['auth','verified'])->names('second-relay');
Route::resource('/third-relay', Relay3StatusController::class)->middleware(['auth','verified'])->names('third-relay');
Route::resource('/fourth-relay', Relay4StatusController::class)->middleware(['auth','verified'])->names('fourth-relay');
Route::resource('/fifth-relay', Relay5StatusController::class)->middleware(['auth','verified'])->names('fifth-relay');
Route::resource('/sixth-relay', Relay6StatusController::class)->middleware(['auth','verified'])->names('sixth-relay');
Route::resource('/seventh-relay', Relay7StatusController::class)->middleware(['auth','verified'])->names('seventh-relay');
Route::resource('/eighth-relay', Relay8StatusController::class)->middleware(['auth','verified'])->names('eighth-relay');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});



require __DIR__.'/auth.php';
