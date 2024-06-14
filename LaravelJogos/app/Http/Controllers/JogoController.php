<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;

class JogoController extends Controller
{
    public function index()
    {
        $jogos = Jogo::all();
        return view('jogos.index', compact('jogos'));
    }

    public function create()
    {
        return view('jogos.create');
    }

    public function store(Request $request)
    {
        $request->validade([
            'nome' => 'required|max:255',
            'empresa' => 'required|empresa|unique:jogos',
            'genero' => 'required|genero|unique:jogos',
            'indicacao' => 'required|indicacao|unique:jogos'
        ]);

        Jogo::create($request->all());

        return redirect()->route('jogos.index')
                         ->with('success', 'Jogo cadastrado com sucesso');
    }

    public function show(string $id)
    {
        $jogo = Jogo::findOrFail($id);
        return view('jogos.show', compact('jogo'));
    }

    public function edit(string $id)
    {
        $jogo = Jogo::findOrFail($id);
        return view('jogos.edit', compact('jogo'));
    }

    public function update(Request $request, $id)
    {
        $request->validade([
            'nome' => 'required|max:255',
            'empresa' => 'required|empresa|unique:jogos,empresa,' . $id,
            'genero' => 'required|genero|unique:jogos,genero,' . $id,
            'indicacao' => 'required|indicacao|unique:jogos,indicacao,' . $id
        ]);

        Jogo::create($request->all());

        return redirect()->route('jogos.index')
                         ->with('success', 'Jogo atualizado com sucesso');
    }

    public function delete($id)
    {
        $jogo = Jogo::findOrFail($id);
        return view('jogos.delete', compact('jogo'));
    }

    public function destroy(string $id)
    {
        $jogo = Jogo::findOrFail($id);
        $jogo->delete();

        return redirect()->route('jogos.index')
                        ->with('success', 'Jogo deletado com sucesso');
    }
}
