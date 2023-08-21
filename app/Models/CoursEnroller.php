<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursEnroller extends Model
{
    use HasFactory;
    protected $fillable = ['objectifs', 'heureTotal','heureDeroule','heureRestant','module_id','user_id','classe_id','semestre_id'];


    public function module_id()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function classe_id()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
    public function semestre_id()
    {
        return $this->belongsTo(Semestre::class, 'semestre_id');
    }





}
