<?php 
/*Template Name: Template Services Grooming*/
get_header(); ?>
<section id="default" class="ms-animate ms-services-page">
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos.png">
    <div class="ms-header-section bg-sc pt-white" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_white.png">
      <h1 class="ms-title">Grooming</h1>
    </div>

    <div class="ms-wrap-section">

      <div class="ms-section-flex">
        <div class="ms-info-servicio">
          <div class="ms-item-info msx-400">
            <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/servicios_02.png" alt="Pet Hotel" class="ms-service-active">
            <p>Contamos con personal especializado y un área designada especialmente para el grooming, con bañeras, agua caliente y mesas de trabajo para atenderlos. El servicio de baño, secado  y/o corte de pelo se ofrecerá durante los días de hospedaje en base a la solicitud de los clientes. Utilizamos insumos de calidad, teniendo en cuenta las necesidades y cuidados que necesite cada perro; cuidando la piel y el pelaje de tu mascota.</p>
          </div>
        </div>
        
        <div class="ms-wrap-img">
          <div class="ms-slider swiper-container" id="slider-servicios1">
            <div class="swiper-wrapper">
              <div class="ms-item swiper-slide">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/pethotel/pethotelservicios_01.png" alt="Pet Hotel">
              </div>
              <div class="ms-item swiper-slide">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/pethotel/pethotelservicios_02.png" alt="Pet Hotel">
              </div>
              <div class="ms-item swiper-slide">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/pethotel/pethotelservicios_03.png" alt="Pet Hotel">
              </div>
              <div class="ms-item swiper-slide">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/pethotel/pethotelservicios_04.png" alt="Pet Hotel">
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>

      <div class="ms-info-cam">
        <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/cam-logo.png" alt="Pet Hotel">
        <p>Contamos con una App móvil que permite monitorear a tu mascota las 24 horas del día, los 7 días de la semana en tiempo real, que incluye cámaras distribuidas una en cada habitación y el resto en el área de jardines, Grooming y recepción. Podrás ver a tu engreído en el momento que lo desees.  Así mismo contamos con Supervisión, asistencia y vigilancia del personal encargado 24 hrs. La App contará con una opción mediante la cual podrás acceder al circuito integrado de cámaras y visualizar cuando desees a tu mascota en tiempo real a través de tu celular.</p>
      </div>

      <div class="ms-other-services">
        <h3 class="ms-title">Otros Servicios</h3>
        <ul class="ms-other-services-list">
          <li>
            <a href="/pet-hotel/" class="ms-item">
              <div class="ms-wrap-item" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/servicios_01.png" alt="Pet Grooming">
              </div>
              <h4 class="ms-title-list">Pet Hotel</h4>
            </a>
          </li>
          <li>
            <a href="/doggy-school/" class="ms-item">
              <div class="ms-wrap-item" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/servicios_03.png" alt="Doggy School">
              </div>
              <h4 class="ms-title-list">Doggy School</h4>
            </a>
          </li>
          <li>
            <a href="/pet-training/" class="ms-item">
              <div class="ms-wrap-item" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
                <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/servicios_04.png" alt="Pet training">
              </div>
              <h4 class="ms-title-list">Pet training</h4>
            </a>
          </li>
        </ul>
      </div>


    </div>
  </div>
</section>
<?php get_footer();?>