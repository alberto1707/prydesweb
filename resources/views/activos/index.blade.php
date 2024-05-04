@extends('plantilla.principal')

@section('titulo', 'Activos')

@section('contenido')
    
    <div class="container mt-5">

        <div class="d-flex justify-content-between mb-3">
            <h2>Lista de Activos</h2>
            <a href="{{ route('activos.create') }}" class="btn btn-primary">Agregar Activo</a>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar...">
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
            <tbody id="tablaActivos">
                @php($numeracion = 1)
                @foreach ($activos as $activo)
                    <tr>
                        <td>{{ $numeracion++ }}</td>
                        <td>{{ $activo->codigo }}</td>
                        <td>{{ $activo->nombre }}</td>
                        @php($total_bajas = 0)
                        @foreach ($bajas as $baja)
                            @if ($activo->id == $baja->activo_id)
                                @php($total_bajas += $baja->cantidad)
                            @endif
                        @endforeach
                        <td>{{ $activo->cantidad_inicial - $total_bajas }}</td>
                        <td>
                            <a href="{{ route('bajas.create', ['activo_id' => $activo->id]) }}" class="btn btn-warning btn-sm mr-2">Baja</a>
                            <a href="{{ route('activos.edit', $activo->id) }}" class="btn btn-info btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach()
                
            </tbody>
        </table>
    </div>

    <script>
         document.getElementById("buscar").addEventListener("input", function() {
            var input, filtro, tabla, tr, td, i, txtValor;
            input = document.getElementById("buscar");
            filtro = input.value.toUpperCase();
            tabla = document.getElementById("tablaActivos");
            tr = tabla.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValor = td.textContent || td.innerText;
                    if (txtValor.toUpperCase().indexOf(filtro) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        });
    </script>

@endsection