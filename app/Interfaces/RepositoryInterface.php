<?php

declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public static function getAll();
    public static function create($data);
    public static function getById($id);
    public static function delete($id);
    public static function update($id,$attributes);
    public static function loadModel():Model;
}
