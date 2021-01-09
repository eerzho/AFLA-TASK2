<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', \App\Http\Livewire\MainPage::class)->name('main-page');

Route::group(['prefix' => '/authors'], function () {
    Route::get('/', \App\Http\Livewire\AuthorsControl::class)->name('authors-control');
    Route::get('/{id}', \App\Http\Livewire\AuthorPage::class)->name('author-page');
});
Route::group(['prefix' => '/magazines'], function () {
    Route::get('/', \App\Http\Livewire\MagazinesControl::class)->name('magazines-control');
    Route::get('/{id}', \App\Http\Livewire\MagazinePage::class)->name('magazine-page');

});
