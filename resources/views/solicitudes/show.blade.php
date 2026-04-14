@extends('layouts.tienda')


@section('header')
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Detalle de solicitud
  </h2>
@endsection

@section('content')
<div class="py-8">
  <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-4">

    @if (session('status'))
      <div class="rounded bg-green-50 p-3 text-green-800">
        {{ session('status') }}
      </div>
    @endif

    <div class="bg-white shadow-sm sm:rounded-lg p-6 space-y-2">
      <div><strong>ID:</strong> {{ $solicitud->SolicitudId }}</div>
      <div><strong>Estado:</strong> {{ $solicitud->Estado }}</div>
      <div><strong>Descripción:</strong> {{ $solicitud->Descripcion }}</div>
      <div><strong>Comentario admin:</strong> {{ $solicitud->DescripcionAdmin }}</div>

      <a href="{{ route('solicitudes.index') }}" class="text-blue-600 underline">
        Volver a Mis Solicitudes
      </a>
    </div>

  </div>
</div>
@endsection
