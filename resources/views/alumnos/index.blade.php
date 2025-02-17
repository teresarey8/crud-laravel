@extends('layout/template')

@section('title', 'Gestión de Alumnos')

@section('contentido')
    <main class="container py-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="text-center text-primary mb-4">Listado de Alumnos</h2>

                <!-- Formulario de filtro -->
                <form method="GET" action="{{ route('alumnos.index') }}" class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label for="desde" class="form-label fw-bold">Desde:</label>
                        <input type="date" id="desde" name="desde" class="form-control"
                            value="{{ request()->get('desde') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="hasta" class="form-label fw-bold">Hasta:</label>
                        <input type="date" id="hasta" name="hasta" class="form-control"
                            value="{{ request()->get('hasta') }}">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary w-100 ms-2">Resetear</a>
                    </div>
                </form>

                <!-- Botón para agregar nuevo alumno -->
                <div class="mb-3 text-end">
                    <a href="{{ url('/alumnos/create') }}" class="btn btn-success btn-lg">
                        <i class="bi bi-person-plus"></i> Nuevo Alumno
                    </a>
                </div>

                <!-- Tabla de alumnos -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Matrícula</th>
                                <th>Nombre</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Nivel</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($alumnos as $alumno)
                                <tr>
                                    <td>{{ $alumno->id }}</td>
                                    <td>{{ $alumno->matricula }}</td>
                                    <td>{{ $alumno->nombre }}</td>
                                    <td>{{ $alumno->fecha_nacimiento }}</td>
                                    <td>{{ $alumno->telefono }}</td>
                                    <td>{{ $alumno->email }}</td>
                                    <td>{{ $alumno->nivel_id }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ url('alumnos/' . $alumno->id) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ url('alumnos/' . $alumno->id . '/edit') }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ url('alumnos/' . $alumno->id) }}" method="post" class="d-inline">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que quieres eliminar este alumno?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger fw-bold">No hay alumnos en el rango
                                        seleccionado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection