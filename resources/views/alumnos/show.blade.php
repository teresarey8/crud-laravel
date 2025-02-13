@extends('layout/template')

@section('title', 'Vista de alumnos')

@section('contentido')
    <main>
        <ul>
            <li>{{ $alumnoid->id }}</li>
            <li>{{ $alumnoid->matricula }}</li>
            <li>{{ $alumnoid->nombre}}</li>
            <li>{{$alumnoid->fecha_nacimiento}}</li>
            <li>{{$alumnoid->email}}</li>
            <li>{{$alumnoid->telefono}}</li>
            <li>{{$alumnoid->nivel_id}}</li>
        </ul>
    </main>
@endsection