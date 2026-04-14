@extends('layouts.tienda')
@section('content')
  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="banner header-text">
    <div class="owl-banner owl-carousel">
      <div class="banner-item-01">
        <div class="text-content">
          <h4>Encuentra tu mueble ideal</h4>
          <h2>Mobiliario a tu medida</h2>
        </div>
      </div>
      <div class="banner-item-02">
        <div class="text-content">
          <h4>Diseños personalizados</h4>
          <h2>Calidad y estilo para tu hogar</h2>
        </div>
      </div>
      <div class="banner-item-03">
        <div class="text-content">
          <h4>Hecho a mano</h4>
          <h2>Detalles que marcan la diferencia</h2>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner Ends Here -->

  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Productos destacados</h2>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <img src="assets/images/product-1R-370x270.jpg" alt="Mesa de comedor de madera">
            <div class="down-content">
              <h4>Mesa de comedor de madera</h4>
              <p>Mesa rectangular grande con superficie de madera pulida y patas en forma de “X” metálicas. Ideal para comedor o reuniones.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <img src="assets/images/product-2R-370x270.jpg" alt="Estantería organizadora">
            <div class="down-content">
              <h4>Estantería organizadora</h4>
              <p>Mueble alto con múltiples compartimentos abiertos, diseñado para colocar libros, decoración o equipos electrónicos.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <img src="assets/images/product-3R-370x270.jpg" alt="Cama de madera con cabecera">
            <div class="down-content">
              <h4>Cama de madera con cabecera</h4>
              <p>Cama amplia con estructura de madera oscura y paneles decorativos en la cabecera y piecera. Base sólida en tono madera natural, ideal para dormitorio principal.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <img src="assets/images/product-4R-370x270.jpg" alt="Armario blanco">
            <div class="down-content">
              <h4>Armario blanco</h4>
              <p>Armario con dos puertas, tres cajones y estantes abiertos en un costado. Perfecto para ropa y accesorios.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <img src="assets/images/product-5R-370x270.jpg" alt="Alacena de madera y metal">
            <div class="down-content">
              <h4>Alacena de madera y metal</h4>
              <p>Aparador estilo industrial con estructura negra y puertas/cajones de madera. Incluye parte superior con puertas corredizas y estantes.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <img src="assets/images/product-6R-370x270.jpg" alt="Mueble para electrodomésticos">
            <div class="down-content">
              <h4>Mueble para electrodomésticos</h4>
              <p>Gabinete alto con espacio abierto para microondas, horno y otros aparatos, además de puertas para almacenamiento.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="best-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Sobre nosotros</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            <p>
              En <strong>Muebles Ligno</strong> creamos muebles funcionales y estéticos para cada espacio de tu hogar.
              Nos enfocamos en la calidad de los materiales y en el diseño personalizado.
            </p>
            <ul class="featured-list">
              <li><a href="#">Muebles personalizados a medida</a></li>
              <li><a href="#">Materiales de alta calidad</a></li>
              <li><a href="#">Diseños modernos y funcionales</a></li>
              <li><a href="#">Atención personalizada a cada cliente</a></li>
            </ul>
            <a href="{{ route('about') }}" class="filled-button">Leer más</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-image">
            <img src="assets/images/about-11-570x350.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        </div>
      </div>
    </div>
  </div>

  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-md-8">
                <h4>¿Listo para renovar tus espacios?</h4>
                <p>Contáctanos y diseña junto con nosotros el mueble perfecto para tu hogar u oficina.</p>
              </div>
              <div class="col-lg-4 col-md-6 text-right">
                <a href="{{ route('contact') }}" class="filled-button">Contáctanos</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright © 2020 Muebles Ligno - Plantilla basada en PHPJabbers.com</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
@endsection
