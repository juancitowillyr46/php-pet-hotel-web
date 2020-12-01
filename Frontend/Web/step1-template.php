<?php 
/*Template Name: Template Payment Step one*/
get_header(); ?>
<section id="userPayment" class="ms-animate">
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos.png">
    <div class="ms-wrap-section">

      <ul class="ms-step-list">
        <li class="active">
          <span class="ms-number">1</span>
          <span class="ms-detail">Identifica <br>tu mascota</span>
        </li>
        <li>
          <span class="ms-number">2</span>
          <span class="ms-detail">Datos <br>de contacto</span>
        </li>
        <li>
          <span class="ms-number">3</span>
          <span class="ms-detail">Servicios <br>adicionales</span>
        </li>
        <li>
          <span class="ms-number">4</span>
          <span class="ms-detail">Pago</span>
        </li>
      </ul>

      <div class="ms-header-step">
        <h1 class="ms-title">IDENTIFICA A TU MASCOTA</h1>
      </div>

      <script id="store-pet-exist-tpl" type="text/x-custom-template">
        {{#each pets}}
          <li>
            <div class="ms-card ms-edit-petx btn-get-petx ms-loadedx" data-pet-id="{{id}}" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/patron_black_.png);">
              <div class="ms-wrap-img">
                <img src="{{image}}" alt="{{name}}">
              </div>
              <div class="ms-can-info">
                <h3 class="ms-name">{{name}}</h3>
                <span class="ms-weight">
                  <span>{{weight}}kg</span>
                  <span class="ms-pedigree">{{race}}</span>
                  <span class="ms-height">
                    <span>{{size}}m</span>
                  </span>
                </span>
              </div>
              <button data-tool="Editar" class="ms-edit ms-edit-pet btn-get-pet" data-pet-id="{{id}}">Editar</button>
            </div>
            <div class="ms-wrap-chk">
              <input type="checkbox" name="selectPet" id="{{id}}" value="{{id}}">
              <label for="{{id}}"></label>
            </div>
            <form id="frm-store-pet-{{index}}" class="frm-petsbycheckbox">
              <input type="hidden" id="id-{{index}}" name="id">
              <input type="hidden" name="active" id="active-{{index}}" value="1cca03ea-07dc-11eb-ab06-50e549398ade">
              <input type="hidden" id="other-{{index}}" name="other" placeholder="">
              <input type="hidden" id="image-{{index}}" class="ms-pass" name="image">
              <input type="hidden" placeholder="Nombre*" id="name-{{index}}" name="name">
              <input type="hidden" placeholder="Edad*" id="age-{{index}}" name="age" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
              <input type="hidden" placeholder="gender*" id="gender-{{index}}" name="gender">
              <input type="hidden" placeholder="Raza*" id="race-{{index}}" name="race">
              <input type="hidden" id="weight-{{index}}" name="weight">
              <input type="hidden" id="size-{{index}}" name="size" >
              <input type="hidden" id="diseases-{{index}}" name="diseases" >
              <input type="hidden" id="veterinary-{{index}}" name="veterinary">
              <input type="hidden" id="veterinaryPhone-{{index}}" name="veterinaryPhone">
              <input type="hidden" id="treatments-{{index}}" name="treatments"></textarea>
              <input type="hidden" id="lastVaccine-{{index}}" name="lastVaccine"></textarea>
              <input type="hidden" id="isAgressived-f876f6d-301a-4129-a2d8-72606f1c21a0-{{index}}" value="df876f6d-301a-4129-a2d8-72606f1c21a0" name="isAgressive">
              <input type="hidden" id="observation-{{index}}" name="observation" ></textarea>
              <input type="hidden" id="initZeal-{{index}}" name="initZeal" class="ms-input-calendar">        
              <input type="hidden" id="lastZeal-{{index}}" name="lastZeal" class="ms-input-calendar">
            </form>
          </li>
        {{/each}}
      </script>

      <script id="store-pet-template" type="text/x-custom-template">
        {{#with pets}}
          <div class="ms-tab-item active">
            <a href="#panel-{{index}}" class="ms-tab-header">Perro n° {{idx}}:</a>
            <div class="ms-tab-body" id="panel-{{index}}" style="display: block;">
              <form id="frm-store-pet-{{index}}" class="frm-pets checked-form">

                <input type="hidden" id="id-{{index}}" name="id">
                <input type="hidden" name="active" id="active-{{index}}" value="1cca03ea-07dc-11eb-ab06-50e549398ade">
                <input type="hidden" id="other-{{index}}" name="other" placeholder="">

                <div class="ms-panel">
                  <div class="ms-panel-header">Datos Básicos</div>
                  <div class="ms-panel-body">

                    <div class="ms-wrap-img">
                      <label class="ms-img-pf" for="avatar-{{index}}">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png" data-image-default="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png" alt="">
                      </label>
                      <!--<button class="ms-picture ms-picture-jr" type="button">Cambiar imagen</button>-->
                      <label class="ms-picture" for="avatar-{{index}}">Cambiar imagen</label>
                      <input type="file" class="ms-pass" accept="image/*">
                      <input type="file" accept="image/*" id="avatar-{{index}}" class="ms-picture-file">
                      <input type="hidden" id="image-{{index}}" class="ms-pass" name="image">
                      <span class="ms-img-size">imagenes menos de 2Mb</span>
                      <span class="ms-img-size error-size"></span>
                    </div>

                    <div class="ms-wrap-inputs">
                      <span class="ms-label">Campo obligartorio*</span>
                      <div class="ms-form-input"><input type="text" placeholder="Nombre*" id="name-{{index}}" name="name" required></div>
                      <div class="ms-form-input small"><input type="text" placeholder="Edad*" id="age-{{index}}" name="age" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required></div>
                      <div class="ms-form-input small">
                        <select name="gender" id="gender-{{index}}" required>
                          <option value="HEMBRA" selected>Hembra</option>
                          <option value="MACHO">Macho</option>
                        </select>
                      </div>
                      <div class="ms-form-input"><input type="text" placeholder="Raza*" id="race-{{index}}" name="race" required></div>
                    </div>
                  </div>
                </div>
                <div class="ms-panel">
                  <div class="ms-panel-header">Datos Médicos</div>
                  <div class="ms-panel-body">            
                    <div class="ms-wrap-inputs">
                      <span class="ms-label">Campo obligartorio*</span>
                      <div class="ms-form-input small"><input type="text" id="weight-{{index}}" name="weight" placeholder="Peso en kg" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></div>
                      <div class="ms-form-input small margin"><input type="text" id="size-{{index}}" name="size" placeholder="Talla en cm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></div>
                      <div class="ms-form-input full"><textarea id="diseases-{{index}}" name="diseases" placeholder="Enfermedades y condiciones pre existentes"></textarea></div>
                      <div class="ms-form-input"><input type="text" id="veterinary-{{index}}" name="veterinary" placeholder="Nombre del veterinario*" required></div>
                      <div class="ms-form-input small"><input type="text" id="veterinaryPhone-{{index}}" name="veterinaryPhone" placeholder="Teléfono" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></div>
                      <div class="ms-form-input full"><textarea id="treatments-{{index}}" name="treatments" placeholder="Tratamientos recibidos"></textarea></div>
                      <div class="ms-form-input full"><textarea id="lastVaccine-{{index}}" name="lastVaccine" placeholder="Última vacuna"></textarea></div>
                      <div class="ms-form-input small">
                        <span class="ms-min-title">¿Es agresivo?</span>
                        <ul class="ms-wrap-opt">
                          <li>
                            <input type="radio" value="df876f6d-301a-4129-a2d8-72606f1c21a0" id="isAgressived-f876f6d-301a-4129-a2d8-72606f1c21a0-{{index}}" class="ms-pass" name="isAgressive">
                            <label for="isAgressived-f876f6d-301a-4129-a2d8-72606f1c21a0-{{index}}">Sí</label>
                          </li>
                          <li>
                          <input type="radio" value="7cd24279-5dfa-45ca-8fb5-6a730359721d" id="isAgressive-7cd24279-5dfa-45ca-8fb5-6a730359721d-{{index}}" class="ms-pass" name="isAgressive">
                            <label for="isAgressive-7cd24279-5dfa-45ca-8fb5-6a730359721d-{{index}}">No</label>
                          </li>
                        </ul>
                      </div>
                      <div class="ms-form-input"><textarea id="observation-{{index}}" name="observation" placeholder="Depende (explicar)"></textarea></div>
                      <div class="ms-form-input small mediun"><input type="text" id="initZeal-{{index}}" name="initZeal" placeholder="Inicio fecha de celo" class="ms-input-calendar"></div>
                      <div class="ms-form-input small mediun"><input type="text" id="lastZeal-{{index}}" name="lastZeal" placeholder="Final fecha de celo" class="ms-input-calendar"></div>
                      
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        {{/with}}
      </script>

      <div id="userProfile">
        <div class="ms-wrap-section">
          <div class="ms-dog-list">
            <span class="count-pets" style="padding-bottom:4px; display: block"></span>
            <ul class="ms-dogs"></ul>
          </div>
        </div>
      </div>

      <div id="acordeon" class="ms-wrap-ft container-pets-add"></div>

      <div class="ms-msg-note">
        <strong>!Recuerda!</strong> debes traer la comida de tu engreido así como también alguna manta o juguete especial, para más detalles <a href="#" class="ms-show-trmd">ver términos y condiciones</a>
      </div>
      <div class="ms-wrap-chk">
        <input type="checkbox" value="1" name="terms" id="terms" checked>
        <label for="terms">Declaro que todos los datos registrados en este documento son verdaderos y me responsabilizo por cualquier dato falso u omisión, así como las consecuencias de las mismas.</label>
        <span class="msg-error-terms"></span>
      </div>
      <div class="ms-wrap-btn">       
        <button class="ms-btn lg bg-sc" id="save-step-pets">Continuar</button>
      </div>
    </div>
  </div>
</section>

<div class="ms-modal" id="modal-terminos-comida" tabindex="-1" role="dialog">
  <div class="ms-wrap-modal small">
    <div class="ms-modal-content">
      <div class="ms-modal-header">
        <span class="ms-title-modal">¿Porqué debo traer la comida de mi engreido?</span>
      </div>
      <div class="ms-modal-body">
        <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum:</p>
        <ul class="ms-dtl-list">
          <li>lorem ipsum</li>
          <li>lorem ipsum</li>
          <li>lorem ipsum</li>
          <li>lorem ipsum</li>
        </ul>
      </div>
      <div class="ms-modal-footer">
        <button class="ms-btn save close-modal" data-remove="remove">Entiendo</button>
      </div>
    </div>
  </div>
  <div class="ms-layout-modal close-modal" data-remove="remove"></div>
</div>


<!--MODAL PET EDIT -->
<div class="ms-modal" id="modal-edit" tabindex="-1" role="dialog">
  <div class="ms-wrap-modal large">
    <div class="ms-modal-content">
      <div class="ms-modal-body">
        
        <div class="ms-tab-body">
          <form id="frm-edit-pet" novalidate="novalidate">
            <input type="hidden" id="active-edit-pet" name="active">
            <input type="hidden" id="id-edit-pet" name="id">
            <input type="hidden" id="customerId-edit-pet" name="customerId" required>
            <input type="hidden" id="image-1" class="ms-pass" name="image" value="">
            <div class="ms-panel">
              <div class="ms-panel-header">Datos Básicos</div>
              <div class="ms-panel-body">

                <div class="ms-wrap-img">
                  <label class="ms-img-pf" for="pet-01">
                    <img id="preview" src="" data-image-defult="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png">
                  </label>
                  <button class="ms-picture ms-picture-edit" data-label="#pet-01" type="button">Cambiar imagen</button>
                  <input type="file" accept="image/*" id="pet-01" name="image-control" accept="image/*" class="ms-picture-file">
                  <span class="ms-img-size">imágenes menos de 2Mb</span>
                  <span class="ms-img-size error-size"></span>
                </div>
                
                <div class="ms-wrap-inputs">
                  <span class="ms-label">Campo obligartorio*</span>
                  <div class="ms-form-input"><input type="text" placeholder="Nombre*" id="name-edit-pet" name="name" required></div>
                  <div class="ms-form-input small"><input type="text" placeholder="Edad*" id="age-edit-pet" name="age" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required></div>
                  <div class="ms-form-input small">
                    <select name="gender" id="gender-edit-pet" required class="valid" aria-invalid="false">
                      <option value="HEMBRA" selected="">Hembra</option>
                      <option value="MACHO">Macho</option>
                    </select>
                  </div>
                  <div class="ms-form-input"><input type="text" placeholder="Raza*" id="race-edit-pet" name="race" required></div>
                </div>
              </div>
            </div>
            <div class="ms-panel">
              <div class="ms-panel-header">Datos Médicos</div>
              <div class="ms-panel-body">            
                <div class="ms-wrap-inputs">
                  <span class="ms-label">Campo obligartorio*</span>
                  <div class="ms-form-input small"><input type="text" placeholder="Peso en kg" id="weight"name="weight" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></div>
                  <div class="ms-form-input small margin"><input type="text" placeholder="Talla en cm" id="size-edit-pet" name="size" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"></div>
                  <div class="ms-form-input full"><textarea placeholder="Enfermedades y condiciones pre existentes" id="diseases-edit-pet" name="diseases"></textarea></div>
                  <div class="ms-form-input"><input type="text" placeholder="Nombre del veterinario*" id="veterinary-edit-pet" name="veterinary" required></div>
                  <div class="ms-form-input small"><input type="text" placeholder="Teléfono" id="veterinaryPhone-edit-pet" name="veterinaryPhone"></div>
                  <div class="ms-form-input full"><textarea placeholder="Tratamientos recibidos" id="treatments-edit-pet" name="treatments"></textarea></div>
                  <div class="ms-form-input full"><textarea placeholder="Última vacuna" id="lastVaccine-edit-pet" name="lastVaccine"></textarea></div>
                  <div class="ms-form-input small">
                    <span class="ms-min-title">¿Es agresivo?</span>
                    <ul class="ms-wrap-opt">
                      <li>
                        <input type="radio" value="df876f6d-301a-4129-a2d8-72606f1c21a0" id="isAgressive-df876f6d-301a-4129-a2d8-72606f1c21a0" class="ms-pass" name="isAgressive">
                        <label for="isAgressive-df876f6d-301a-4129-a2d8-72606f1c21a0">Sí</label>
                      </li>
                      <li>
                        <input type="radio" value="7cd24279-5dfa-45ca-8fb5-6a730359721d" id="isAgressive-7cd24279-5dfa-45ca-8fb5-6a730359721d" class="ms-pass" name="isAgressive">
                        <label for="isAgressive-7cd24279-5dfa-45ca-8fb5-6a730359721d">No</label>
                      </li>
                    </ul>
                  </div>
                  <div class="ms-form-input"><textarea placeholder="Depende (explicar)" id="observation-edit-pet" name="observation"></textarea></div>
                  <div class="ms-form-input small mediun"><input type="text" id="initZeal-edit-pet" name="initZeal" placeholder="Inicio fecha de celo" class="ms-input-calendar"></div>
                  <div class="ms-form-input small mediun"><input type="text" id="lastZeal-edit-pet" name="lastZeal" placeholder="Final fecha de celo" class="ms-input-calendar"></div>
                  <div class="ms-form-input full"><textarea placeholder="Comida y cama o manta en que duerme" id="other-edit-pet" name="other"></textarea></div>
              </div>
            </div>
          </form>
        </div>

      </div>
      <div class="ms-modal-footer">
        <button class="ms-btn cancel close-modal" data-remove="remove">Cancelar</button>
        <button class="ms-btn save" type="button" id="btn-edit-pet">Aceptar</button>
      </div>
    </div>
  </div>
  <div class="ms-layout-modal close-modal" data-remove="remove"></div>
  </div>
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
  var calendarInput = jQuery(".ms-input-calendar");
  if(calendarInput.length){
    calendarInput.each(function() {
      var calendarParent = jQuery(this).parent();
      var calendarId = jQuery(this).attr("id");
      jQuery("#"+calendarId).datepicker({
        beforeShow:function(textbox, instance){
          calendarParent.append(jQuery('#ui-datepicker-div'));
        }
      });
    });
  }

  jQuery(document).on('click', '.ms-show-trmd', function(e) {
    e.preventDefault();
    jQuery("body").addClass('modal-open');
    jQuery("#modal-terminos-comida").fadeIn();
	});
</script>