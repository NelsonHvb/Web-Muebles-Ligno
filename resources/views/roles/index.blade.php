@extends('layouts.tienda')

@section('title', 'Mantenimiento de roles')

@section('content')
<div class="container py-4">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="h4 m-0">Mantenimiento de roles</h2>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Tabla de roles --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <h3 class="h6 mb-3">Roles</h3>

            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 80px;">ID</th>
                            <th>Nombre</th>
                            <th style="width: 140px;">Estado</th>
                            <th style="width: 180px;">Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($roles as $rol)
                            <tr>
                                <td>{{ $rol->RolId }}</td>
                                <td>{{ $rol->Nombre }}</td>
                                <td>
                                    @if($rol->EstadoRol === 'A')
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <form method="POST"
                                          action="{{ route('roles.toggle', $rol) }}"
                                          onsubmit="return confirm('¿Seguro que deseas cambiar el estado del rol {{ $rol->Nombre }}?');">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" class="btn btn-dark btn-sm">
                                            Activar/Desactivar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    No hay roles para mostrar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- Asignar rol a usuario --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h3 class="h6 mb-3">Asignar rol a usuario</h3>

            <form action="{{ route('roles.asignar') }}" method="POST" class="row g-3">
                @csrf

                <div class="col-12 col-md-6">
                    <label class="form-label">Usuario</label>
                    <select name="user_id" class="form-select" required>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->UserId }}">
                                {{ $usuario->Usuario }} ({{ $usuario->Email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label">Rol</label>
                    <select name="rol_id" class="form-select" required>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->RolId }}">{{ $rol->Nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-warning">
                        Asignar rol
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Roles asignados por usuario --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="h6 mb-3">Roles por usuario</h3>

            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Usuario</th>
                            <th>Roles</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td style="min-width: 260px;">
                                    {{ $usuario->Usuario }} ({{ $usuario->Email }})
                                </td>

                                <td>
                                    @if($usuario->roles && $usuario->roles->count())
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach($usuario->roles as $rol)
                                                <form action="{{ route('roles.desasignar') }}"
                                                      method="POST"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="user_id" value="{{ $usuario->UserId }}">
                                                    <input type="hidden" name="rol_id" value="{{ $rol->RolId }}">

                                                    {{-- Botón tipo badge --}}
                                                    <button type="submit"
                                                            class="badge bg-secondary border-0"
                                                            style="cursor:pointer;"
                                                            onclick="return confirm('¿Quitar el rol {{ $rol->Nombre }} a {{ $usuario->Usuario }}?');">
                                                        {{ $rol->Nombre }} ✕
                                                    </button>
                                                </form>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-muted">Sin roles asignados</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
