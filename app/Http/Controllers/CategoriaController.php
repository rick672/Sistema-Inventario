<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::all();
        // return response()->json($categorias);
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return response()->json(request()->all());
        $request->validate([
            'nombre' => 'required|string|max:25',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categorias.index')
        ->with('message', 'Categoria creada correctamente')
        ->with('status', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        // return response()->json($categoria);
        return view('admin.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // return response()->json($request->all());
        $request->validate([
            'nombre' => 'required|string|max:25',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categorias.index')
        ->with('message', 'Categoria actualizada correctamente')
        ->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
