@extends('layouts.tienda')
@section('title', 'Título de la página')

@section('content')

  <style>
    .form-container {
      max-width: 800px;
      margin: 40px auto;
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 5px 30px rgba(0,0,0,0.1);
    }
    .page-heading-custom {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/images/heading-6-1920x500.jpg');
      background-size: cover;
      background-position: center;
      padding: 100px 0;
      text-align: center;
      color: white;
      margin-bottom: 50px;
    }
    .form-label {
      font-weight: 600;
      color: #333;
      margin-bottom: 8px;
    }
    .form-control, .form-select {
      border-radius: 5px;
      border: 1px solid #ddd;
      padding: 12px;
    }
    .form-control:focus, .form-select:focus {
      border-color: #f33f3f;
      box-shadow: 0 0 0 0.2rem rgba(243, 63, 63, 0.25);
    }
    .btn-submit {
      background: #f33f3f;
      color: white;
      padding: 15px 40px;
      border: none;
      border-radius: 5px;
      font-weight: 600;
      font-size: 16px;
      transition: all 0.3s;
    }
    .btn-submit:hover {
      background: #d32f2f;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(243, 63, 63, 0.3);
    }
  </style>

</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Page Heading -->
  <div class="page-heading-custom">
    <div class="container">
      <h1 style="font-size: 48px; font-weight: 700; margin-bottom: 10px;">Solicitud Personalizada</h1>
      <!--<p style="font-size: 18px;">Diseñamos el mueble de tus sueños</p>-->
    </div>
  </div>

        <!-- Form Container -->
        <div class="container">
            <div class="form-container">
            <h3 class="mb-4 text-center" style="color: #f33f3f; font-weight: 700;">Cuéntanos qué necesitas</h3>
            <p class="text-center mb-4" style="color: #666;">Completa el formulario y nuestro equipo se pondrá en contacto contigo</p>

            <form method="POST" action="{{ route('solicitudes.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
            <label class="form-label">Tipo de mueble *</label>
            <select name="TipoMueble" class="form-control" required>
                <option value="">Selecciona una opción</option>
                <option value="mesa">Mesa</option>
                <option value="silla">Silla</option>
                <option value="closet">Clóset</option>
                <option value="estanteria">Estantería</option>
                <option value="cama">Cama</option>
                <option value="escritorio">Escritorio</option>
                <option value="otro">Otro</option>
            </select>
            </div>

            <div class="col-md-6 mb-3">
            <label class="form-label">Dimensiones aproximadas</label>
            <input type="text" name="Dimensiones" class="form-control"
                placeholder="Ej: 2m alto x 1.5m ancho x 0.5m fondo">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Material / acabado deseado</label>
            <input type="text" name="MaterialAcabado" class="form-control"
            placeholder="Ej: madera de pino, acabado natural, barnizado, etc.">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción detallada de la solicitud *</label>
            <textarea name="Descripcion" class="form-control" rows="5" required
            placeholder="Describe cómo quieres el mueble..."></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
            <label class="form-label">Teléfono de contacto</label>
            <input type="tel" name="Telefono" class="form-control" placeholder="10 dígitos">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn-submit">
            <i class="fa fa-paper-plane"></i> Enviar solicitud
            </button>
        </div>
        </form>

    </div>
  </div>

  <!-- Footer -->
  <footer style="margin-top: 60px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright © 2025 Muebles Ligno - Hecho con amor</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
</body>
</html>

  
@endsection




