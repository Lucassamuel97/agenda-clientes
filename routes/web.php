<?php

use App\Http\Controllers\FullCalenderController;
use Illuminate\Support\Facades\Route;
use App\Mail\MensagemTesteMail;

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
    return view('bem-vindo');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

Route::get('tarefa/exportacao/{extensao}', 'App\Http\Controllers\TarefaController@exportacao')
    ->name('tarefa.exportacao');

Route::get('tarefa/exportar', 'App\Http\Controllers\TarefaController@exportar')
    ->name('tarefa.exportar');
    
Route::resource('tarefa', 'App\Http\Controllers\TarefaController')
    ->middleware('verified');

Route::get('/mensagem-teste', function() {
    return new MensagemTesteMail();
    //Mail::to('atendimento@jorgesantana.net.br')->send(new MensagemTesteMail());
    //return 'E-mail enviado com sucesso!';
});

Route::get('full-calender', [FullCalenderController::class, 'index'])->name('full-calender')->middleware('verified');
Route::post('full-calender/action', [FullCalenderController::class, 'action']);

//Rota de criação
Route::post('full-calender', [FullCalenderController::class, 'create']);
Route::put('full-calender', 'App\Http\Controllers\FullCalenderController@update')->name('FullCalender.update');
