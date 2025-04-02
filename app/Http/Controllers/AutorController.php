<?php

namespace App\Http\Controllers;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listaAutor = Autor::all();
        return view('autor.index')->with('dautor', $listaAutor);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('autor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $autor=new Autor();
        $autor -> nombre=$request->get('nombre');
        $autor -> correo_electronico=$request->get('correo_electronico');
        $autor -> adscripcion=$request->get('adscripcion');
        $autor->save();
        return redirect('/autor');
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
        //
        $autor = Autor::find($id);
        return view('autor.editar')->with('autor', $autor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $autor = Autor:: find($id);
        $autor->nombre=$request ->get('nombre');
        $autor->correo_electronico=$request ->get('correo_electronico');
        $autor->adscripcion=$request ->get('adscripcion');
        $autor->save();

        return redirect('/autor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return redirect('/autor')->with('success', 'Teléfono eliminado correctamente');
    }

    public function eliminar(string $id)
    {
        $autor = Autor::findOrFail($id);
        return view('autor.delete')->with('autor', $autor);
    }
}
