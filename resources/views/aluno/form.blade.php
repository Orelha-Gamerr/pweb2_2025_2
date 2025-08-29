@extends('base')
@section('titulo', 'Formulário de Aluno')
@section('conteudo')
    <form action="{{ route('aluno.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="col">
                <label for="cpf">Cpf:</label>
                <input type="text" id="cpf" name="cpf" required>
            </div>
            <div class="col">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="talefone" required>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn">Salvar</button>
                    <a href="{{ url('aluno')}}">Voltar</a>
                </div>
            </div>
        </div>
    </form>

@stop