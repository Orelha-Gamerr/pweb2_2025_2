@extends('base')
@section('titulo', 'Listagem de Aluno')
@section('conteudo')

    <h3>Listagem de Alunos</h3>

    <div class="row">
        <div class="col">
            <form action="{{ route('aluno.search')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="tipo">Tipo:</label>
                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="cpf">CPF</option>
                            <option value="telefone">Telefone</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" placeholder="Pesquisar...">
                    </div>

                    <div class="col-md-1">
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-warning" href="{{ url('aluno/create')}}">Cadastrar</a>
                    </div>
                </div>
            </form>
            
        </div>

        
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <td>#ID</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Ação</td>
                <td>Ação</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->cpf}}</td>
                    <td>{{$item->telefone}}</td>
                    <td>Editar</td>
                    <td>
                        <form action="{{ route('aluno.destroy',$item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja remover o registro?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop