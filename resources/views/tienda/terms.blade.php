@extends('layouts.tienda')
@section('title', 'Título de la página')

@section('content')
  <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-5-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Información legal de la tienda</h4>
              <h2>Términos y condiciones</h2>
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
              <h2>Condiciones generales de uso</h2>
            </div>

            <h5>1. Uso del sitio web</h5>

            <p>Al acceder a Muebles Ligno aceptas utilizar este sitio web de forma responsable y únicamente para consultar productos, realizar pedidos o ponerte en contacto con nosotros. El usuario se compromete a no hacer un uso fraudulento del sitio ni intentar dañar su funcionamiento.</p>

            <br>
            <br>

            <h5>2. Pedidos y precios</h5>

            <p>Los precios mostrados en la web incluyen impuestos aplicables salvo que se indique lo contrario y pueden cambiar sin previo aviso. Un pedido solo se considera confirmado cuando recibes un correo de confirmación de Muebles Ligno con el detalle de tu compra y el importe total.</p>
            
            <br>
            <br>

            <h5>3. Envíos, cambios y devoluciones</h5>

            <p>Realizamos envíos a las zonas indicadas durante el proceso de compra. Los plazos de entrega son estimados y pueden variar por causas externas. Si el producto llega dañado o no corresponde con tu pedido, podrás solicitar un cambio o devolución siguiendo las indicaciones de nuestro equipo de atención al cliente.</p>
        
            <br>
            <br>

            <h5>4. Privacidad y protección de datos</h5>

            <p>Los datos personales que nos facilitas se utilizan únicamente para gestionar tus pedidos, responder a tus consultas y mejorar nuestros servicios. No compartimos tu información con terceros sin tu consentimiento, salvo obligación legal. Puedes pedir la actualización o eliminación de tus datos escribiéndonos a los medios de contacto indicados en la página.</p>

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
@endsection
