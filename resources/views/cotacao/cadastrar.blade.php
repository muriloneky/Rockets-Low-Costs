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
                    @extends('index')
                        <form class="form" method="POST" action="{{ route('cotacao.cadastrar') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1 class="h2">Criar nova Cotação</h1>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imagem do Foguete</label>
                                <input type="file" class="form-control" name="imagem">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nome do Foguete</label>
                                <input type="text" class="form-control @error('nome_do_foguete') is-invalid @enderror"
                                    name="nome_do_foguete">
                                @if ($errors->has('nome_do_foguete'))
                                    <div class="invalid-feedback"> {{ $errors->first('nome_do_foguete') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Esta Ativo?</label>
                                <input type="checkbox" name="esta_ativo" class="switch-input" value="1" {{ old('esta_ativo') ? 'checked="checked"' : '' }}/>
                            </div>
                    
                            <div class="mb-3">
                                <label class="form-label">Custo por Lançamento</label>
                                <input id='custo_por_lancamento' class="form-control @error('custo_por_lancamento') is-invalid @enderror"
                                    name="custo_por_lancamento">
                                @if ($errors->has('custo_por_lancamento'))
                                    <div class="invalid-feedback"> {{ $errors->first('custo_por_lancamento') }}</div>
                                @endif
                            </div>
                    
                            <div class="mb-3">
                                <label class="form-label">Margem para Lucro</label>
                                <input type="number" class="form-control @error('margem_para_lucro') is-invalid @enderror"
                                    name="margem_para_lucro">
                                @if ($errors->has('margem_para_lucro'))
                                    <div class="invalid-feedback"> {{ $errors->first('margem_para_lucro') }}</div>
                                @endif
                            </div>
                    
                            <div class="mb-3">
                                <label class="form-label">Valor do Lançamento</label>
                                <input id='valor_do_lancamento' class="form-control @error('valor_do_lancamento') is-invalid @enderror"
                                    name="valor_do_lancamento">
                                @if ($errors->has('valor_do_lancamento'))
                                    <div class="invalid-feedback"> {{ $errors->first('valor_do_lancamento') }}</div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success">GRAVAR</button>
                        </form>
            </div>      
</x-app-layout>
