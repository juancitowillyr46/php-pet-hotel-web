<?php 
/*Template Name: Template See My Peth*/
get_header(); ?>

<section id="seePeth" class="ms-animate">
  <div class="ms-section">
    <h1 class="ms-title">SOLICITA TU CÓDIGO PARA<br> VISUALIZAR A TU ENGREIDO</h1>
    <p>Contamos con el servicio de <strong>APP PVPDFPKD FPDFF</strong> para que puedas observar desde donde te encuentres a tu perro, solo necesitas una conexión a internet y listo. Pide tu código de acceso en el siguiente link</p>
    <a href="https://www.me-app.net/HikvisionAppStore" class="ms-btn" target="_blank">Solicitar</a>
  </div>

  <div class="ms-wrap-img">
    <?php if (wp_is_mobile()) { ?>
    <img src="<?php echo get_template_directory_uri(); ?>/img/fondo-sp-mb.png" alt="Ver a mi mascota">
    <?php }else{ ?>
    <img src="<?php echo get_template_directory_uri(); ?>/img/fondo-sp-wb.png" alt="Ver a mi mascota">
    <?php } ?>
  </div>
</section>

<?php get_footer();?>