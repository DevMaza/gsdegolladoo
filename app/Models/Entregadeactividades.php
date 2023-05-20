<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregadeactividades extends Model
{
    use HasFactory;
    protected $fillable=['uuid','archivo','calificacion','user_id','actividade_id'];
}
