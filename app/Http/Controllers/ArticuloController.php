<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Revista;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Trae los artículos con revista y autores para mostrar en la tabla
        $darticulo = Articulo::with(['revista', 'autores'])->get();

        return view('articulos.index')->with('darticulo', $darticulo);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drevista = Revista::all();
        $autores = \App\Models\Autor::all(); // Obtener todos los autores existentes
    
        return view('articulos.create', compact('drevista', 'autores'));
    }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Crear el artículo
        $articulo = Articulo::create([
            'titulo' => $request->titulo,
            'pagina_inicio' => $request->pagina_inicio,
            'pagina_fin' => $request->pagina_fin,
            'anio' => $request->anio,
            'numero' => $request->numero,
            'revista_id' => $request->revista_id
        ]);

        // Recorremos y procesamos los autores
        foreach ($request->autores as $autorData) {
            if (!empty($autorData['id'])) {
                // Si el autor ya existe, simplemente lo asociamos
                $articulo->autores()->attach($autorData['id'], [
                    'posicion' => $autorData['posicion'] ?? null
                ]);
            } elseif (!empty($autorData['nombre']) && !empty($autorData['correo_electronico'])) {
                // Si es un nuevo autor, lo creamos
                $autor = \App\Models\Autor::create([
                    'nombre' => $autorData['nombre'],
                    'correo_electronico' => $autorData['correo_electronico'],
                    'adscripcion' => $autorData['adscripcion'] ?? null
                ]);

                // Luego lo asociamos al artículo
                $articulo->autores()->attach($autor->id, [
                    'posicion' => $autorData['posicion'] ?? null
                ]);
            }
        }

        return redirect('/articulo')->with('success', 'Artículo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articulo = Articulo::find($id);
        $revistas = Revista::all(); // Obtener todas las revistas disponibles
    
        if (!$articulo) {
            return redirect('/articulo')->with('error', 'Artículo no encontrado');
        }
    
        return view('articulos.edit', compact('articulo', 'revistas'));
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos que vienen del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'pagina_inicio' => 'required|integer',
            'pagina_fin' => 'required|integer',
            'revista_id' => 'required|integer',
            'anio' => 'required|integer',
            'numero' => 'required|integer',
        ]);
    
        // Encontrar el artículo
        $articulo = Articulo::find($id);
    
        if (!$articulo) {
            return redirect('/articulo')->with('error', 'Artículo no encontrado');
        }
    
        // Actualizar solo los campos que existen en la tabla
        $articulo->update([
            'titulo' => $request->titulo,
            'pagina_inicio' => $request->pagina_inicio,
            'pagina_fin' => $request->pagina_fin,
            'revista_id' => $request->revista_id,
            'anio' => $request->anio,
            'numero' => $request->numero,
        ]);
    
        return redirect('/articulo')->with('success', 'Artículo actualizado correctamente');
    }     

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->delete();
        
        return redirect('/articulo')->with('success', 'Artículo eliminado correctamente.');
    }

    public function eliminar(string $id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('articulos.delete')->with('articulo', $articulo);
    }
}
