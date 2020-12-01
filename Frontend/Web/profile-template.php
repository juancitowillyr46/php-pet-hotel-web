<?php 
/*Template Name: Template User Profile*/
get_header(); ?>
<section id="userProfile" class="ms-animate">
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos.png">
    <div class="ms-wrap-section">
      <span class="user-info-tpl"></span>

      <script id="user-template" type="text/x-custom-template">
        {{#with customer}}
          <div class="ms-wrap-img">
            <label class="ms-img-pf" for="user-01">
                {{#if image}}
                  <img src="{{image}}" alt="{{firstName}}">
                {{else}}
                  <img src="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png" alt="{{firstName}}">
                {{/if}}
            </label>
            <button type="button" class="ms-picture xms-picture-edit ms-edit-customer btn-get-customer" data-customer-id="{{id}}" data-label="#user-01">Cambiar imagen</button>
            <!-- <input type="file" accept="image/*" id="user-01" class="ms-picture-filex"> -->
          </div>
          <div class="ms-user-info">
            <div class="ms-input user">
              <span>{{firstName}} {{lastName}}</span>
              <button data-tool="Editar" class="ms-edit ms-edit-customer btn-get-customer" data-customer-id="{{id}}">Editar</button>
            </div>
            <div class="ms-input adress">
              <span>{{address}}</span>
              <button type="button" data-tool="Editar" class="ms-edit ms-edit-customer btn-get-customer" data-customer-id="{{id}}">Editar</button>
            </div>
          </div>
        {{/with}}
      </script>

      <script id="hidden-template" type="text/x-custom-template">
        {{#each pets}}
            <li>
              <div class="ms-card ms-edit-pet btn-get-pet" data-pet-id="{{id}}"  data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black_.png">
                <div class="ms-wrap-img">
                  {{#if image}}
                    <img src="{{image}}" alt="Can 1">
                  {{else}}
                    <img src="<?php echo get_template_directory_uri(); ?>/img/profile/dog.png" alt="Can 1">
                  {{/if}}
                </div>
                <div class="ms-can-info">
                  <h3 class="ms-name">{{name}}</h3>
                  <span class="ms-weight">
                    {{#if weight}}
                      <span>{{weight}}kg</span>
                    {{/if}}
                  <span class="ms-pedigree">{{race}}</span>
                  <span class="ms-height">
                    {{#if size}}
                      <span>{{size}}m</span>
                    {{/if}}
                  </span>
                </div>
                <button data-tool="Editar" class="ms-edit ms-edit-pet" data-pet-id="{{id}}">Editar</button>
              </div>
              <button data-tool="Eliminar" class="ms-delete ms-delete-pet" data-pet-id="{{id}}">Eliminar</button>
            </li>
        {{/each}}
      </script>

      <div class="ms-dog-list">
        <ul class="ms-dogs"></ul>
        <div class="ms-wrap-btn">
          <button data-tool="Anadir Perro" class="ms-btn add ms-edit-pet btn-get-pet">Añadir Perro</button>
        </div>
      </div>
    </div>
  </div>
</section>

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

<div class="ms-modal" id="modal-edit-customer" tabindex="-1" role="dialog">
  <div class="ms-wrap-modal large">
    <div class="ms-modal-content">
      <div class="ms-modal-body">
        
        <div class="ms-tab-body">
          <form id="frm-edit-customer" novalidate="novalidate">
            <input type="hidden" id="id-edit-customer" name="id">
            
            
            <input type="hidden" id="phone-edit-customer" name="phone">
            <input type="hidden" id="addressOptional-edit-customer" name="addressOptional">
            
            <input type="hidden" id="comments-edit-customer" name="comments">
            <input type="hidden" id="userId-edit-customer" name="userId">
            <input type="hidden" id="active-edit-customer" name="active">
            <!-- <input type="hidden" id="image-edit-customer" class="ms-pass" name="image">  -->
            <input type="hidden" id="image-defult" class="ms-pass" name="image" value="">
            <input type="hidden" id="email-edit-customer" class="ms-pass" name="email" value="">
            
            <div class="ms-panel">
              <div class="ms-panel-header">Datos Básicos</div>
              <div class="ms-panel-body">

                <div class="ms-wrap-img">
                  <label class="ms-img-pf" for="pet-02">
                    <img id="preview" src="" data-image-default="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png" >
                  </label>

                  <label class="ms-picture" for="avatar">Cambiar imagen</label>
                      <input type="file" class="ms-pass" accept="image/*">
                      <input type="file" accept="image/*" id="avatar" class="ms-picture-file">
                      <input type="hidden" id="image" class="ms-pass" name="image">
                      <span class="ms-img-size">imagenes menos de 2Mb</span>
                      <span class="ms-img-size error-size"></span>

                  <!-- <button type="button" class="ms-picture ms-picture-edit" data-label="#pet-02" type="button">Cambiar imagen</button>
                  <input type="file" accept="image/*" id="pet-02" name="image-control" accept="image/*" class="ms-picture-file-customer">
                  <span class="ms-img-size">imágenes menos de 2Mb</span>
                  <span class="ms-img-size error-size"></span> -->
                </div>
                
                <div class="ms-wrap-inputs">
                  <span class="ms-label">Campo obligartorio*</span>
                  <div class="ms-form-input full"><input type="text" placeholder="Nombre*" id="firstName-edit-customer" name="firstName" required></div>
                  <div class="ms-form-input full"><input type="text" placeholder="Apellidos*" id="lastName-edit-customer" name="lastName" required></div>
                  <div class="ms-form-input full">
                    <select id="district-id" name="districtId" required>
                      <option value="" selected>Distrito*</option>
                    </select>
                  </div>
                  <div class="ms-form-input full"><textarea placeholder="Dirección*" id="address-edit-customer" name="address" required></textarea></div>
                  <div class="ms-form-input full"><textarea placeholder="Referencias" id="address-reference-edit-customer" name="addressReference" required></textarea></div>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
      <div class="ms-modal-footer">
        <button class="ms-btn cancel close-modal" data-remove="remove">Cancelar</button>
        <button class="ms-btn save" type="button" id="btn-edit-customer">Aceptar</button>
      </div>
    </div>
  </div>
  <div class="ms-layout-modal close-modal" data-remove="remove"></div>
</div>

<!--MODAL CROPP-->
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

<div class="ms-modal" id="modal-delete" tabindex="-1" role="dialog">
  <div class="ms-wrap-modal small">
    <div class="ms-modal-content">
      <div class="ms-modal-header">
        <span class="ms-title">Eliminar mascota</span>
      </div>
      <div class="ms-modal-body" style="text-align: center;">
        <span class="ms-icon-eliminar ms-spxv"></span>
        <p>¿Estas seguro de querer eliminar tu mascota?</p>
      </div>
      <div class="ms-modal-footer" style="justify-content: center;">
        <button class="ms-btn cancel close-modal" data-remove="remove">Cancelar</button>
        <button class="ms-btn save btn-delete-pet">Aceptar</button>
      </div>
    </div>
  </div>
  <div class="ms-layout-modal close-modal" data-remove="remove"></div>
</div>

<?php get_footer();?>

<script type="text/javascript">
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

  jQuery(document).on('click', '.ms-delete-pet', function(e) {
    e.preventDefault();
    jQuery("body").addClass('modal-open');
    jQuery("#modal-delete").fadeIn();
    jQuery("#modal-delete").attr("data-pet-id", jQuery(this).data("pet-id"));
  });

</script>