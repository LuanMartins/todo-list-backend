<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'finalizado',
        'data_limite'
    ];

    protected function casts(): array
    {
        return [
            'finalizado' => 'boolean',
            'data_limite' => 'datetime'
        ];
    }
}
