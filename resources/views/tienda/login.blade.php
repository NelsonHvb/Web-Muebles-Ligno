@extends('layouts.tienda')
@section('title', 'Iniciar sesión')

@push('styles')
<style>
  .form-container {
    max-width: 450px;
    margin: 40px auto;
    background: #fff;
    padding: 35px 30px;
    border-radius: 10px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.1);
  }
  .page-heading-custom {
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
      url('{{ asset('assets/images/heading-6-1920x500.jpg') }}');
    background-size: cover;
    background-position: center;
    padding: 90px 0;
    text-align: center;
    color: white;
    margin-bottom: 40px;
  }
  .btn-submit {
    background: #f33f3f;
    color: white;
    padding: 10px 25px;
    border: none;
    border-radius: 5px;
    font-weight: 600;
    width: 100%;
    transition: all 0.3s;
  }
  .btn-submit:hover {
    background: #d32f2f;
  }
</style>
@endpush

@section('content')

<div class="page-heading-custom">
  <div class="container">
    <h1 style="font-size: 40px; font-weight: 700; margin-bottom: 10px;">Iniciar sesión</h1>
  </div>
</div>

<div class="container">
  <div class="form-container">
    <h4 class="mb-3 text-center" style="color:#f33f3f; font-weight:700;">Bienvenido de nuevo</h4>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3">
        <label class="form-label">Correo electrónico *</label>
        <input type="email" name="email" class="form-control" required autocomplete="email" autofocus>
      </div>

      <div class="mb-3">
        <label class="form-label">Contraseña *</label>
        <input type="password" name="password" class="form-control" required autocomplete="current-password">
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label" for="remember">Recordarme</label>
      </div>

      <button type="submit" class="btn-submit">Iniciar sesión</button>
    </form>

    <div class="mt-3 text-center">
      ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a>
    </div>
  </div>
</div>

@endsection
