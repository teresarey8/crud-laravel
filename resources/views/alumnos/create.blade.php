@extends('layout/template')

@section('title', 'Registro de alumnos')

@section('contentido')

    <main>
        <div class="container py-4">
            <h2>Registro de alumnos</h2>
            <!-- asi provocamos que se envie a store -->
            <form action="{{ url('/alumnos') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="matricula" class="form-label">Matrícula</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-label" name="matricula" id="matricula"
                            value="{{ old('matricula') }}">
                        @error('matricula')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-label" name="nombre" id="nombre" value="{{ old('nombre') }}">
                        @error('nombre')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fecha" class="form-label">Fecha de nacimiento</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-label" name="fecha" id="fecha" value="{{ old('fecha') }}">
                        @error('fecha')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-label" name="telefono" id="telefono" value="{{ old('telefono') }}">
                        @error('telefono')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-label" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nivel" class="form-label">Nivel</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-label" name="nivel" id="nivel" value="{{ old('nivel') }}">
                    </div>
                </div>
                <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </main>
@endsection