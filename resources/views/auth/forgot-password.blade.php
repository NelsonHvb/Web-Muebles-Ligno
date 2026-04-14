@extends('layouts.tienda')
@section('title', 'Recuperar contraseña')

@section('content')
<div class="container" style="padding-top: 120px; padding-bottom: 60px; max-width: 520px;">
  <h3 class="mb-3">Recuperar contraseña</h3>

  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Correo electrónico</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
             value="{{ old('email') }}" required>
      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-primary w-100" type="submit">Enviar enlace</button>

    <div class="mt-3 text-center">
      <a href="{{ route('login') }}">Volver a iniciar sesión</a>
    </div>
  </form>
</div>
@endsection
