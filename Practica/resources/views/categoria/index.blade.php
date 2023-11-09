@extends('app')

@section('contenido')
    <div class="container w-25 border p-4 mv-4">
        <div class="row mx-auto">
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('nombre')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="nombre" class="form-label">Titulo del nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="for" class="form-label">Color</label>
                    <input type="color" name="color" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Crear nueva categoria</button>
            </form>
            <div>
                @foreach ($categoria as $categorias)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a class="d-flex align-items-center gap-2"
                                href="{{ route('categorias.show', ['categoria' => $categorias->id]) }}">
                                <span class="color-container"
                                    style="background-color:{{ $categorias->color }}"></span>{{ $categorias->nombre }}
                            </a>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $categorias->id }}">Eliminar</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{$categorias->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿ Quieres eliminar la categoria ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form method="POST" action="{{route('categorias.destroy',['categoria'=>$categorias->id])}}"></form>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
