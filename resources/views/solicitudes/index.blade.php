@extends('layouts.tienda')

@section('title', 'Solicitudes de clientes')

@section('content')
<div class="container py-4">


    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="h4 m-0">Solicitudes de clientes</h2>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:80px;">ID</th>
                            <th style="min-width:260px;">Cliente</th>
                            <th style="min-width:420px;">Mensaje</th>
                            <th style="width:140px;">Estado</th>
                            <th style="min-width:260px;">Comentario admin</th>

                            @can('manage-roles')
                                <th style="min-width:320px;">Acción (Admin)</th>
                            @endcan
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($solicitudes as $solicitud)
                            <tr>
                                <td>{{ $solicitud->SolicitudId ?? $solicitud->id ?? '-' }}</td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $solicitud->usuario->Usuario ?? 'Usuario eliminado' }}
                                    </div>
                                    <div class="text-muted small">
                                        {{ $solicitud->usuario->Email ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    <div style="white-space: normal;">
                                        {{ $solicitud->Mensaje }}
                                    </div>
                                </td>

                                <td>
                                    @if($solicitud->Estado === 'P')
                                        <span class="badge bg-warning text-dark">Pendiente</span>
                                    @elseif($solicitud->Estado === 'A')
                                        <span class="badge bg-success">Aceptada</span>
                                    @elseif($solicitud->Estado === 'R')
                                        <span class="badge bg-danger">Rechazada</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $solicitud->Estado }}</span>
                                    @endif
                                </td>

                                <td style="white-space: normal;">
                                    {{ $solicitud->DescripcionAdmin }}
                                </td>

                                @can('manage-roles')
                                    <td>
                                        <div class="vstack gap-3">

                                            {{-- Aprobar --}}
                                            <form method="POST"
                                                  action="{{ route('admin.solicitudes.aprobar', $solicitud) }}">
                                                @csrf
                                                @method('PATCH')

                                                <label class="form-label small mb-1">Comentario al aprobar</label>
                                                <textarea name="descripcion_admin"
                                                          class="form-control form-control-sm"
                                                          rows="2"
                                                          placeholder="Comentario al aprobar...">{{ old('descripcion_admin', $solicitud->DescripcionAdmin) }}</textarea>

                                                <button type="submit"
                                                        class="btn btn-success btn-sm w-100 mt-2"
                                                        onclick="return confirm('¿Aprobar esta solicitud?');">
                                                    Aprobar
                                                </button>
                                            </form>

                                            {{-- Rechazar --}}
                                            <form method="POST"
                                                  action="{{ route('admin.solicitudes.rechazar', $solicitud) }}">
                                                @csrf
                                                @method('PATCH')

                                                <label class="form-label small mb-1">Motivo del rechazo</label>
                                                <textarea name="descripcion_admin"
                                                          class="form-control form-control-sm"
                                                          rows="2"
                                                          placeholder="Motivo del rechazo...">{{ old('descripcion_admin', $solicitud->DescripcionAdmin) }}</textarea>

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm w-100 mt-2"
                                                        onclick="return confirm('¿Rechazar esta solicitud?');">
                                                    Rechazar
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                @endcan
                            </tr>
                        @empty
                            <tr>
                                <td colspan="@can('manage-roles') 6 @else 5 @endcan"
                                    class="text-center text-muted py-4">
                                    No hay solicitudes para mostrar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection
