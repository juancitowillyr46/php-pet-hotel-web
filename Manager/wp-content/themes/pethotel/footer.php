<?php if (is_front_page()){ ?>
  <footer id="footer" class="ms-animate">
  <?php }else{ ?>
  <footer id="footer" class="ms-animate bf">
  <?php } ?>
    <div class="ms-wrap-footer">
      <a href="/" class="ms-footer-logo">
        <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/logo/logo_b.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel Shangrila">
      </a>

      <nav class="ms-footer-menu">
        <ul>
          <!--<li><a href="/">Politicas de Privacidad</a></li>-->
          <li><a href="/terminos-y-condiciones">Términos y condiciones</a></li>
        </ul>
      </nav>

      <div class="ms-wrap-social">
        <h2 class="ms-title">Siguenos</h2>
        <ul class="ms-social-media">
          <li><a href="https://www.facebook.com/pethotelshangrila/" class="ms-icon-facebook" target="_blank">"Visitanos en Facebook</a></li>
          <li><a href="https://www.instagram.com/pet_hotel_shangrila/?igshid=h2bsaat1xrvc" class="ms-icon-instagram" target="_blank">"Visitanos en Instagram</a></li>
        </ul>
      </div>
    </div>
    <div class="ms-copyright">
      <p>© 2020 Pet Hotel Shangrila. Derechos Reservados</p>
    </div>
  </footer>

  <div class="ms-modal" id="modal-login-register" tabindex="-1" role="dialog">
    <div class="ms-wrap-modal small">
      <div class="ms-modal-content">
        <div class="ms-header-group">
          <a class="ms-tab-btn active" data-tab="tabLogin">Iniciar Sesión</a>
          <a class="ms-tab-btn" data-tab="tabRegister">Registrate</a>
        </div>
        <div id="tabRegister" class="ms-tab-item active">
          <form id="frm-register" action="" class="ms-tab-body">
            <div class="ms-modal-body">
              <div class="ms-titulo-lgf">Título mensaje</div>
              <div class="ms-wrap-inputs">
                <div class="ms-form-input">
                  <input type="email" placeholder="Correo" id="emailRegister" name="username" required>
                </div>
                <div class="ms-form-input">
                  <input type="password" placeholder="Contraseña" id="passwordRegister" name="password" class="ms-pass" required>
                  <span class="ms-view-pass"></span>
                </div>
              </div>
            </div>
            <div class="ms-modal-footer">
              <a href="javascript:void(0)" class="ms-btn close-modal" data-remove="remove">Cancelar</a>
              <button class="ms-btn save" id="btn-register">Registrarme</button>
            </div>
            <a href="/terminos-y-condiciones" class="ms-terms" target="_blank">Términos y condiciones</a>
          </form>
        </div>
        <div id="tabLogin" class="ms-tab-item">
          <form id="frm-login" action="" class="ms-tab-body">
            <div class="ms-modal-body">
              <div class="ms-titulo-lgf">Título mensaje</div>
              <div class="ms-wrap-inputs">
                <div class="ms-form-input">
                  <input type="email" placeholder="Correo" id="emailLogin" name="username" required>
                </div>
                <div class="ms-form-input">
                  <input type="password" placeholder="Contraseña" id="passwordLogin" class="ms-pass" name="password" required>
                  <span class="ms-view-pass"></span>
                </div>
              </div>
            </div>
            <div class="ms-modal-footer">
              <a href="javascript:void(0)" class="ms-btn close-modal" data-remove="remove">Cancelar</a>
              <button class="ms-btn save" id="btn-login">Iniciar Sesión</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="ms-layout-modal close-modal" data-remove="remove"></div>
  </div>

  <div class="ms-modal" id="modal-loading" tabindex="-1" role="dialog">
    <div class="ms-wrap-modal small">
      <div class="ms-modal-content">
        <div class="ms-modal-body" style="text-align: center;">
          <span class="ms-icon-loading ms-spxv"></span>
          <p>¡Espere un momento por favor! <span>Estamos procesando los datos...</span></p>
        </div>
      </div>
    </div>
    <div class="ms-layout-modal"></div>
  </div>

  <div class="ms-modal" id="modal-error" tabindex="-1" role="dialog">
    <div class="ms-wrap-modal small">
      <div class="ms-modal-content">
        <div class="ms-modal-body" style="text-align: center;">
          <span class="ms-icon-warning ms-spxv"></span>
          <p>¡Vaya, encontramos algunos errores! <span class="message"></span></p>
          <div class="ms-modal-footer">
            <button class="ms-btn save close-modal" data-remove="remove">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="ms-layout-modal close-modal" data-remove="remove"></div>
  </div>
  
  <?php wp_footer(); ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/handlebars.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/swiper-bundle.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/cropper.min.js"></script>
  <script src="https://momentjs.com/downloads/moment.js"></script>
  <script src="http://isaaccambron.com/twix.js/twix.js/dist/twix.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/base-http.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/base-utils.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/base-service.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/base-transaction.js"></script>
  </body>
</html>