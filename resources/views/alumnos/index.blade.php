@extends('layout/template')

@section('title', 'Vista de alumnos')

@section('contentido')
    <main>
        <div class="container py-4">
            <h2>Listado de alumnos</h2>

            <a href="{{ url('/alumnos/create') }}" class="btn btn-primary btn-sm">Nuevo registro</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Nivel</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                        <tr>
                            <td>{{$alumno->id}}</td>
                            <td>{{$alumno->matricula}}</td>
                            <td>{{$alumno->nombre}}</td>
                            <td>{{$alumno->fecha_nacimiento}}</td>
                            <td>{{$alumno->telefono}}</td>
                            <td>{{$alumno->email}}</td>
                            <td>{{$alumno->nivel_id}}</td>
                            <form action="{{url('alumnos/' . $alumno->id)}}" method="post">
                                @method("DELETE")
                                @csrf
                                <td><button type="submit" class="btn btn-danger">Eliminar</button></td>
                            </form>
                            <form action="{{url('alumnos/ ' . $alumno->id . '/edit')}}" method="get">
                                @csrf
                                <td><button type="submit"class="btn btn-success" >Editar</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection