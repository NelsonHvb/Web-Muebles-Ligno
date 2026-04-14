@extends('layouts.tienda')
@section('title', 'Título de la página')

@section('content')
  <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Revisa y confirma tu pedido</h4>
              <h2>Proceso de pago</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="products call-to-action">
      <div class="container">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <div class="row">
              <div class="col-6">
                <em>Sub‑total</em>
              </div>
              <div class="col-6 text-right">
                <strong>$ 128.00</strong>
              </div>
            </div>
          </li>
          
          <li class="list-group-item">
            <div class="row">
              <div class="col-6">
                <em>Extras</em>
              </div>
              <div class="col-6 text-right">
                <strong>$ 0.00</strong>
              </div>
            </div>
          </li>

          <li class="list-group-item">
            <div class="row">
              <div class="col-6">
                <em>Impuestos</em>
              </div>
              <div class="col-6 text-right">
                <strong>$ 10.00</strong>
              </div>
            </div>
          </li>

          <li class="list-group-item">
            <div class="row">
              <div class="col-6">
                <em>Total</em>
              </div>
              <div class="col-6 text-right">
                <strong>$ 138.00</strong>
              </div>
            </div>
          </li>

          <li class="list-group-item">
            <div class="row">
              <div class="col-6">
                <em>Pago inicial requerido</em>
              </div>
              <div class="col-6 text-right">
                <strong>$ 20.00</strong>
              </div>
            </div>
          </li>
        </ul>

        <br>
        
        <div class="inner-content">
          <div class="contact-form">
            <form action="#">
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Título:</label>
                    <select class="form-control" data-msg-required="Este campo es obligatorio.">
                      <option value="">-- Elegir --</option>
                      <option value="dr">Dr.</option>
                      <option value="miss">Srta.</option>
                      <option value="mr">Sr.</option>
                      <option value="mrs">Sra.</option>
                      <option value="ms">Sra./Srta.</option>
                      <option value="other">Otro</option>
                      <option value="prof">Prof.</option>
                      <option value="rev">Rev.</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Nombre:</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Correo electrónico:</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Teléfono:</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Dirección 1:</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Dirección 2:</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Ciudad:</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Estado / Provincia:</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Código postal:</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">País:</label>
                    <select class="form-control">
                      <option value="">-- Elegir --</option>
                      <option value="">-- Elegir --</option>
                      <option value="">-- Elegir --</option>
                      <option value="">-- Elegir --</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Método de pago</label>
                    <select class="form-control">
                      <option value="">-- Elegir --</option>
                      <option value="bank">Cuenta bancaria</option>
                      <option value="cash">Efectivo</option>
                      <option value="paypal">PayPal</option>
                    </select>
                  </div>
                </div>

                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <label class="control-label">Captcha</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">
                  <input type="checkbox">
                  Acepto los <a href="terms.html" target="_blank">Términos y Condiciones</a>
                </label>
              </div>

              <div class="clearfix">
                <button type="button" class="filled-button pull-left">Volver</button>
                <button type="submit" class="filled-button pull-right">Finalizar</button>
              </div>
            </form>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reservar ahora</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                <div class="row">
                  <div class="col-md-6">
                    <fieldset>
                      <input type="text" class="form-control" placeholder="Lugar de recogida" required="">
                    </fieldset>
                  </div>

                  <div class="col-md-6">
                    <fieldset>
                      <input type="text" class="form-control" placeholder="Lugar de devolución" required="">
                    </fieldset>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <fieldset>
                      <input type="text" class="form-control" placeholder="Fecha/hora de recogida" required="">
                    </fieldset>
                  </div>

                  <div class="col-md-6">
                    <fieldset>
                      <input type="text" class="form-control" placeholder="Fecha/hora de devolución" required="">
                    </fieldset>
                  </div>
                </div>
                <input type="text" class="form-control" placeholder="Nombre completo" required="">

                <div class="row">
                  <div class="col-md-6">
                    <fieldset>
                      <input type="text" class="form-control" placeholder="Correo electrónico" required="">
                    </fieldset>
                  </div>

                  <div class="col-md-6">
                    <fieldset>
                      <input type="text" class="form-control" placeholder="Teléfono" required="">
                    </fieldset>
                  </div>
                </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Reservar ahora</button>
          </div>
        </div>
      </div>
    </div>
@endsection
