<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntrycontrolController;
use App\Http\Controllers\TheDocumentController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// return view('dashboard');
Route::get('/dashboard', [TheDocumentController::class,"dashboard"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/entry",[EntrycontrolController::class,"entry"])->name("entrycontro.entry");
    Route::post("/entry",[EntrycontrolController::class,"postentry"])->name("postentry");

    // ajax calls
       Route::post('/getdocs', [TheDocumentController::class,"getdocs"])->name('getdocs');
       Route::get("/forwarddocs",[TheDocumentController::class,"forwarddocs"])->name('forwarddocs');
       Route::get("/display_data",[TheDocumentController::class,"display_data"])->name('display_data');

       Route::get("/docdetails",[TheDocumentController::class,"docdetails"])->name('docdetails');
       Route::get("/dochistory",[TheDocumentController::class,"dochistory"])->name('dochistory');
    // end
});

require __DIR__.'/auth.php';
