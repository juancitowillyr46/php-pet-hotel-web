<?php 
/*Template Name: Template Thankyou Page*/
get_header(); ?>
<section id="thankyou" class="ms-animate">
<style>body{background-color: #f4f4f4;}</style>
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos.png" class="ms-wrap-content">
    <div class="ms-wrap-section" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
      <h1 class="ms-title">¡MUCHAS GRACIAS!</h1>
      <p>Estaremos confirmando tu reserva y tu pago a la brevedad. <strong>Te llegará un correo con la cofirmacion</strong> y tu engreido podrá disfrutar de unos dias maravillosos.</p>
      <p><strong>¡Nos vemos!.</strong></p>
      <div class="ms-wrap-img">
        <img src="<?php echo get_template_directory_uri(); ?>/img/bus.png" alt="thanks">
      </div>
    </div>
  </div>
</section>
<?php get_footer();?>