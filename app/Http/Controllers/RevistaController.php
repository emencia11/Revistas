<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revista;

class RevistaController extends Controller
{
    public function index()
    {
        $revistas = Revista::all();
        return view('revistas.index', compact('revistas'));
    }

    public function create()
    {
        return view('revistas.create');
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'titulo' => 'required|unique:revistas',
            'ISSN' => 'required|unique:revistas',
            'numero' => 'required|integer',
            'anio_publicacion' => 'required|integer',
        ]);

        // Guardar la nueva revista
        Revista::create([
            'titulo' => $request->titulo,
            'ISSN' => $request->ISSN,
            'numero' => $request->numero,
            'anio_publicacion' => $request->anio_publicacion,
        ]);

        return redirect()->route('revistas.index')->with('success', 'Revista creada exitosamente.');
    }

    public function edit(Revista $revista)
    {
        return view('revistas.edit', compact('revista'));
    }

    public function update(Request $request, Revista $revista)
    {
        $request->validate([
            'titulo' => 'required|unique:revistas,titulo,' . $revista->id,
            'ISSN' => 'required|unique:revistas,ISSN,' . $revista->id,
            'numero' => 'required|integer',
            'anio_publicacion' => 'required|integer',
        ]);

        $revista->update($request->all());

        return redirect()->route('revistas.index')->with('success', 'Revista actualizada exitosamente.');
    }

    public function destroy(Revista $revista)
    {
        $revista->delete();
        return redirect()->route('revistas.index')->with('success', 'Revista eliminada exitosamente.');
    }

    public function verArticulos(Revista $revista)
    {
        // Obtener todos los artículos que pertenecen a la revista seleccionada
        $articulos = $revista->articulos; // Asumiendo que tienes la relación 'articulos' en el modelo Revista

        return view('revistas.articulos', compact('revista', 'articulos'));
    }
}