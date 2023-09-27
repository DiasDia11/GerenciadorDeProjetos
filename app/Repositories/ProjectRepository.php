<?php

namespace App\Repositories;

use App\Repositories\AbstractRepository;
use App\Models\Project;

class ProjectRepository extends AbstractRepository
{
    protected static $model = Project::class;

    public function countAll(){
        $count = self::getAll();
        return $count->count();
    }

    public function countByStatus(int $status){
        $count = self::loadModel()::query()->where('status', $status);
        return $count->count();
    }

    public function findBy($nome){
        return self::loadModel()::query()->where('name', $nome);
    }

    public function searchAndFilter($search='', $status='')
    {
        $query = self::loadModel()::query();

        if($search){
            $query->where('name', 'like', '%' . $search . '%');
        }

        if($status) {
            $query->where('status', $status);
        }

        return $query->get();
    }
}
