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
        return view('alumnos.message', ['msg' => 'Alumno insertado']);
    }

    /** 
     * Display the specified resource.
     */
    public function show($id)
    {
        //detalles con find que es un propiedad de alumno
        $alumnoid = Alumno::find($id);
        return view('alumnos.show', ['alumnoid' => $alumnoid]);
    }

    /**
     * este metodo recibe el id del producto a editar, invoca al metodo find(ID) del
     * modelo para traer los datos de ese producto. Ese producto se guarda en $producto
     * y depsues se invoca a la vista y se le pasa como paramtero ese producto para que la vista
     * visualice todfos los atributos de ese producto.
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('alumnos.edit', ['id'=>$id,'alumno' => $alumno]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input(key: 'nivel_id');
        $alumno->save();
        return view('alumnos.message', ['msg' => 'Alumno actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {//capturo el alumno
        $alumnoid = Alumno::find($id);
        $alumnoid->delete();
        return view('alumnos.message', ['msg' => 'Alumno eliminado']);

    }
}
