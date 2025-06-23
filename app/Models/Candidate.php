<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'nama', 'npm', 'umur', 'fakultas', 'prodi', 'moto', 'photo', 'visi', 'misi'
    ];
}

