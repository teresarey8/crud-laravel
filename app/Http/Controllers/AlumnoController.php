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
    public function index(Request $request)
    {
        //paginacion

        // Obtener fechas del formulario
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        // Iniciar la consulta base
        $alumnos = Alumno::query();

        // Aplicar filtros si se han seleccionado fechas
        if ($desde) {
            $alumnos->whereDate('fecha_nacimiento', '>=', $desde);
        }
        if ($hasta) {
            $alumnos->whereDate('fecha_nacimiento', '<=', $hasta);
        }

        // Obtener resultados
        $alumnos = $alumnos->get();

        // Retornar vista con los datos filtrados y mantener los valores en el formulario
        /**
         * Esto es un array asociativo donde 'alumnos' es el nombre de la variable que se pasará a la vista.
         *$alumnos es la variable en el controlador que contiene los datos de los alumnos que recuperaste previamente 
         *de la base de datos (probablemente usando Alumno::all() o algún otro método para obtener los datos).
         *Este array pasa los datos de los alumnos a la vista para que puedan ser utilizados dentro de la plantilla.
         */
        return view('alumnos.index', [
            'alumnos' => $alumnos,
            'desde' => $desde,
            'hasta' => $hasta
        ]);

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
        // Validaciones
        $validated = $request->validate([
            'matricula' => 'required|unique:alumnos,matricula|regex:/^[A-Za-z0-9]+$/|max:10', // Asegura que la matrícula tenga solo números y letras
            'nombre' => 'required|string|max:120', // Nombre no puede ser mayor de 120 caracteres
            'fecha' => 'required|date|before:today', // Debe ser una fecha válida y anterior a la fecha actual
            'telefono' => 'required|numeric|digits_between:9,20', // El teléfono puede tener entre 10 y 20 dígitos
            'email' => 'required|email|unique:alumnos,email|max:50' // Email único y con formato válido
        ]);

        // Si la validación pasa, guarda el nuevo alumno
        $alumno = new Alumno();
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input('nivel');
        $alumno->save();

        // Retorna un mensaje de éxito
        return view('alumnos.message', ['msg' => 'Alumno insertado correctamente']);
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
        return view('alumnos.edit', ['id' => $id, 'alumno' => $alumno]);


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
