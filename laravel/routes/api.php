<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/aluno')->group(function(){
    Route::post('/add', [App\Http\Controllers\AlunoController::class, 'add'])->name('aluno.add');
    Route::get('/remove/{id}', [App\Http\Controllers\AlunoController::class, 'remove'])->name('aluno.remove');
    Route::post('/atualizar/{id}', [App\Http\Controllers\AlunoController::class, 'atualizar'])->name('aluno.atualizar');
}); 
Route::get('teste', function() {});