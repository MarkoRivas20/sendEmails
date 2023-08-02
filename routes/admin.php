<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\EmailController;

Route::get('', [HomeController::class, 'index']);

Route::resource('people', PersonController::class)->names('admin.people');

Route::get('document', [DocumentController::class, 'index'])->name('admin.document.index');
Route::post('document/store', [DocumentController::class, 'store'])->name('admin.document.store');
Route::delete('document/{document}', [DocumentController::class, 'destroy'])->name('admin.document.destroy');
Route::get('document/deleteAllDocuments', [DocumentController::class, 'deleteAllDocuments'])->name('admin.document.deleteAllDocuments');

Route::get('email', [EmailController::class, 'index'])->name('admin.email.index');
Route::post('email/send', [EmailController::class, 'send'])->name('admin.email.send');
