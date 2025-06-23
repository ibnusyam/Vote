<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'nama', 'nim', 'status'];


     public function candidate() // <--- MAKE SURE THIS METHOD EXISTS AND IS SPELLED CORRECTLY
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}
