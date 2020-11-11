  <?php if (is_front_page()){ ?>
  <footer id="footer" class="ms-animate">
  <?php }else{ ?>
  <footer id="footer" class="ms-animate bf">
  <?php } ?>
    <div class="ms-wrap-footer">
      <a href="/" class="ms-footer-logo">
        <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/logo/logo_b.svg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel Shangrila">
      </a>

      <nav class="ms-footer-menu">
        <ul>
          <li><a href="/">Politicas de Privacidad</a></li>
          <li><a href="/">Términos y condiciones</a></li>
        </ul>
      </nav>

      <div class="ms-wrap-social">
        <h2 class="ms-title">Siguenos</h2>
        <ul class="ms-social-media">
          <li><a href="/" class="ms-icon-facebook">"Visitanos en Facebook</a></li>
          <li><a href="/" class="ms-icon-twitter">"Visitanos en Twitter</a></li>
          <li><a href="/" class="ms-icon-instagram">"Visitanos en Instagram</a></li>
          <li><a href="/" class="ms-icon-pinterest">"Visitanos en pinterest</a></li>
        </ul>
      </div>
    </div>
    <div class="ms-copyright">
      <p>© 2020 Freelance Team . Derechos Reservados</p>
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
          <form action="" class="ms-tab-body">
            <div class="ms-modal-body">
              <div class="ms-titulo-lgf">Título mensaje</div>
              <div class="ms-wrap-inputs">
                <div class="ms-form-input">
                  <input type="email" placeholder="Correo" id="emailRegister">
                </div>
                <div class="ms-form-input">
                  <input type="password" placeholder="Contraseña" id="passwordRegister" class="ms-pass">
                  <span class="ms-view-pass"></span>
                </div>
              </div>
            </div>
            <div class="ms-modal-footer">
              <button class="ms-btn save">Registrarme</button>
            </div>
            <a href="#" class="ms-terms">Terminos y condiciones</a>
          </form>
        </div>
        <div id="tabLogin" class="ms-tab-item">
          <form action="" class="ms-tab-body">
            <div class="ms-modal-body">
              <div class="ms-titulo-lgf">Título mensaje</div>
              <div class="ms-wrap-inputs">
                <div class="ms-form-input">
                  <input type="email" placeholder="Correo" id="emailLogin">
                </div>
                <div class="ms-form-input">
                  <input type="password" placeholder="Contraseña" id="passwordLogin" class="ms-pass">
                  <span class="ms-view-pass"></span>
                </div>
              </div>
            </div>
            <div class="ms-modal-footer">
              <button class="ms-btn save">Iniciar Sesión</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="ms-layout-modal close-modal" data-remove="remove"></div>
  </div>
  
  <?php wp_footer(); ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/swiper-bundle.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/cropper.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/base-service.js"></script>
  </body>
</html>