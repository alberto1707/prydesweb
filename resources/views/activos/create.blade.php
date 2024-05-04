@extends('plantilla.principal')

@section('titulo', 'Crear activos')

@section('contenido')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Activo</div>
                    <div class="card-body">
                        <form action="{{ route('activos.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Cantidad inicial</label>
                                <input type="number" class="form-control" id="cantidad_inicial" name="cantidad_inicial" required>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection