<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }

    protected $fillable = [
        'tarefas',
        'completed',
    ];
}
