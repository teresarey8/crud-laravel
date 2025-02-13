@extends('layout/template')

@section('title', 'Vista de alumnos')

@section('contentido')
<main>
    <div class="container py-4">
        <h2>{{ $msg }}</h2>

        <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>
    </div>
</main>
