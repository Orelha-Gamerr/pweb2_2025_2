@extends('base')
@section('titulo', 'Formulário de Aluno')
@section('conteudo')

    @php
        if (!empty($dados)) {
            $action = route('aluno.update', $dados->id);
        }else {
            $action = route('aluno.store');
        }
    @endphp

    <h3>Formulário de Aluno</h3>
    <form action="{{ $action }}" method="post">
        @csrf

        @if (!empty($dados->id))
            @method('put')
        @endif 

        <input type="hidden" name="id" value="{{ old('id', $dados->id ?? '' ) }}">

        <div class="row">
            <div class="col">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('id', $dados->nome ?? '' ) }}" required>
            </div>
            <div class="col">
                <label for="cpf">Cpf:</label>
                <input type="text" id="cpf" name="cpf" value="{{ old('id', $dados->cpf ?? '')  }}" required>
            </div>
            <div class="col">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="{{ old('id', $dados->telefone ?? '')  }}" required>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <button type="submit" class="btn btn-success">{{ !empty($dados->id) ? 'Atualizar' : 'Salvar' }}</button>
                    <a href="{{ url('aluno')}}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </form>

@stop