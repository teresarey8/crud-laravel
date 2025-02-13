<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Nivel;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //subdirectorio alumnos 
        return view('alumnos.create', ['niveles' => Nivel::all()]);
    }

    /**
     * Creamos un objeto alumno con los datos que he recibido de la vista create
     */
    public function store(Request $request)
    {
        //se deben hacer validaciones 
        $alumno = new Alumno();
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input(key: 'nivel');
        $alumno->save();
        return view('alumnos.message', ['msg'=>'Aumno insertado']);
    }

    /** 
     * Display the specified resource.
     */
    public function show($id)
    {
        //detalles con find que es un propiedad de alumno
        $alumnoid = Alumno::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
