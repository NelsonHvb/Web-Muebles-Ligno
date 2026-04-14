@extends('layouts.tienda')
@section('title', 'Bitácora Movimientos')

@section('content')
<div class="container mt-4 mb-5">

  <div class="d-flex align-items-start justify-content-between mb-3">
    <div>
      <h3 class="mb-1">Bitácora Movimientos</h3>
      <div class="text-muted small">

      </div>
    </div>

    <div class="text-muted small text-end">
      @php
        $page = method_exists($movimientos, 'currentPage') ? $movimientos->currentPage() : 1;
        $last = method_exists($movimientos, 'lastPage') ? $movimientos->lastPage() : 1;
      @endphp
      Página {{ $page }} de {{ $last }}
    </div>
  </div>

  {{-- Filtros --}}
  <form method="GET" action="{{ route('bitacoras.mov') }}" class="mb-3">
    <div class="form-row align-items-end">

      <div class="form-group col-12 col-md-4">
        <label class="form-label">Buscar</label>
        <input class="form-control"
               name="search"
               value="{{ request('search') }}"
               placeholder="SolicitudId, UserId, IP, módulo o acción">
        <small class="text-muted">
          Busca por SolicitudId, UserId, Ip, Accion, Modulo o RegistroId.
        </small>
      </div>

      <div class="form-group col-12 col-md-2">
        <label class="form-label">Acción</label>
        <select class="form-control" name="accion">
          <option value="">Todas</option>
          @foreach($acciones as $a)
            <option value="{{ $a }}" @selected(request('accion') == $a)>{{ $a }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-12 col-md-2">
        <label class="form-label">Desde</label>
        <input class="form-control" type="date" name="desde" value="{{ request('desde') }}">
      </div>

      <div class="form-group col-12 col-md-2">
        <label class="form-label">Hasta</label>
        <input class="form-control" type="date" name="hasta" value="{{ request('hasta') }}">
      </div>

      <div class="form-group col-12 col-md-2">
        <button class="btn btn-primary btn-block" type="submit">Filtrar</button>
      </div>

    </div>

    <div class="mt-2">
      <a href="{{ route('bitacoras.mov') }}" class="btn btn-outline-secondary btn-sm">
        Limpiar filtros
      </a>
    </div>
  </form>

  {{-- Tabla --}}
  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Solicitud</th>
          <th>Usuario</th>
          <th>Acción</th>
          <th>Módulo</th>
          <th>RegistroId</th>
          <th>IP</th>
          <th>Detalle</th>
          <th>Antes</th>
          <th>Después</th>
          <th>Fecha</th>
        </tr>
      </thead>

      <tbody>
        @forelse ($movimientos as $m)
          <tr>
            {{-- ID real del movimiento (si existe). Si no, cae al BitacoraSolicitudId que tenías. --}}
            <td>{{ $m->BitacoraMovId ?? $m->id ?? $m->BitacoraSolicitudId }}</td>

            <td>
              @if ($m->SolicitudId && Route::has('solicitudes.show'))
                <a href="{{ route('solicitudes.show', $m->SolicitudId) }}">
                  {{ $m->SolicitudId }}
                </a>
              @else
                {{ $m->SolicitudId }}
              @endif
            </td>

            <td>
              @if ($m->UserId && Route::has('usuarios.show'))
                <a href="{{ route('usuarios.show', $m->UserId) }}">
                  {{ $m->UserId }}
                </a>
              @else
                {{ $m->UserId }}
              @endif
            </td>

            <td>{{ $m->Accion }}</td>
            <td>{{ $m->Modulo }}</td>
            <td>{{ $m->RegistroId }}</td>
            <td>{{ $m->Ip }}</td>
            <td style="min-width: 260px; max-width: 420px;">
              {{ $m->Detalle }}
            </td>

            <td style="max-width:260px;">
              <pre class="m-0 small" style="white-space: pre-wrap; word-break: break-word; max-height: 160px; overflow:auto;">{{ json_encode($m->Antes, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>
            </td>

            <td style="max-width:260px;">
              <pre class="m-0 small" style="white-space: pre-wrap; word-break: break-word; max-height: 160px; overflow:auto;">{{ json_encode($m->Despues, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE) }}</pre>
            </td>

            <td style="white-space: nowrap;">
              {{ optional($m->created_at)->format('Y-m-d H:i:s') }}
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="11" class="text-center py-4 text-muted">
              No hay movimientos registrados.
            </td>
          </tr>
        @endforelse
      </tbody>

      <tfoot>
        <tr>
          <th colspan="10" class="text-right">Total registros (según filtro):</th>
          <th>
            {{ method_exists($movimientos, 'total') ? $movimientos->total() : $movimientos->count() }}
          </th>
        </tr>
      </tfoot>
    </table>
  </div>

  {{ $movimientos->appends(request()->query())->links('pagination::simple-bootstrap-4') }}
</div>
@endsection
