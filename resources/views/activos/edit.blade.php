@extends('plantilla.principal')

@section('titulo', 'Editar activo')

@section('contenido')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Activo</div>
                    <div class="card-body">
                        <form action="{{ route('activos.update', $activo->id) }}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $activo->nombre }}" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $activo->descripcion }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection