<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\FeedsController;
use App\Http\Controllers\ParserController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ExportsController;
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TempController;

Route::get('/', function () {
    return view('custom.welcome');
});

Auth::routes();

// Files for downloads
Route::get('/download/{fileName}', function ($fileName) {
    return Storage::download("tmp/{$fileName}");
})->name('download');

/*
 App routes ------
 */

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/update-database', [HomeController::class, 'updateDatabase'])->name('update-database');
Route::get('/create-presentation', [HomeController::class, 'createPresentation'])->name('create-presentation');
Route::get('/new-presentation', [HomeController::class, 'newPresentation'])->name('new-presentation');

Route::get('/teams',
    [TeamsController::class, 'index'])->name('teams.index');

Route::post('/teams',
    [TeamsController::class, 'save'])->name('teams.save');

Route::get('/feeds/for-team/{teamId}',
    [FeedsController::class, 'index'])->name('feeds.index');

Route::post('/feeds/for-team/{teamId}',
    [FeedsController::class, 'save'])->name('feeds.save');

Route::get('/parser/for-team/{teamId}',
    [ParserController::class, 'index'])->name('parser.index');

Route::post('/parser/for-team/{teamId}',
    [ParserController::class, 'parse'])->name('parser.parse');

Route::get('/offers/by-team/{teamId}',
    [OffersController::class, 'index'])->name('offers.index');

Route::post('/offers/filter',
    [OffersController::class, 'filter'])->name('offers.filter');

Route::get('/offers/by-team/{teamId}/filtered/{key}',
    [OffersController::class, 'filtered'])->name('offers.filtered');

Route::post('/offers/select-offer',
    [OffersController::class, 'selectOffer'])->name('offers.select-offer');

Route::post('/offers/select-property',
    [OffersController::class, 'selectProperty'])->name('offers.select-property');

Route::post('/exports/templates/{teamId}',
    [ExportsController::class, 'templates'])->name('exports.templates');

Route::get('/exports/test/{type?}',
    [ExportsController::class, 'test'])->name('exports.test');

Route::get('/temp',
    [TempController::class, 'index']);

Route::get('/temp/test',
    [TempController::class, 'test']);

Route::post('/exports/current/{teamId}',
    [ExportsController::class, 'current'])->name('exports.current');

Route::post('/exports/second/{teamId}',
    [ExportsController::class, 'second'])->name('exports.second');

Route::post('/exports/third/{teamId}',
    [ExportsController::class, 'third'])->name('exports.third');

Route::post('/exports/{template}/{teamId}',
    [ExportsController::class, 'export'])->name('exports.export');

Route::get('/exports/download/{fileName}', function ($fileName) {
    return Storage::download("exports/{$fileName}.pdf");
})->name('exports.download');



Route::prefix('admin')->group(function () {
    Route::middleware('is_admin')->group(function () {

        Route::get('/', [AdminHome::class, 'index'])->name('admin_home');
        Route::resource('team', TeamController::class);
        Route::resource('user', UserController::class);
    });
});

