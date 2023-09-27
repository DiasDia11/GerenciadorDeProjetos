<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    protected $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $project = $this->model->find($id);
        $project->update($data);
        return $project;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function searchAndFilter($search='', $status='')
    {
        $query = $this->model->query();

        if($search){
            $query->where('name', 'like', '%' . $search . '%');
        }

        if($status) {
            $query->where('status', $status);
        }

        return $query->get();
    }
}
