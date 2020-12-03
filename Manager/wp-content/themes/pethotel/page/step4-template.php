<?php 
/*Template Name: Template Payment Step fore*/
get_header(); ?>
<section id="userPayment" class="ms-animate step4">
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos.png">
    <div class="ms-wrap-section">
      <?php 
        $home = "http://".$_SERVER['HTTP_HOST'];
        
        // Pet Training
        $matchFound = (array_key_exists("serviceId", $_GET));

        // Doggy School
        $matchFoundDoggy = (array_key_exists("serviceSpecial", $_GET));
        
      ?>
      <?php if($matchFound != 1 && $matchFoundDoggy != 1) { ?>
        <ul class="ms-step-list">
          <li class="checked">
            <a href="/step1" class="ms-number">1</a>
            <span class="ms-detail">Identifica <br>tu mascota</span>
          </li>
          <li class="checked">
            <a href="/step2" class="ms-number">2</a>
            <span class="ms-detail">Datos <br>de contacto</span>
          </li>
          <li class="checked">
            <a href="/step3" class="ms-number">3</a>
            <span class="ms-detail">Servicios <br>adicionales</span>
          </li>
          <li class="active">
            <span class="ms-number">4</span>
            <span class="ms-detail">Pago</span>
          </li>
        </ul>
      <?php 
        } 
      ?>

      <?php if($matchFoundDoggy == 1 && $matchFound != 1) { ?>
        <ul class="ms-step-list">
          <li class="checked">
            <a href="/step1/?serviceSpecial=<?php print $_GET['serviceSpecial']; ?>" class="ms-number">1</a>
            <span class="ms-detail">Identifica <br>tu mascota</span>
          </li>
          <li class="checked">
            <a href="/step2/?serviceSpecial=<?php print $_GET['serviceSpecial']; ?>" class="ms-number">2</a>
            <span class="ms-detail">Datos <br>de contacto</span>
          </li>
          <li class="active">
            <span class="ms-number">3</span>
            <span class="ms-detail">Pago</span>
          </li>
        </ul>
      <?php } ?>

      <div class="ms-header-step">
        <h1 class="ms-title">PAGO</h1>
      </div>

      <div class="ms-wrap-ft payment">
        <div class="ms-tab-item">
          <div class="ms-tab-body">

          <script id="store-payment-method-template" type="text/x-custom-template">
                    {{#each data}}
                        <li>
                          <div class="ms-wrap-radio">
                            <input type="radio" name="paymentMethodId" class="paymentMethodId" id="paymentMethodId_{{value}}" value="{{value}}" required>
                            <label for="paymentMethodId_{{value}}">
                              {{#ifeq value '176d7072-19f1-11eb-a86b-50e549398ade4' }}
                                <span class="ms-info-icon">{{text}}</span>
                                <span class="ms-small-text">Enviaremos un POS al recoger a tu engreido</span>
                              {{/ifeq }}
                              {{#ifnoteq value '176d7072-19f1-11eb-a86b-50e549398ade4' }}
                                {{text}}
                              {{/ifnoteq }}
                            </label>
                          </div>

                          {{#ifeq value '176d7072-19f1-11eb-a86b-50e549398ade3' }}
                            <ul class="ms-payment-banks nowrap">
                              <li>
                                <div class="ms-item flex yape-icon">
                                  <img src="<?php echo get_template_directory_uri(); ?>/img/qr.png" alt="yape QR">
                                </div>
                              </li>
                            </ul>
                          {{/ifeq }}

                          {{#ifeq value '176d7072-19f1-11eb-a86b-50e549398ade1' }}
                            <ul class="ms-payment-banks ">
                              <li>
                                <div class="ms-item bbv-icon">
                                  <p>Cuenta Ahorro Soles:</p>
                                  <strong>192 90624301 0 96</strong>
                                  <p>Código de Cuenta Interbancaria:</p>
                                  <strong>0011 0480 0200 3833 47</strong>
                                </div>
                              </li>
                              <li>
                                <div class="ms-item bcp-icon">
                                  <p>Cuenta Ahorro Soles:</p>
                                  <strong>193 002 524 88037</strong>
                                  <p>Código de Cuenta Interbancaria:</p>
                                  <strong>002 193 100 252 488 03719</strong>
                                </div>
                              </li>
                              <li>
                                <div class="ms-item scotia-icon">
                                  <p>Cuenta Ahorro Soles:</p>
                                  <strong>045 743 1690</strong>
                                  <p>Código de Cuenta Interbancaria:</p>
                                  <strong>009 231 200 457 431 690 27</strong>
                                </div>
                              </li>
                            </ul>
                          {{/ifeq}}
                        </li>
                    {{/each}}

                    <li>
                      <div class="ms-wrap-file-upload">

                        <!-- <span>Sube la captura del pago para validarlo</span>
                        <input type="file" class="ms-pass" accept="image/*">
                        <input type="file" accept="image/*" id="avatar" class="ms-picture-file">
                        <input type="hidden" name="screenVoucher" id="screenVoucher" value="">  
                        <span class="ms-img-size">imagenes menos de 2Mb</span>
                        <span class="ms-img-size error-size"></span> -->

                        <span>Sube la captura del pago para validarlo</span>
                        <input type="file" id="screenVoucher-1" class="ms-picture-file" name="screenVoucherx" data-type="voucher" accept="image/png, image/jpeg">
                        <input type="hidden" name="screenVoucher" id="screenVoucher-2" value="">  
                        <label for="screenVoucher-1">Seleccione una imagen</label>
                        <span class="ms-img-size">imagenes menos de 2Mb</span>
                        <img style="width: 50%; margin: auto 0">
                      </div>

                      

                    </li>
                  </script>

            <form id="frm-store-payment" style="width: 100%" enctype="multipart/form-data" method="post">
              <input type="hidden" name="bankId" id="bankId" value="">
              <input type="hidden" name="order" id="order">
              <input type="hidden" name="active" id="active" value="1cca03ea-07dc-11eb-ab06-50e549398ade">
              <input type="hidden" name="total" id="total" value="0">
              <input type="hidden" name="customerId" id="customerId"> <!-- TODO: Setear customerId -->
              <input type="hidden" name="stateId" id="stateId" value="">
              <input type="hidden" name="date" id="date" value="">

              <div class="ms-panel">
                <div class="ms-panel-header">Detalles de facturación</div>
                <div class="ms-panel-body">
                  <div class="ms-wrap-inputs">
                    <span class="ms-label">Campo obligartorio*</span>
                    <div class="ms-form-input small mediun"><input type="text" id="billingFirstName" name="billingFirstName" placeholder="Nombre*" required></div>
                    <div class="ms-form-input small mediun"><input type="text" id="billingLastName" name="billingLastName" placeholder="Apellido*" required></div>
                    <div class="ms-form-input small mediun"><input type="text" id="billingDni" name="billingDni" placeholder="DNI*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required></div>
                    <div class="ms-form-input small mediun"><input type="text" id="billingPhone" name="billingPhone" placeholder="Teléfono" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></div>
                    <div class="ms-form-input full"><input type="email" id="billingEmail" name="billingEmail" placeholder="Correo*" required></div>
                    <div class="ms-form-input full"><input type="text" id="billingAddress" name="billingAddress" placeholder="Dirección de facturación"></div>
                  </div>
                </div>

                <?php if($matchFound != 1) { ?>
                <div class="ms-payment-list">
                  <div class="ms-wrap-checkbox">
                    <input type="checkbox" name="usingContact" value="1" id="use-data">
                    <label for="use-data">Usar mis datos de contacto</label>
                  </div>
                </div>
                <?php } else {  ?>
                  <!-- <div class="ms-msg-note">
                    <strong>¡Importante!</strong> Usaremos tus datos personales para crear tu cuenta
                  </div> -->
                <?php } ?>
              </div>
              <div class="ms-panel">
                
                <div class="ms-panel-header">Elige el método de pago de tu elección</div>

                <div class="ms-payment-detail">
                  <strong>Monto total a pagar: S/<span class="count_total">0</span></strong> <a href="#" class="ms-show-tmp">Ver detalle</a>
                </div>

                <div class="ms-panel-body">
                  <ul class="ms-payment-list container-payment-method-add"></ul>
                </div>
                <!-- <label id="billingFirstName-errorx" class="errorx">Seleccione un método de pago</label> -->
                <!-- <label id="payment-method-message" class="type-method-error"></label> -->
                <span class="error-size type-method-error"></span>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="ms-wrap-btn">


      <?php if($matchFound != 1 && $matchFoundDoggy != 1) { ?>
        <a href="/step3" class="ms-btn">Volver</a>
        <button class="ms-btn bg-sc" id="save-step-payment" type="button">Finalizar</button>
      <?php } ?>

      <?php if($matchFound == 1 && $matchFoundDoggy != 1) { ?>
        <a href="javascript:window.history.back();" class="ms-btn">Cancelar</a>
        <button class="ms-btn bg-sc" id="save-step-payment" type="button">Comprar</button>
      <?php } ?>
      
      <?php if($matchFound != 1 && $matchFoundDoggy == 1) { ?>
        <a href="/step2/?serviceSpecial=<?php print $_GET['serviceSpecial']; ?>" class="ms-btn">Volver</a>
        <button class="ms-btn bg-sc" id="save-step-payment" type="button">Comprar</button>
      <?php } ?>

      </div>
    </div>
  </div>
</section>

<div class="ms-modal" id="modal-detalle-pago" tabindex="-1" role="dialog">
  <div class="ms-wrap-modal small">
    <div class="ms-modal-content">
      <div class="ms-modal-header">
        <span class="ms-title-modal">Detalles de la reserva</span>
      </div>
      <div class="ms-modal-body">
      <script id="store-detail-payment-template" type="text/x-custom-template">  
        {{#each order}} 
            <tr>
              <td align="left" data-id="{{serviceId}}">{{ serviceName }}</td>
              <td align="right">{{ subtotal }}</td>
            </tr>
        {{/each}}
      </script>
        <table class="ms-table-pt ms-border">
          <thead>
            <tr>
              <th><strong>Concepto</strong></th>
              <th><strong>Monto</strong></th>
            </tr>
          </thead>
          <tbody class="tBody">
            <!-- <tr>
              <td align="left">Hospedaje</td>
              <td align="right">60</td>
            </tr>
            <tr>
              <td align="left">Pet Traning</td>
              <td align="right">120</td>
            </tr>
            <tr>
              <td align="left">Baño</td>
              <td align="right">30</td>
            </tr>
            <tr>
              <td align="left"><strong>Total</strong></td>
              <td align="right"><strong>210</strong></td>
            </tr> -->
          </tbody>
        </table>
      </div>
      <div class="ms-modal-footer">
        <button class="ms-btn save close-modal" data-remove="remove">Aceptar</button>
      </div>
    </div>
  </div>
  <div class="ms-layout-modal close-modal" data-remove="remove"></div>
</div>

<div class="ms-modal" id="modal-cropp" tabindex="-1" role="dialog">
  <div class="ms-wrap-modal small">
    <div class="ms-modal-content">
      <div class="ms-modal-body">
        <div class="ms-wrap-img-modal"></div>
      </div>
      <div class="ms-modal-footer">
        <button class="ms-btn cancel close-modal" data-remove="remove-cropp">Cancelar</button>
        <button class="ms-btn save" id="btnCropp">Aceptar</button>
      </div>
    </div>
  </div>
  <div class="ms-layout-modal close-modal" data-remove="remove-cropp"></div>
</div>

<?php get_footer();?>

<script>
  jQuery(document).on('click', '.ms-show-tmp', function(e) {
    e.preventDefault();
    jQuery("body").addClass('modal-open');
    jQuery("#modal-detalle-pago").fadeIn();
  });
</script>