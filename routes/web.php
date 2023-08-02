<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MailableName;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/testroute', function() {

    $data = [
        "name" => "Correo de prueba",
        "attachment" => public_path('/storage/resume.pdf')
    ];

    // The email sending is done using the to method on the Mail facade
    Mail::to('marko.rivas98@gmail.com')->send(new MailableName($data));
});
