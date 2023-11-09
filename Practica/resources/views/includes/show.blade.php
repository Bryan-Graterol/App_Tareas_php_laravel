@extends('app')
@section('contenido')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('todos-update',['id'=> $todo->id]) }}" method="POST">
            @method('PATCH')
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif

            @error('titulo')
                <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo de la Tarea</label>
                <input type="text" name="titulo" class="form-control" value="{{$todo->titulo}}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar tareas</button>
        </form>


    </div>
@endsection
