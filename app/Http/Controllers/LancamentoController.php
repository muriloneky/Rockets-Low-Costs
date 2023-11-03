<?php

namespace App\Http\Controllers;

use App\Models\Lancamento;
use App\Models\Cotacao;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LancamentoController extends Controller
{
    
   public function cadastrar(Request $request, $idDaCotacao) {
    if ($request->isMethod('post')) {
        $data = $request->all();
        $data['esta_lancado'] = empty($data['esta_lancado']) ? false : true;
        $lancamentoCriado = Lancamento::create($data);
        $this->atrualizaCotacao($lancamentoCriado, $idDaCotacao);

        Toastr::success('Lançado com sucesso.');
        return redirect()->route('cotacao');
    }

    //Se nao for POST mostra a listagem
    return view("cotacao.lancamento", compact('idDaCotacao'));
   }

   public function atrualizaCotacao($lancamentoCriado, $idDaCotacao) {
    $data['lancamento_id'] = $lancamentoCriado->id;
    $buscaRegistro = Cotacao::find($idDaCotacao);
    $buscaRegistro->update($data);
   }
}
