<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use App\Models\Baja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activos = Activo::all();
        $bajas = Baja::all();

        return view('activos.index', ['activos' => $activos, 'bajas' => $bajas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion del lado del servidor
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'cantidad_inicial' => 'required',
        ]);

        //Generar el codigo del activo
        $ultimoCodigo = Activo::orderBy('id', 'desc')->pluck('codigo')->first();

        //si no existe ningun valor
        $nuevoCodigo = 'CM001';

        if ($ultimoCodigo) {
            $ultimoNumero = intval(substr($ultimoCodigo, 2));
            $nuevoNumero = $ultimoNumero + 1;
            $nuevoCodigo = 'CM' . str_pad($nuevoNumero, 3, '0', STR_PAD_LEFT);
        }

        //Almacenar en la base de datos
        $activo = new Activo();

        $activo->nombre = $request->nombre;
        $activo->codigo = $nuevoCodigo;
        $activo->descripcion = $request->descripcion;
        $activo->cantidad_inicial = $request->cantidad_inicial;

        $activo->save();

        //redireccionar a la lista de activos
        return Redirect::to('activos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function show(Activo $activo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function edit(Activo $activo)
    {
        //$activo = Activo::findOrFail($activo->id);

        return view('activos.edit', ['activo' => $activo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activo $activo)
    {
        //validacion
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $activo->nombre = $request->nombre;
        $activo->descripcion = $request->descripcion;

        $activo->save();


        //redireccionar a la lista de activos
        return Redirect::to('activos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activo  $activo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activo $activo)
    {
        //
    }
}
