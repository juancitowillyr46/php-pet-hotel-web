<?php 
/*Template Name: Template User Profile*/
get_header(); ?>
<section id="userProfile" class="ms-animate">
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos.png">
    <div class="ms-wrap-section">
      <span class="user-info-tpl"></span>
      <!-- <div class="ms-wrap-img">
        <label class="ms-img-pf" for="user-01">
          <img src="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png" alt="Eduardo Rodriguez">
        </label>
        <button class="ms-picture ms-picture-edit" data-label="#user-01">Cambiar imagen</button>
        <input type="file" accept="image/*" id="user-01" class="ms-picture-file">
      </div>
      <div class="ms-user-info">
        <div class="ms-input user">
          <span>Eduardo Rodriguez</span>
          <button data-tool="Editar" class="ms-edit">Editar</button>
        </div>
        <div class="ms-input adress">
          <span>Calle Garcia y Garcia 121, La victoria</span>
          <button data-tool="Editar" class="ms-edit">Editar</button>
        </div>
      </div> -->

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
            <button class="ms-picture xms-picture-edit ms-edit-customer btn-get-customer" data-customer-id="{{id}}" data-label="#user-01">Cambiar imagen</button>
            <!-- <input type="file" accept="image/*" id="user-01" class="ms-picture-filex"> -->
          </div>
          <div class="ms-user-info">
            <div class="ms-input user">
              <span>{{firstName}}</span>
              <button data-tool="Editar" class="ms-edit ms-edit-customer btn-get-customer" data-customer-id="{{id}}">Editar</button>
            </div>
            <div class="ms-input adress">
              <span>{{address}}</span>
              <button data-tool="Editar" class="ms-edit ms-edit-customer btn-get-customer" data-customer-id="{{id}}">Editar</button>
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
            </li>
        {{/each}}
      </script>

      <div class="ms-dog-list">
        <ul class="ms-dogs">
          <!-- <li>
            <div class="ms-card ms-edit-pet" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black_.png">
              <div class="ms-wrap-img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/profile/dog.png" alt="Can 1">
              </div>
              <div class="ms-can-info">
                <h3 class="ms-name">Fido</h3>
                <span class="ms-weight">15kg</span>
                <span class="ms-pedigree">Labrador</span>
                <span class="ms-height">1.2m</span>
              </div>
              <button data-tool="Editar" class="ms-edit ms-edit-pet">Editar</button>
            </div>
          </li>
          <li>
            <div class="ms-card ms-edit-pet" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black_.png">
              <div class="ms-wrap-img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/profile/dog.png" alt="Can 1">
              </div>
              <div class="ms-can-info">
                <h3 class="ms-name">Fido</h3>
                <span class="ms-weight">15kg</span>
                <span class="ms-pedigree">Labrador</span>
                <span class="ms-height">1.2m</span>
              </div>
              <button data-tool="Editar" class="ms-edit ms-edit-pet">Editar</button>
            </div>
          </li> -->
        </ul>
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
            <input type="hidden" id="active" name="active">
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="customerId" name="customerId" required>
            <input type="hidden" id="image" class="ms-pass" name="image"> 
            <input type="hidden" id="image-defult" class="ms-pass" name="image" value="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png">
            <div class="ms-panel">
              <div class="ms-panel-header">Datos Básicos</div>
              <div class="ms-panel-body">

                <div class="ms-wrap-img">
                  <label class="ms-img-pf" for="pet-01">
                    <img id="preview" src="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png">
                  </label>
                  <button class="ms-picture ms-picture-edit" data-label="#pet-01" type="button">Cambiar imagen</button>
                  <input type="file" accept="image/*" id="pet-01" name="image-control" accept="image/*" class="ms-picture-file">
                  <span class="ms-img-size">imágenes menos de 2Mb</span>
                </div>
                
                <div class="ms-wrap-inputs">
                  <span class="ms-label">Campo obligartorio*</span>
                  <div class="ms-form-input"><input type="text" placeholder="Nombre*" id="name" name="name" required></div>
                  <div class="ms-form-input small"><input type="text" placeholder="Edad*" id="age" name="age" required></div>
                  <div class="ms-form-input small"><input type="text" placeholder="Género*" id="gender" name="gender" required></div>
                  <div class="ms-form-input"><input type="text" placeholder="Raza*" id="race" name="race" required></div>
                </div>
              </div>
            </div>
            <div class="ms-panel">
              <div class="ms-panel-header">Datos Médicos</div>
              <div class="ms-panel-body">            
                <div class="ms-wrap-inputs">
                  <span class="ms-label">Campo obligartorio*</span>
                  <div class="ms-form-input small"><input type="text" placeholder="Peso" id="weight"name="weight"></div>
                  <div class="ms-form-input small margin"><input type="text" placeholder="Talla" id="size" name="size"></div>
                  <div class="ms-form-input full"><textarea placeholder="Enfermedades y condiciones pre existentes" id="diseases" name="diseases"></textarea></div>
                  <div class="ms-form-input"><input type="text" placeholder="Nombre del veterinario*" id="veterinary" name="veterinary" required></div>
                  <div class="ms-form-input small"><input type="text" placeholder="Teléfono" id="veterinaryPhone" name="veterinaryPhone"></div>
                  <div class="ms-form-input full"><textarea placeholder="Tratamientos recibidos" id="treatments" name="treatments"></textarea></div>
                  <div class="ms-form-input full"><textarea placeholder="Última vacuna" id="lastVaccine" name="lastVaccine"></textarea></div>
                  <div class="ms-form-input small">
                    <span class="ms-min-title">¿Es agresivo?</span>
                    <ul class="ms-wrap-opt">
                      <li>
                        <!-- <input type="radio" value="1" name="opt1" id="opt1"> -->
                        <input type="radio" value="true" id="isAgressiveTrue" class="ms-pass" name="isAgressive">
                        <label for="isAgressiveTrue">Sí</label>
                      </li>
                      <li>
                        <!-- <input type="radio" value="2" name="opt1" id="opt2"> -->
                        <input type="radio" value="false" id="isAgressiveFalse" class="ms-pass" name="isAgressive">
                        <label for="isAgressiveFalse">No</label>
                      </li>
                    </ul>
                  </div>
                  <div class="ms-form-input"><textarea placeholder="Depende (explicar)" id="observation" name="observation"></textarea></div>
                  <div class="ms-form-input mediun"><input type="text" placeholder="Fecha de celo" id="lastZeal" name="lastZeal"></div>
                  <div class="ms-form-input full"><textarea placeholder="Comida y cama o manta en que duerme" id="other" name="other"></textarea></div>
                </div>
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

