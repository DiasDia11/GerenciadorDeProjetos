<?php

namespace App\Repositories;

use App\Repositories\ProjectRepository;
use App\Models\Tarefa;

class TarefaRepository extends AbstractRepository
{
    protected static $model = Tarefa::class;


    public static function add($id,$idTarefa,ProjectRepository $projectRepository)
    {
        $tarefa = self::getById($idTarefa);
        $project = $projectRepository->getById($id);

        $tarefa->projeto()->attach($project);

        return redirect()->back()->with('success', 'Tarefa associada com Sucesso!');
    }

    public static function remove(ProjectRepository $projectRepository,$id,$idTarefa)
    {
        $tarefa = self::getById($idTarefa);
        $project = $projectRepository->getById($id);

        $tarefa->projeto()->detach($project);

        return redirect()->back()->with('success', 'Tarefa dessassociada com Sucesso!');
    }

}
