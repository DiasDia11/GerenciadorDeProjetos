<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use ILLuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{

    protected static $model;

    public static function getAll()
    {
        return self::loadModel()::all();
    }

    public static function getById($id)
    {
        return self::loadModel()::query()->find($id);
    }

    public static function create($data)
    {
        return self::loadModel()::query()->create($data);
    }

    public static function update($id, $data)
    {
        return self::loadModel()::query()->where(['id' => $id])->update($data);
    }

    public static function delete($id)
    {
        return self::loadModel()::query()->where(['id' => $id])->delete();
    }

    public static function loadModel(): Model{
        return app(static::$model);
    }
}
