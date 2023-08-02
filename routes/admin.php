<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\DocumentController;

Route::get('', [HomeController::class, 'index']);

Route::resource('people', PersonController::class)->names('admin.people');

Route::get('document', [DocumentController::class, 'index'])->name('admin.document.index');
Route::post('document/store', [DocumentController::class, 'store'])->name('admin.document.store');