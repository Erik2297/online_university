<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzachot extends Model
{
    use HasFactory;
    protected $table = 'zachot';
    public function subject()
    {
        return $this->belongsTo(Usubject::class);
    }
}
