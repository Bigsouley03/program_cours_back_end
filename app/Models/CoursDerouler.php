<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursDerouler extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'nombreHeure','objectifs','cours_enroller_id'];

    public function cours_enroller_id()
    {
        return $this->belongsTo(CoursEnroller::class, 'cours_enroller_id');
    }

    public function heureDeroule()
    {

    }
}
