<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Todo;

class todosController extends Controller
{
    public function store(Request $request)
    {
        # code...
        $request->validate([
            'titulo'=> 'required|min:3'
        ]);
        $todo = new Todo;
        $todo->id = $request->id;
        $todo->titulo = $request->titulo;
        $todo->save();
        return redirect()->route('todos')->with("success", "Tarea creada correctamente");
    }

    public function index()
    {
        $todos = Todo::all();
        $categorias = Categoria::all();
        return view('includes.index', ['todos' => $todos, 'categorias' => $categorias]);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return view('includes.show', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->titulo = $request->titulo;
        $todo->save();
        //return view('includes.index', ['succes', "Tarea Actualizada"]);
        return redirect()->route('todos')->with('success', 'Tarea actualizada');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Tarea eliminada');

    }
}
