@extends('plantilla.principal')

@section('titulo', 'Crear baja')

@section('contenido')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Baja</div>
                    <div class="card-body">
                        <form action="{{ route('bajas.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Cantidad</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad" required>
                                <input type="hidden" class="form-control" id="activo_id" name="activo_id" value="{{ $activo_id }}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Motivo</label>
                                <select name="motivo" id="motivo" class="form-control">
                                    <option value="">Elegir...</option>
                                    <option value="PERDIDA">PERDIDA</option>
                                    <option value="FIN DE VIDA UTIL">FIN DE VIDA UTIL</option>
                                    <option value="DESUSO">DESUSO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection