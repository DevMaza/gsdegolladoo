<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'calificaciones';

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
