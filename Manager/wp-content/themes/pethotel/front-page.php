<?php 
get_header(); 
if (wp_is_mobile()) {
  $slider01 = get_template_directory_uri()."/img/slider/slider-01-mb.webp";
  $slider02 = get_template_directory_uri()."/img/slider/slider-02-mb.webp";
  $slider03 = get_template_directory_uri()."/img/slider/slider-03-mb.webp";
  $slider04 = get_template_directory_uri()."/img/slider/slider-04-mb.webp";
  $slider05 = get_template_directory_uri()."/img/slider/slider-05-mb.webp";
  $slider06 = get_template_directory_uri()."/img/slider/slider-06-mb.webp";
  $slider07 = get_template_directory_uri()."/img/slider/slider-07-mb.webp";
}else{
  $slider01 = get_template_directory_uri()."/img/slider/slider-01.png";
  $slider02 = get_template_directory_uri()."/img/slider/slider-02.png";
  $slider03 = get_template_directory_uri()."/img/slider/slider-03.png";
  $slider04 = get_template_directory_uri()."/img/slider/slider-04.png";
  $slider05 = get_template_directory_uri()."/img/slider/slider-05.png";
  $slider06 = get_template_directory_uri()."/img/slider/slider-06.png";
  $slider07 = get_template_directory_uri()."/img/slider/slider-07.png";
}
?>
<section id="welcome" class="ms-animate">
  <div class="ms-slider swiper-container" id="sliderWelcome">
    <div class="swiper-wrapper">
      <div class="ms-item swiper-slide">
        <img data-real-type="image" data-img="<?php echo $slider01; ?>" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="imagen1">
      </div>
      <div class="ms-item swiper-slide">
        <img data-real-type="image" data-img="<?php echo $slider02; ?>" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="imagen2">
      </div>
      <div class="ms-item swiper-slide">
        <img data-real-type="image" data-img="<?php echo $slider03; ?>" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="imagen3">
      </div>
      <div class="ms-item swiper-slide">
        <img data-real-type="image" data-img="<?php echo $slider04; ?>" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="imagen4">
      </div>
      <div class="ms-item swiper-slide">
        <img data-real-type="image" data-img="<?php echo $slider05; ?>" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="imagen5">
      </div>
      <div class="ms-item swiper-slide">
        <img data-real-type="image" data-img="<?php echo $slider06; ?>" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="imagen6">
      </div>
      <div class="ms-item swiper-slide">
        <img data-real-type="image" data-img="<?php echo $slider07; ?>" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="imagen7">
      </div>
    </div>
    <button class="swiper-button-next ms-icon-nav">Siguiente</button>
    <button class="swiper-button-prev ms-icon-nav">Anterior</button>
  </div>
  <div class="ms-calendar" id="reserva">
    <div class="ms-wrap-calendar">
      <div class="ms-border-calendar">
        <form id="frm-store-booking" style="display: flex; width: 100%;">
          <div class="ms-calendar-info" id="bookingBox">
            <div class="ms-item">
              <div class="startDate">
                <span class="ms-item-title">Check-in</span>
                <span class="ms-item-date">26<span class="ms-item-month">Jul</span></span>
              </div>
              <input type="text" id="startDate">
              <input type="hidden" name="dateTo" id="dateTo" required>
            </div>
            <div class="ms-item">
              <div class="endDate">
                <span class="ms-item-title">Check-out</span>
                <span class="ms-item-date">28<span class="ms-item-month">Jul</span></span>
              </div>
              <input type="text" id="endDate">
              <input type="hidden" name="dateFrom" id="dateFrom" required>
            </div>
            <div class="ms-item">
              <a href="javascript:void(0)" id="petCount">
                <span class="ms-item-title">Perros</span>
                <span class="ms-item-count">0</span>
              </a>
              <ul class="ms-count-list"></ul>
              <input type="hidden" name="numPets" id="numPets" required>
            </div>
          </div>
        </form>
        <button class="ms-btn icon-paw" id="save-step-booking" type="button" disabled>Reservar</button>
      </div>
      <span class="ms-bg-calendar"></span>
      <span class="ms-bg-a"></span>
      <span class="ms-bg-b"></span>

      <span class="ms-bg-s1"></span>
      <span class="ms-bg-s2"></span>
      <span class="ms-bg-s3"></span>
      <span class="ms-bg-s4"></span>
      <span class="ms-bg-s5"></span>
      <span class="ms-bg-s6"></span>
      <span class="ms-bg-s7"></span>
      <span class="ms-bg-s8"></span>
    </div>
    <div class="ms-pet-calendar">
      <div class="ms-wrap-pet-calendar">
        <div class="ms-bubble-pet">
          <span>Reserva</span> Aquí
        </div>
        <div class="pet">
          <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/pet-body/cabeza.svg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel Shangrila" class="ms-head-pet">
          <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/pet-body/cuerpo.svg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel Shangrila" class="ms-body-pet">
        </div>
      </div>
    </div>
  </div>
</section>

<section id="servicios" class="ms-animate">
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos.png">
    <div class="ms-header-section bg-sc pt-white" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_white.png">
      <h2 class="ms-title">Nuestros Servicios</h2>
    </div>

    <div class="ms-wrap-section">
      <p>Ofrecemos a tu mascota un servicio integral de <strong>cuidado, diversión, adiestramiento</strong> y <strong>seguridad</strong> en un amplio ambiente natural  donde tu mascota podrá correr, jugar, aprender, descansar y pasarla fenomenal!</p> <p>Además contamos con <strong>cámaras en todo el hotel</strong> y podrás ver a tu engreído en el momento que lo desees <strong>a través de una App</strong> en tu celular.</p>
      <ul class="ms-card-list">
        <li>
          <a href="/pet-hotel/" class="ms-card" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
            <div class="ms-card-info">
              <h3 class="ms-card-title icon-bone">Pet Hotel</h3>
              <p>Si tienes planes, vacaciones o un viaje programado y no sabes donde o con quién dejar a tu perro, esta es la solución para ti! Nosotros nos encargamos de cuidar de tu engreído por el periodo que no puedas hacerlo tú.</p>
              <span class="ms-link icon-paw">ver más</span>
            </div>
            <div class="ms-card-img">
              <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/pet-hotel.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel" class="ms-sm">
              <span>Pet Hotel</span>
            </div>
          </a>
          <a href="/grooming/" class="ms-card" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
            <div class="ms-card-info">
              <h3 class="ms-card-title icon-bone">Grooming</h3>
              <p>Contamos con personal especializado y un área designada especialmente para el grooming, con bañeras, agua caliente y mesas de trabajo para atenderlos.</p>
              <span class="ms-link icon-paw">ver más</span>
            </div>
            <div class="ms-card-img">
              <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/grooming.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Grooming">
              <span>Grooming</span>
            </div>
          </a>
        </li>
        <li>
          <a href="/doggy-school/" class="ms-card" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
            <div class="ms-card-info">
              <h3 class="ms-card-title icon-bone">Doggy School</h3>
              <p>Recogeremos a tu mascota por la mañana, en una movilidad adecuada, la trasladaremos al hotel, donde personal calificado la estará esperando para asegurarse que su estadía sea cómoda, agradable, segura y divertida.</p>
              <span class="ms-link icon-paw">ver más</span>
            </div>
            <div class="ms-card-img">
              <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/doggy-school.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Doggy School">
              <span>Doggy School</span>
            </div>
          </a>
          <a href="/pet-training/" class="ms-card" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
            <div class="ms-card-info">
              <h3 class="ms-card-title icon-bone">Pet training</h3>
              <p>Tienes una mascota muy traviesa y no tienes idea de cómo educarla? Nosotros lo hacemos por ti! Tenemos personal de entrenamiento altamente calificado para  que tu mascota aprenda de una manera efectiva.</p>
              <span class="ms-link icon-paw">ver más</span>
            </div>
            <div class="ms-card-img">
              <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/pet-training.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet training">
              <span>Pet training</span>
            </div>
          </a>
        </li>
      </ul>
      <!--<a href="/" class="ms-btn lg bg-sc">Ver más información</a>-->
    </div>
  </div>
</section>

