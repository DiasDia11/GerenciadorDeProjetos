<?php

namespace App\Http\Controllers;

use App\Repositories\TarefaRepository;
use Illuminate\Http\Request;

class TarefaController extends Controller
{

    protected $tarefaRepository;

    public function __construct(TarefaRepository $tarefaRepository)
    {
        $this->tarefaRepository = $tarefaRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string|max:255',
            'completed' => 'required|boolean',
        ]);

        $encontrarTarefa = $this->tarefaRepository->findByTarefas($request->tarefas);
        if($encontrarTarefa){
            return redirect()->route('tarefas.index')->with('denied', 'Projeto Já existe!');
        }
        $this->tarefaRepository->create($data);
        return redirect()->route('tarefas.index')->with('success', 'Projeto criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarefa = $this->tarefaRepository->getById($id);
        return view('tarefas.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'tarefas' => 'required|string|max:100',
            'completed' => 'required|boolean',
        ]);

        $this->tarefaRepository->update($id, $data);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa Atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->tarefaRepository->delete($id);
        return redirect()->route('tarefas.index')->with('success', 'Tarefa Removida Com Sucesso!');
    }
}
