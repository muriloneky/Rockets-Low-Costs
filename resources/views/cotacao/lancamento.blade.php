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
                        <form class="form" method="POST" action="{{ route('lancamento.cadastrar', $idDaCotacao) }}" >
                            @csrf
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1 class="h2">Novo Lançamento do Foguete</h1>
                            </div>
                            <div class="col-xs-3">
                                <label class="form-label">Data de Lançamento</label>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <input type="date" class="form-control @error('data_do_lancamento') is-invalid @enderror"
                                    name="data_do_lancamento">
                                @if ($errors->has('data_do_lancamento'))
                                    <div class="invalid-feedback"> {{ $errors->first('data_do_lancamento') }}</div>
                                @endif
                                </div>
                              </div>
                            <div class="form-group row mt-4">
                            
                        </div>
                            <button type="submit" class="btn btn-success">GRAVAR</button>
                        </form>
            </div>      
</x-app-layout>
