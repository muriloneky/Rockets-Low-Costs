<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotacao;
use App\Models\Lancamento;
use Brian2694\Toastr\Facades\Toastr;


class CotacaoController extends Controller
{
   public function listagem() {
    $findCotacao = Cotacao::all();

    return view("cotacao.listagem", compact("findCotacao"));
   }

   public function cadastrar(Request $request) {
    if ($request->isMethod('post')) {
        //faz validação dos dados tratamento dos mascaras dinheiro e imagem.
        $request->validate([
            'nome_do_foguete' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('imagem')) {
            //Pega a Imagem e salva na pasta foguetes
            $filenameWithExt = $request->file('imagem')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $fileNameToStore = $filename . '.' . $extension;
            $path = public_path("imagem/foguetes");
            chmod($path, 0777);
            $request->imagem->move($path, $fileNameToStore);
            $data['imagem'] = $fileNameToStore;
        }
        $data['custo_por_lancamento'] = $this->formatacaoMascaraDinheiro($data['custo_por_lancamento']);
        $data['valor_do_lancamento'] = $this->formatacaoMascaraDinheiro($data['valor_do_lancamento']);
        $data['esta_ativo'] = empty($data['esta_ativo']) ? false : true;

        Cotacao::create($data);
        Toastr::success('Dados gravados com sucesso.');

        return redirect()->route('cotacao');
    }

    //Se nao for POST mostra a listagem
    return view("cotacao.cadastrar");
   }

   public function deletar($idDoRegistro)
    {
        $busca = Cotacao::find($idDoRegistro);
        $busca->delete();
        Toastr::success('Dados deletados com sucesso.');

        return redirect()->route('cotacao');
    }

    public function editar(Request $request, $id)    {
        if ($request->method() == "PUT") {
            //Se tiver uma request pelo formulario valido pego imagem trato numeros dinheiro.
            $request->validate([
                'nome_do_foguete' => 'required',
            ]);

            $data = $request->all();
            if ($request->hasFile('imagem')) {
                //Pega a Imagem e salva na pasta foguetes
                $filenameWithExt = $request->file('imagem')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('imagem')->getClientOriginalExtension();
                $fileNameToStore = $filename . '.' . $extension;
                $path = public_path("imagem/foguetes");
                chmod($path, 0777);
                $request->imagem->move($path, $fileNameToStore);
                $data['imagem'] = $fileNameToStore;
            }
            //Formatação de numeros quebrados para formato do banco 2.0
            $data['custo_por_lancamento'] = $this->formatacaoMascaraDinheiro($data['custo_por_lancamento']);
            $data['valor_do_lancamento'] = $this->formatacaoMascaraDinheiro($data['valor_do_lancamento']);
            $data['esta_ativo'] = empty($data['esta_ativo']) ? false : true;
            $buscaRegistro = Cotacao::find($id);
            $buscaRegistro->update($data);
            Toastr::success('Dados atualizados com sucesso.');

            return redirect()->route('cotacao');
        }

        //Se nao busca dados e mostra
        $findCotacao = Cotacao::where('id', '=', $id)->first();
        return view('cotacao.atualizar', compact('findCotacao'));
    }

   public function formatacaoMascaraDinheiro($valorParaFormatar)
    {
        //Retira , por .
        $tamanho = strlen($valorParaFormatar);
        $dados = str_replace(',', '.', $valorParaFormatar);
        if ($tamanho <= 6) {
            $dados = str_replace(',', '.', $valorParaFormatar);
        } else {
            if ($tamanho >= 8 && $tamanho <= 10) {
                $retiraVirgulaPorPonto = str_replace(',', '.',   $valorParaFormatar);
                $separaPorIndice  = explode('.',  $retiraVirgulaPorPonto);
                $dados =  $separaPorIndice[0] . $separaPorIndice[1];
            }
        }

        return $dados;
    }
}
