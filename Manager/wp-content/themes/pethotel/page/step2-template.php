<?php 
/*Template Name: Template Payment Step two*/
get_header(); ?>
<section id="userPayment" class="ms-animate">
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos.png">
    <div class="ms-wrap-section">

    <?php 
        $matchFound = (array_key_exists("serviceSpecial", $_GET));
        $home = "http://".$_SERVER['HTTP_HOST'];
      ?>
      <?php if($matchFound != 1) { ?>
        <ul class="ms-step-list">
          <li class="checked">
            <a href="/step1" class="ms-number">1</a>
            <span class="ms-detail">Identifica <br>tu mascota</span>
          </li>
          <li class="active">
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
      <?php } else { ?>
        <ul class="ms-step-list">
          <li>
            <span class="ms-number">1</span>
            <span class="ms-detail">Identifica <br>tu mascota</span>
          </li>
          <li class="active">
            <span class="ms-number">2</span>
            <span class="ms-detail">Datos <br>de contacto</span>
          </li>
          <li>
            <span class="ms-number">3</span>
            <span class="ms-detail">Pago</span>
          </li>
          <!-- <li>
            <span class="ms-number">4</span>
            <span class="ms-detail">Pago</span>
          </li> -->
        </ul>
      <?php } ?>


      <div class="ms-header-step">
        <h1 class="ms-title">DATOS DE CONTACTO</h1>
      </div>

      <div class="ms-wrap-ft">
        <div class="ms-tab-item">
          <div class="ms-tab-body padding">
            <form id="frm-store-customer">
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="userId" id="userId" value="">
              <input type="hidden" name="active" id="active" value="1cca03ea-07dc-11eb-ab06-50e549398ade">
              <input type="hidden" name="addressOptional" id="addressOptional" placeholder="Dirección opcional">
              <div class="ms-panel">
                <div class="ms-panel-body">
                  <div class="ms-wrap-img">
                    <div class="ms-img-pf">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/profile/user-avatar.png" data-image-default="<?php echo get_template_directory_uri(); ?>/img/profile/pet-avatar.png">
                    </div>
                    <label class="ms-picture" for="avatar">Cambiar imagen</label>
                    <input type="file" class="ms-pass" accept="image/*">
                    <input type="file" accept="image/*" id="avatar" class="ms-picture-file">
                    <input type="hidden" id="image" class="ms-pass" name="image">
                    <span class="ms-img-size">imagenes menos de 2Mb</span>
                    <span class="ms-img-size error-size"></span>
                  </div>
                  <div class="ms-wrap-inputs">
                    <span class="ms-label">Campo obligartorio*</span>
                    <div class="ms-form-input small mediun"><input type="text" id="firstName" name="firstName" placeholder="Nombre*" required></div>
                    <div class="ms-form-input small mediun"><input type="text" id="lastName" name="lastName" placeholder="Apellido*" required></div>
                    <div class="ms-form-input small mediun"><input type="text" id="phone" name="phone" placeholder="Número principal de contacto" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required></div>
                    <div class="ms-form-input small mediun"><input type="email" id="email" name="email" placeholder="Correo*" required></div>
                    <div class="ms-form-input full">
                      <select id="district-id" name="districtId" required>
                        <option value="" selected>Distrito*</option>
                      </select>
                    </div>
                    <div class="ms-form-input full"><input type="text" id="address" name="address" placeholder="Dirección principal"></div>
                    <div class="ms-form-input full"><textarea placeholder="Referencias" id="address-reference-edit-customer" name="addressReference"></textarea></div>
                    <!-- <div class="ms-form-input full"><input type="text" id="addressOptional" name="addressOptional" placeholder="Dirección opcional"></div> -->
                    <div class="ms-form-input full"><textarea id="comments" name="comments" placeholder="Comentarios adicionales"></textarea></div>
                    
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="ms-wrap-btn">
        <?php if($matchFoundDoggy != 1) { ?>
          <a href="/step1/?serviceSpecial=<?php print $_GET['serviceSpecial'] ?>" class="ms-btn">Volver</a>
          <button class="ms-btn bg-sc" id="save-step-customer">Continuar</button>
        <?php } else { ?>
          <a href="/step1" class="ms-btn">Volver</a>
          <button class="ms-btn bg-sc" id="save-step-customer">Continuar</button>
          <?php } ?>
      </div>
    </div>
  </div>
</section>

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