<section id="testimonios" class="ms-animate">
  <div data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_huesos_white.png">
    <div class="ms-header-section bg-pr pt-white" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_white.png">
      <h2 class="ms-title">Testimonios</h2>
    </div>
    <div class="ms-wrap-section">
      <div class="ms-slider swiper-container" id="sliderTestimonial">
        <div class="swiper-wrapper">
          <div class="ms-item swiper-slide">
            <div class="ms-bubble">
              <div class="ms-wrap-bubble" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/bubble.png">
                <div class="ms-wrap-img">
                  <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/testimonios/avatar01.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Fernando Lopez">
                </div>
                <p>Pet Hotel me facilita la vida, cuando hay momentos en los que no puedo hacerme cargo de mi engreído.</p>
                <span class="ms-creator">-Roberto Foley</span>
              </div>
              <div class="ms-wrap-count">
                <div class="ms-bone-count">
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone"></span>
                </div>
                <!--<span class="ms-count">Hace un mes</span>-->
              </div>
            </div>
          </div>
          <div class="ms-item swiper-slide">
            <div class="ms-bubble">
              <div class="ms-wrap-bubble" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/bubble.png">
                <div class="ms-wrap-img">
                  <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/testimonios/avatar02.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Fernando Lopez">
                </div>
                <p>Ahora puedo dejar a mi perro y quedarme tranquila porque puedo ver como está a cualquier hora del dia y desde cualquier lugar.</p>
                <span class="ms-creator">-Patricia Noriega</span>
              </div>
              <div class="ms-wrap-count">
                <div class="ms-bone-count">
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone"></span>
                </div>
                <!--<span class="ms-count">Hace un mes</span>-->
              </div>
            </div>
          </div>
          <div class="ms-item swiper-slide">
            <div class="ms-bubble">
              <div class="ms-wrap-bubble" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/bubble.png">
                <div class="ms-wrap-img">
                  <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/testimonios/avatar03.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Fernando Lopez">
                </div>
                <p>Como infante de marina siempre he visto a perros entrenar enérgicamente, en Pet Hotel Shangrilá me dí con la grata sorpresa que los cursos de adiestramiento son excelentes y muy profesionales.</p>
                <span class="ms-creator">-Pedro Insausti</span>
              </div>
              <div class="ms-wrap-count">
                <div class="ms-bone-count">
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone"></span>
                </div>
                <!--<span class="ms-count">Hace un mes</span>-->
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</section>

<section id="ubicacion" class="ms-animate">
  <a href="https://goo.gl/maps/DSFzaiDg48uVoGnr8" class="ms-wrap-img" target="_blank" title="Ubícanos en google maps">
    <span class="ms-address">1600 Shangrilla, Lima</span>
    <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/mapa.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="1600 Shangrilla, Lima">
  </a>
</section>

<section id="contacto" class="ms-animate">
  <div class="ms-wrap-contact">
    <div class="ms-info-contact">
      <div class="ms-title">Contáctanos</div>
      <ul class="ms-info-list">
        <li>
          <p>Estamos úbicados en la dirección <br>asdasdasdasdadasd <br>asdasdadssadasda</p>
        </li>
        <li>
          <span>Address:</span>
          <strong>1600 Shangrilla, Lima</strong>
        </li>
        <li>
          <span>phone:</span>
          <a href="tel:954873058">954873058</a>
        </li>
      </ul>
    </div>
    <div class="ms-info-form">
      <form id="contactForm">
        <fieldset>
          <legend>DEJA UN MENSAJE</legend>
          <div class="ms-body-form">
            <div class="ms-input-form">
              <label for="inputName">Nombre</label>
              <input type="text" name="name" id="inputName" placeholder="Nombre*" required data-text="¡Hola <span></span>, bienvenido!" class="form-control icon-user">
            </div>
            <div class="ms-input-form">
              <label for="inputEmail">Email</label>
              <input type="email" name="email" id="inputEmail" placeholder="Email*" required data-text="¡Bien, ahora ingresa el asunto y mensaje!" class="form-control icon-email">
            </div>
            <div class="ms-input-form ms-textarea">
              <label for="inputComment">Tu mensaje</label>
              <textarea name="message" id="inputComment" cols="30" rows="10" required placeholder="Tu mensaje*" data-text="¡Perfecto!" class="form-control"></textarea>
            </div>
            <div class="ms-wrap-button">
              <button class="ms-btn bg-sc" id="btn-send-mesasge" type="button">enviar</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</section>

<?php get_footer();?>