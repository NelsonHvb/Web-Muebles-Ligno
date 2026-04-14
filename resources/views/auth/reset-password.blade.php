@extends('layouts.tienda')
@section('title', 'Restablecer contraseña')

@section('content')
<div class="container" style="padding-top: 120px; padding-bottom: 60px; max-width: 520px;">
  <h3 class="mb-3">Restablecer contraseña</h3>

  {{-- Errores generales --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('password.update') }}">
    @csrf

    {{-- Token viene del controlador --}}
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="mb-3">
      <label class="form-label">Correo electrónico</label>
      <input
        type="email"
        name="email"
        class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $email ?? '') }}"
        required
        autofocus
        autocomplete="username"
      >
      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Nueva contraseña</label>
      <input
        type="password"
        name="password"
        class="form-control @error('password') is-invalid @enderror"
        required
        autocomplete="new-password"
      >
      @error('password') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Confirmar nueva contraseña</label>
      <input
        type="password"
        name="password_confirmation"
        class="form-control"
        required
        autocomplete="new-password"
      >
    </div>

    <button class="btn btn-primary w-100" type="submit">Cambiar contraseña</button>
  </form>
</div>
@endsection
