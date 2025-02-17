@extends('layout/template')

@section('title', 'Vista de alumnos')

@section('contentido')
    <main>
        <h2>Detalles del alumno {{ $alumnoid->nombre}}</h2>
        <ul>
            <li><strong>ID: </strong>{{ $alumnoid->id }}</li>
            <li><strong>Matricula: </strong>{{ $alumnoid->matricula }}</li>
            <li><strong>Nombre: </strong>{{ $alumnoid->nombre}}</li>
            <li><strong>Fecha de nacimiento: </strong>{{$alumnoid->fecha_nacimiento}}</li>
            <li><strong>Email: </strong>{{$alumnoid->email}}</li>
            <li><strong>Telefono: </strong>{{$alumnoid->telefono}}</li>
            <li><strong>Nivel: </strong>{{$alumnoid->nivel_id}}</li>
        </ul>
        <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>
    </main>
@endsection