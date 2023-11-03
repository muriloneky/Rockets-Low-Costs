<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CotacaoController;
use App\Http\Controllers\LancamentoController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//Rota de Cotação
Route::prefix('cotacao')->group(function () {
    //->middleware verifica se o usuario esta logado
    Route::get('/', [CotacaoController::class, 'listagem'])->middleware(['auth', 'verified'])->name('cotacao');
    //Mostrar e Cadastrar Cotação
    Route::get('/cadastrar', [CotacaoController::class, 'cadastrar'])->middleware(['auth', 'verified'])->name('cotacao.cadastrar');
    Route::post('/cadastrar', [CotacaoController::class, 'cadastrar'])->middleware(['auth', 'verified'])->name('cotacao.cadastrar');
    //Excluir Cotação
    Route::get('/deletar/{id}', [CotacaoController::class, 'deletar'])->middleware(['auth', 'verified'])->name('cotacao.deletar');
    //Mostrar e Editar Cotação
    Route::get('/editar/{id}', [CotacaoController::class, 'editar'])->middleware(['auth', 'verified'])->name('cotacao.editar');
    Route::put('/editar/{id}', [CotacaoController::class, 'editar'])->middleware(['auth', 'verified'])->name('cotacao.editar');

    Route::get('/lancamento/{id}', [LancamentoController::class, 'cadastrar'])->middleware(['auth', 'verified'])->name('cotacao.lancamento');
    Route::post('/lancamento/{id}', [LancamentoController::class, 'cadastrar'])->middleware(['auth', 'verified'])->name('lancamento.cadastrar');
});

//Rota de Autenticação de usuarios
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
