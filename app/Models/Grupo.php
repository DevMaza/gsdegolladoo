<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable=['grado','periodo'];

    public function examenes()
    {
        return $this->hasMany(Examen::class);
    }

    public function actividades()
    {
        return $this->hasMany(Actividade::class, 'grupo_id');
    }

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }
}
