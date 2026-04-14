@extends('layouts.tienda')

@section('title', 'Registro de usuario - Muebles Ligno')

@section('content')
    <!-- Encabezado de página -->
    <div class="page-heading-custom">
        <div class="container">
            <h1 style="font-size: 40px; font-weight: 700; margin-bottom: 10px;">Crea tu cuenta</h1>
        </div>
    </div>

    <!-- Formulario -->
    <div class="container">
        <div class="form-container">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Usuario *</label>
                    <input type="text"
                           name="nombre"
                           value="{{ old('nombre') }}"
                           class="form-control @error('nombre') is-invalid @enderror"
                           required
                           placeholder="Tu nombre de usuario">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo electrónico *</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           required
                           placeholder="tucorreo@ejemplo.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña *</label>
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Confirmar contraseña *</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           required>
                </div>

                <button type="submit" class="btn-submit">Registrarme</button>
            </form>

        </div>
    </div>

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
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #f33f3f;
            box-shadow: 0 0 0 0.2rem rgba(243, 63, 63, 0.25);
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
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(243,63,63,0.3);
        }
    </style>
@endsection
