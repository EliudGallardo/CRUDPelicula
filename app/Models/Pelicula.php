<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'catalogo';

    protected $fillable = [
        'titulo',
        'descripcion',
        'genero',
        'director',
        'fecha_estreno',
    ];
}
