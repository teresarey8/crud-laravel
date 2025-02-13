@extends('layout/template')

@section('title', 'Registro de alumnos')

@section('contentido')

<!-- LOS FORMULARIOS SE ENVIAN A LA FUNCION update(ACTION) -->
 <!-- Le enviamos por post a esa ruta que pertenece a store y así la activamos -->
<main>
    <h1>Edición de alumnos</h1>
    <form action="{{ url('alumnos/'.$id) }}" method="post">
        <!-- directiva para un token que luego autoriza Laravel-->
     <!-- si no pones esta directiva da el error 419 "Sitio no autorizado" -->
      @method("PUT")
      @csrf
      <div class="mb-3">
         <label for="matricula" class="form-label">Matricula</label>
         <input type="text" name="matricula" id="matricula" class="form-control" value="{{$alumno->matricula}}">
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$alumno->nombre}}">
    </div>
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control"value="{{$alumno->fecha_nacimiento}}">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">telefono</label>
        <input type="number" name="telefono" id="telefono" class="form-control" value="{{$alumno->telefono}}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{$alumno->email}}">
    </div>
    <div class="mb-3">
        <label for="nivel_id" class="form-label">Nivel</label>
        <input type="number" name="nivel_id" id="nivel_id" class="form-control" value="{{$alumno->nivel_id}}">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</main>


@endsection