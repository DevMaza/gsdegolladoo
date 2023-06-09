<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Actividade extends Model
{
    use HasFactory;
    protected $fillable=['titulo','descripcion','grupo_id','uuid','materia_id','archivo'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function entregas()
    {
        return $this->hasMany(Entregadeactividades::class, 'actividade_id');
    }

    protected function miCalificacion(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->entregas->filter(fn($entrega) => $entrega->user_id == auth()->user()->id)->first()??null,
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
            get: fn () => $this->mi_calificacion->calificacion??'NO REALIZADO',
        );
    }

    protected $appends = ['calificacion'];
}
