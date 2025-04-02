<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores'; // <-- Esto arregla el problema
    protected $fillable = [
        'nombre',
        'correo_electronico',
        'adscripcion',
    ];

    public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'arts_autores')->withPivot('posicion');
    }
}

