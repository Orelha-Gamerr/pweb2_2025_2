<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\CategoriaAluno;
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
        $categorias = CategoriaAluno::orderBy('nome')->get();

        return view('aluno.form', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => "required",
            'categoria_id' => 'required',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'nome.required' => 'O nome é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'categoria_id.required' => 'A categoria é obrigatória',
            'imagem.image' => 'O arquivo deve ser uma imagem',
            'imagem.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg, gif, svg',
        ]);
    }
    public function store(Request $request)
    {
        //dd(vars: $request->all());

        $this->validateRequest($request);
        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = 'imagem/aluno/';

            $imagem->storeAs(
                $diretorio,
                $nome_imagem,
                'public'
            );
            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Aluno::create($data);

        return redirect()->route('aluno');
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
        $dados = Aluno::findOrFail($id);
        $categorias = CategoriaAluno::orderBy('nome')->get();

        return view('aluno.form', [
            'dados' => $dados,
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all(), $id);

        $this->validateRequest($request);
        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = 'imagem/aluno/';

            $imagem->storeAs(
                $diretorio,
                $nome_imagem,
                'public'
            );
            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Aluno::updateOrCreate(['id' => $id], $data);

        return redirect('aluno');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dados = Aluno::findOrFail($id);

        $dados->delete();

        return redirect('aluno');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Aluno::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Aluno::All();
        }

        return view('aluno.list', ['dados' => $dados]);
    }
}
