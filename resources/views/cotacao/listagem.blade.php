<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cotação') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
        {{-- Extends da Index --}}
        @extends('index')
        
        <a type="button" href="{{ route("cotacao.cadastrar") }}" class="btn btn-success float-center">
            Cadastrar Nova Cotação
        </a>

        <div>
            <div class="table-responsive mt-4">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>Ativo</th>
                                <th>Custo Lançamento</th>
                                <th>Margem</th>
                                <th>Valor</th>
                                <th>Data Lançamento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($findCotacao->isEmpty())
                            <p style="color: red">Nenhuma Cotação cadastrada.</p>
                            @else
                            @foreach ($findCotacao as $cotacao)
                                <tr>
                                    <td>
                                        <div class="form-group row">
                                            <div class="card" style="width: 6rem;">
                                                <img src="{{ '/imagem/foguetes/' .  $cotacao->imagem  }}"
                                                    class="card-img-top">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $cotacao->nome_do_foguete }}</td>
                                    <td>{{ $cotacao->esta_ativo == false ? "Nao" : "Sim" }}</td>
                                    <td>{{ $cotacao->custo_por_lancamento }}</td>
                                    <td>{{ $cotacao->margem_para_lucro }}</td>
                                    <td>{{ $cotacao->valor_do_lancamento }}</td>
                                    <td>
                                        @if (!empty($cotacao->lancamento->data_do_lancamento))
                                            <span class="badge bg-danger">{{ $cotacao->lancamento->data_do_lancamento }}</span>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        <a href="{{ route("cotacao.editar", $cotacao->id ) }}" class="btn btn-light btn-sm">
                                            Editar
                                        </a>
                                        <a href="{{ route("cotacao.deletar", $cotacao->id ) }}" class="btn btn-light btn-sm">
                                            Excluir
                                        </a>

                                        @if (empty($cotacao->lancamento->data_do_lancamento))
                                        <a href="{{ route("cotacao.lancamento", $cotacao->id ) }}" class="btn btn-success btn-sm">
                                            Lançar Foquete
                                        </a>
                                        @endif
                                       
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
       
</x-app-layout>
