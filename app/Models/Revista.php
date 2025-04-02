<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Articulo; // Asegúrate de incluir esta línea

class Revista extends Model
{
    use HasFactory;

    protected $table = 'revistas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Nombre de los campos en la base de datos
    protected $fillable = [
        'titulo', 'ISSN', 'numero', 'anio_publicacion'
    ];

    // Relación con los artículos
    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }
}