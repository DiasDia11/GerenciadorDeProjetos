<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');
        $status = $request->input('status');
        if($search || $status){
            $projects = $this->projectRepository->searchAndFilter($search, $status);
        } else {
            $projects = $this->projectRepository->getAll();
        }

        return view('projects.view', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


        $this->projectRepository->create($data);

        return redirect()->route('projects.index')->with('success', 'Projeto criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = $this->projectRepository->getById($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $this->projectRepository->update($id, $data);

        return redirect()->route('projects.index')->with('success', 'Projeto atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->projectRepository->delete($id);

        return redirect()->route('projects.index')->with('success', 'Projeto deletado!');
    }
}