<div class="ms-modal" id="modal-edit-customer" tabindex="-1" role="dialog">
  <div class="ms-wrap-modal large">
    <div class="ms-modal-content">
      <div class="ms-modal-body">
        
        <div class="ms-tab-body">
          <form id="frm-edit-customer" novalidate="novalidate">
            <input type="hidden" id="id" name="id">
            
            <input type="hidden" id="lastName" name="lastName">
            <input type="hidden" id="phone" name="phone">
            <input type="hidden" id="addressOptional" name="addressOptional">
            
            <input type="hidden" id="comments" name="comments">
            <input type="hidden" id="userId" name="userId">
            <input type="hidden" id="active" name="active">
            <input type="hidden" id="image" class="ms-pass" name="image"> 
            <input type="hidden" id="image-defult" class="ms-pass" name="image" value="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png">
            <div class="ms-panel">
              <div class="ms-panel-header">Datos Básicos</div>
              <div class="ms-panel-body">

                <div class="ms-wrap-img">
                  <label class="ms-img-pf" for="pet-02">
                    <img id="preview" src="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png">
                  </label>
                  <button type="button" class="ms-picture ms-picture-edit" data-label="#pet-02" type="button">Cambiar imagen</button>
                  <input type="file" accept="image/*" id="pet-02" name="image-control" accept="image/*" class="ms-picture-file-customer">
                  <span class="ms-img-size">imágenes menos de 2Mb</span>
                </div>
                
                <div class="ms-wrap-inputs">
                  <span class="ms-label">Campo obligartorio*</span>
                  <div class="ms-form-input full"><input type="text" placeholder="Nombre*" id="firstName" name="firstName" required></div>
                  <div class="ms-form-input full"><textarea placeholder="Dirección*" id="address" name="address" required></textarea></div>
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
<?php get_footer();?>