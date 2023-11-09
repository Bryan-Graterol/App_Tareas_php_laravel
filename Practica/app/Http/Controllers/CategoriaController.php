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
        $categorias = Categoria::all();
        return view('categoria.index',['categoria' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|unique:categorias|max:255',
             'color'=>'required|max:7'
        ]);

        $categoria = new Categoria;
        $categoria->nombre = $request->nombre;
        $categoria->color = $request->color;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success','Nueva categoria agregada');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.show',['categoria'=> $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $categoria)
    {
        $categorias = Categoria::find($categoria);
        $categorias->nombre = $request->nombre;
        $categorias->color = $request->color;
        $categorias->save();
        return redirect()->route('categorias.index')->with('success','Categoria Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categorias)
    {
        $categorias = Categoria::find($categorias);
        $categorias->delete();
        return redirect()->route('categoria.index')->with('success','Categoria eliminada');
    }
}
