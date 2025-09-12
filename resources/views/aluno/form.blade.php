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
    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        @csrf

        @if (!empty($dados->id))
            @method('put')
        @endif 

        <input type="hidden" name="id" value="{{ old('id', $dados->id ?? '' ) }}">

        <div class="row">
            <div class="col">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $dados->nome ?? '' ) }}" required>
            </div>
            <div class="col">
                <label for="cpf">Cpf:</label>
                <input type="text" id="cpf" name="cpf" value="{{ old('cpf', $dados->cpf ?? '')  }}" required>
            </div>
            <div class="col">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $dados->telefone ?? '')  }}" required>
            </div>

            <div class="col">
                <label for="categoria">Categoria</label>
                <select name="categoria_id">
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}"
                            {{ old('categoria_id', $dados->categoria_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nome }} 
                        </option>
                    @endforeach
                </select>
            </div>

            @php
                $nome_imagem = !empty($dados->imagem) ? $dados->imagem : 'sem_imagem.jpg';
            @endphp
            <div class="col">
                <label for="image">Imagem:</label>
                <img src="/storage/{{ $nome_imagem }}" width="200px" height="200px" alt="img">
                <input type="file" id="imagem" name="imagem" value="{{ old('imagem', $dados->imagem ?? '')  }}" required>
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