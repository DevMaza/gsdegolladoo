<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examene extends Model
{
    use HasFactory;
    protected $fillable= ['titulo','descripcion','grupo_id','materia_id'];
}
