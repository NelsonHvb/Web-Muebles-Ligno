@extends('layouts.tienda')
@section('title', 'Título de la página')

@section('content')
  <!-- Page Content -->
  <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-1-1920x500.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>Sobre nosotros</h4>
            <h2>Muebles Ligno</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="best-features about-features">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class="section-heading">
            <h2>Muebles personalizados con sello artesanal</h2>
          </div>
        </div>

        {{-- Texto a ancho completo (sin imagen) --}}
        <div class="col-md-12">
          <div class="left-content">
            <h4>Un taller familiar en Grecia, Alajuela</h4>

            <p>
              Muebles Ligno es un taller de carpintería artesanal fundado en 2016 por el señor Alexis Chavarría en Grecia, Alajuela,
              dedicado al diseño y fabricación de muebles personalizados bajo pedido.
            </p>

            <p>
              Desde sus inicios, el negocio se ha enfocado en ofrecer mobiliario de calidad, hecho a la medida y pensado para las
              necesidades reales de cada cliente, en un mercado donde abundan los productos genéricos y estandarizados.
            </p>

            <p>
              Durante varios años el taller ha crecido principalmente gracias al voz a voz y a las recomendaciones de clientes,
              atendiendo sobre todo al mercado local. Por eso, la presencia digital se vuelve clave para mostrar el trabajo realizado,
              facilitar el contacto y organizar mejor la atención.
            </p>

            <p>
              Esta plataforma web nace como parte de un Proyecto Profesional Informático de la Universidad Tecnológica Costarricense,
              con el objetivo de brindarle a Ligno una vitrina digital para exhibir trabajos, recibir solicitudes personalizadas y
              agendar citas de forma más estructurada.
            </p>

            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="team-members">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="section-heading">
            <h2>Nuestra historia y propósito</h2>
          </div>

          <h5>De taller artesanal a vitrina digital</h5>

          <p>
            Ligno surgió como una alternativa para quienes buscaban muebles de madera hechos a la medida, con acabados cuidados y
            asesoría directa, sin tener que conformarse con catálogos estándar.
          </p>

          <p>
            Con el tiempo se identificaron necesidades claras: centralizar la información de clientes y pedidos, mostrar un catálogo de
            trabajos realizados y organizar mejor la agenda de citas, para responder con más orden y rapidez a cada solicitud.
          </p>

          <p>
            La misión de Muebles Ligno es diseñar y fabricar muebles personalizados que se ajusten a las necesidades y gustos de cada
            cliente, ofreciendo un trabajo artesanal de calidad respaldado por años de experiencia.
          </p>

          <p>
            Su visión es convertirse en un referente local de mobiliario personalizado en la región de Grecia y zonas cercanas,
            apoyándose en herramientas digitales para fortalecer la presencia comercial y la atención al cliente.
          </p>

          <p>
            Entre las principales actividades del taller se encuentran el diseño de muebles personalizados, la fabricación artesanal
            bajo pedido, la atención cercana al cliente y la asesoría sobre diseño, materiales y acabados. Con esta solución se busca
            mejorar la organización interna y ampliar el alcance más allá del círculo habitual de conocidos.
          </p>

        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>
              © 2025 Muebles Ligno. Todos los derechos reservados. Desarrollo del sistema como proyecto profesional de la Universidad Tecnológica Costarricense.
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
@endsection
