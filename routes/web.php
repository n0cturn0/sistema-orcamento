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
// https://www.youtube.com/watch?v=wvd9x6dyqfQ&list=PLVSNL1PHDWvTH6zKPGTfxEdpv1sN0VbeV&index=7&ab_channel=CarlosFerreira-EspecializaTi
// https://www.youtube.com/watch?v=0t0Vs0uAEsU&ab_channel=BeerandCode
// https://www.youtube.com/watch?v=U5-P3KlArp8&ab_channel=IrebeLibrary
//https://www.youtube.com/watch?v=CI5fZZrQOd4&ab_channel=Clovon
Route::get('/operador', [\App\Http\Controllers\OperadorController::class,'index'])->name('teste');
Route::get('cliente', [\App\Http\Controllers\ClienteController::class,'index'])->name('cadastrocliente');
Route::get('marca', [\App\Http\Controllers\MarcaController::class,'index'])->name('cadastromarca');
Route::get('modelo', [\App\Http\Controllers\ModeloController::class,'index'])->name('cadastromodelo');
Route::get('servico', [\App\Http\Controllers\ServicoController::class,'index'])->name('cadastroservico');
Route::get('produto', [\App\Http\Controllers\ProdutoController::class,'index'])->name('cadastraproduto');
Route::get('/produto/remove/{id}', [\App\Http\Controllers\ProdutoController::class,'remove'])->name('removeproduto');
Route::get('telaorcamento', [\App\Http\Controllers\OrcamentoController::class,'index'])->name('telacriaorcamento');

Route::get('/', function () {
    return view('welcome');
});
//TEMPLATE BASE
Route::get('/template', function () {
    return view('template');
});

// Route::get('/cliente', function () {
//     return view('cadastrocliente');
// });


//VIEW QUE VAI LEVAR PARA O MODULO DO ORCAMENTO
Route::get('/orcamento', function () {
    return view('inicial');
});


