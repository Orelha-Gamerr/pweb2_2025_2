<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Aluno::All();

        return view('aluno.list', ['dados' => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aluno.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(vars: $request->all());

        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:alunos,cpf',
        ],[
            'nome.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'Já existe um aluno com este CPF',
        ]);

        Aluno::create($request->all());

        return redirect()->route('aluno.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
