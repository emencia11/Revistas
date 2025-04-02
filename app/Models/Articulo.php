<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'pagina_inicio', 'pagina_fin', 'anio', 'numero', 'revista_id'
    ];

    public function revista()
    {
        return $this->belongsTo(Revista::class);
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'arts_autores')
                    ->withPivot('posicion')
                    ->orderBy('pivot_posicion');
    }
}

