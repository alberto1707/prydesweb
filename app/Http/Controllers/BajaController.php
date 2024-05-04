<?php

namespace App\Http\Controllers;

use App\Models\Baja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($activo_id)
    {
        return view('bajas.create', ["activo_id" => $activo_id]);
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
            'cantidad' => 'required',
            'motivo' => 'required',
            'fecha' => 'required',
        ]);

        //Almacenar en la base de datos
        $baja = new Baja();

        $baja->cantidad = $request->cantidad;
        $baja->activo_id = $request->activo_id;
        $baja->motivo = $request->motivo;
        $baja->fecha = $request->fecha;

        $baja->save();

        //redireccionar a la lista de activos
        return Redirect::to('activos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function show(Baja $baja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function edit(Baja $baja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Baja $baja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baja $baja)
    {
        //
    }
}
