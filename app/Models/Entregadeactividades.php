<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregadeactividades extends Model
{
    use HasFactory;
    protected $fillable=['uuid','archivo','calificacion','observacion','user_id','actividade_id'];

    public function actividad()
    {
        return $this->belongsTo(Actividade::class, 'actividade_id');
    }
}
