@extends('plantilla.principal')

@section('titulo', 'Activos')

@section('contenido')
    
    <div class="container mt-5">

        <div class="d-flex justify-content-between mb-3">
            <h2>Lista de Activos</h2>
            <a href="{{ route('activos.create') }}" class="btn btn-primary">Agregar Activo</a>
        </div>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php($numeracion = 1)
                @foreach ($activos as $activo)
                    <tr>
                        <td>{{ $numeracion++ }}</td>
                        <td>{{ $activo->codigo }}</td>
                        <td>{{ $activo->nombre }}</td>
                        <td>{{ $activo->cantidad_inicial }}</td>
                        <td>
                            <a href="{{-- route('activos.edit', $activo->id) --}}" class="btn btn-warning btn-sm mr-2">Baja</a>
                            <a href="{{ route('activos.edit', $activo->id) }}" class="btn btn-info btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach()
                
            </tbody>
        </table>
    </div>

@endsection