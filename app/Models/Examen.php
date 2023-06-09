<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Examen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'examenes';

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    protected function miCalificacion(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->calificaciones->filter(fn($calificacion) => $calificacion->user_id == auth()->user()->id)->first()??null,
        );
    }

    protected function realizado(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->mi_calificacion != null
        );
    }

    protected function calificacion(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->mi_calificacion->obtenido??'NO REALIZADO',
        );
    }

    protected $appends = ['calificacion'];
}
