@extends('app')

@section('contenido')
    <div class="container w-25 border p-4 mv-4">
        <div class="row mx-auto">
            <form action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('nombre')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="nombre" class="form-label">Titulo del nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $categoria->nombre }}">
                </div>
                <div class="mb-3">
                    <label for="for" class="form-label">Color</label>
                    <input type="color" name="color" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Crear nueva categoria</button>
            </form>
            <div>
                @if ($categoria->todos->count() > 0)
                    @foreach ($categoria->todos as $todo)
                        <div class="row py-1">
                            <div class="col-md-9 d-flex align-item-center">
                                <a href="{{ route('todos-edit', ['id' => $todos->id]) }}">{{ $todo->titulo }}</a>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <form action="{{ route('todos-destroy', [$todo->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    No hay tareas para esta categoria
                @endif
            </div>
        </div>
    </div>
@endsection
