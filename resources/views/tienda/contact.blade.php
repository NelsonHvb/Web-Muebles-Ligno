@extends('layouts.tienda')
@section('title', 'Título de la página')

@section('content')
  <!-- Page Content -->
  <div class="page-heading contact-heading header-text" style="background-image: url(assets/images/heading-4-1920x500.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>Ponte en contacto con nosotros</h4>
            <h2>Contáctanos</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="find-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Nuestra ubicación en el mapa</h2>
          </div>
        </div>

        <div class="col-md-8">
          <!-- Cómo cambiar tu propio punto en el mapa
            1. Ve a Google Maps
            2. Haz clic en tu punto de ubicación
            3. Haz clic en "Compartir" y elige la pestaña "Insertar un mapa"
            4. Copia solo la URL y pégala en el campo src="" de abajo
          -->
          <div id="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1964.423553548562!2d-84.28364616648001!3d10.029472869727396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scr!4v1768068964954!5m2!1ses-419!2scr"
              width="100%"
              height="330"
              style="border:0;"
              allowfullscreen
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>

        <div class="col-md-4">
          <div class="left-content">
            <h4>Sobre nuestra oficina</h4>
            <p>
              Ligno es un taller de carpintería artesanal fundado en 2016 en Grecia, Alajuela, por Alexis Chavarría.
              <br><br>
              Nos especializamos en diseñar y fabricar muebles personalizados bajo pedido, cuidando la calidad, la atención al detalle y la asesoría en materiales, medidas y acabados según cada necesidad.
              <br><br>
              Para brindarte una mejor experiencia, estamos fortaleciendo nuestra presencia digital para que puedas ver trabajos previos, solicitar diseños a medida y agendar una cita de forma más organizada.
              <br><br>
              Con esto buscamos ampliar nuestro alcance más allá de las recomendaciones y mejorar la gestión de consultas y pedidos de nuestros clientes.
            </p>

            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="send-message">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Envíanos un mensaje</h2>
          </div>
        </div>

        <div class="col-md-8">
          <div class="contact-form">
            <form id="contact" action="{{ route('contact.send') }}" method="POST">
              @csrf

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Nombre completo" required>
                  </fieldset>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" placeholder="Correo electrónico" required>
                  </fieldset>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Asunto" required>
                  </fieldset>
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Tu mensaje" required></textarea>
                  </fieldset>
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="filled-button">Enviar mensaje</button>
                  </fieldset>
                </div>
              </div>
            </form>
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
            <p>Copyright © 2020 Muebles Ligno -
              Plantilla basada en <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  {{-- Modal: Mensaje enviado --}}
  @if (session('success'))
    <div class="modal fade" id="msgSentModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Listo</h5>
            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            {{ session('success') }}
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" data-bs-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // Bootstrap 4 (jQuery)
        if (window.$ && $('#msgSentModal').modal) {
          $('#msgSentModal').modal('show');
          return;
        }

        // Bootstrap 5 (sin jQuery)
        if (window.bootstrap && bootstrap.Modal) {
          new bootstrap.Modal(document.getElementById('msgSentModal')).show();
        }
      });
    </script>
  @endif
@endsection
