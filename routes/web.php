<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno', [AlunoController::class, 'index']);

/*
Route::get('/aluno', function () {
    return view('aluno.list');
});
*/
