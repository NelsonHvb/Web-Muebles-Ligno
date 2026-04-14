@extends('layouts.tienda')
@section('title', 'Bitácora de usuarios')
@section('content')
<div class="container mt-4 mb-5">


  <h3 class="mb-4">Bitácora de usuarios</h3>


  <form method="GET" action="{{ route('bitacoras.usuario') }}" class="mb-3">
  <div class="form-row align-items-end">
    <div class="form-group col-12 col-md-4">
      <label class="form-label">Buscar</label>
      <input class="form-control" name="search" value="{{ request('search') }}" placeholder="UserId, usuario o email">
    </div>

    <div class="form-group col-12 col-md-2">
      <label class="form-label">Acción</label>
      <select class="form-control" name="accion">
        <option value="">Todas</option>
        <option value="LOGIN"  @selected(request('accion')=='LOGIN')>LOGIN</option>
        <option value="LOGOUT" @selected(request('accion')=='LOGOUT')>LOGOUT</option>
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
</form>

  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
      <thead>
        <tr>
          <th>ID</th><th>Fecha</th><th>UserId</th><th>Usuario</th><th>Email</th><th>Acción</th><th>Detalle</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($rows as $r)
          <tr>
            <td>{{ $r->BitacoraESId }}</td>
            <td>{{ $r->Fecha }}</td>
            <td>{{ $r->UserId }}</td>
            <td>{{ $r->Usuario }}</td>
            <td>{{ $r->Email }}</td>
            <td>{{ $r->Accion }}</td>
            <td style="max-width: 420px; white-space: normal;">{{ $r->Detalle }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  
  {{ $rows->links('pagination::simple-bootstrap-4') }}
</div>
@endsection
