<?php get_header(); ?>

<section id="welcome" class="ms-animate">
  <div class="ms-slider swiper-container" id="sliderWelcome">
    <div class="swiper-wrapper">
      <div class="ms-item swiper-slide">
        <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/slider/01.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="imagen1">
      </div>
      <div class="ms-item swiper-slide">
        <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/slider/01.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="imagen2">
      </div>
    </div>
    <button class="swiper-button-next ms-icon-nav">Siguiente</button>
    <button class="swiper-button-prev ms-icon-nav">Anterior</button>
  </div>
  <div class="ms-calendar">
    <div class="ms-wrap-calendar">
      <div class="ms-border-calendar">
        <div class="ms-calendar-info" id="bookingBox">
          <div class="ms-item">
            <div class="startDate">
              <span class="ms-item-title">Check-in</span>
              <span class="ms-item-date">26<span class="ms-item-month">Jul</span></span>
            </div>
            <input type="text" id="startDate">
          </div>
          <div class="ms-item">
            <div class="endDate">
              <span class="ms-item-title">Check-out</span>
              <span class="ms-item-date">28<span class="ms-item-month">Jul</span></span>
            </div>
            <input type="text" id="endDate">
          </div>
          <div class="ms-item">
            <a href="javascript:void(0)" id="petCount">
              <span class="ms-item-title">Perros</span>
              <span class="ms-item-count">2</span>
            </a>
            <ul class="ms-count-list">
              <li><a>1</a></li>
              <li><a class="active">2</a></li>
              <li><a>3</a></li>
              <li><a>4</a></li>
              <li><a>5</a></li>
            </ul>
          </div>
        </div>
        <button class="ms-btn icon-paw">Reservar</button>
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
        <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/calendar-pet.svg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel Shangrila" class="pet">
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
          <a href="/" class="ms-card" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
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
          <a href="/" class="ms-card" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
            <div class="ms-card-info">
              <h3 class="ms-card-title icon-bone">Grooming</h3>
              <p>Si tienes planes, vacaciones o un viaje programado y no sabes donde o con quién dejar a tu perro, esta es la solución para ti!</p>
              <span class="ms-link icon-paw">ver más</span>
            </div>
            <div class="ms-card-img">
              <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/grooming.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Grooming">
              <span>Grooming</span>
            </div>
          </a>
        </li>
        <li>
          <a href="/" class="ms-card" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
            <div class="ms-card-info">
              <h3 class="ms-card-title icon-bone">Doggy School</h3>
              <p>Si tienes planes, vacaciones o un viaje programado y no sabes donde o con quién dejar a tu perro.</p>
              <span class="ms-link icon-paw">ver más</span>
            </div>
            <div class="ms-card-img">
              <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/doggy-school.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Doggy School">
              <span>Doggy School</span>
            </div>
          </a>
          <a href="/" class="ms-card" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/patron_black.png">
            <div class="ms-card-info">
              <h3 class="ms-card-title icon-bone">Pet training</h3>
              <p>Si tienes planes, vacaciones o un viaje programado y no sabes donde o con quién dejar a tu perro, esta es la solución para ti! Nosotros nos encargamos de cuidar de tu engreído por el periodo que no puedas hacerlo tú.</p>
              <span class="ms-link icon-paw">ver más</span>
            </div>
            <div class="ms-card-img">
              <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/servicios/pet-training.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet training">
              <span>Pet training</span>
            </div>
          </a>
        </li>
      </ul>
      <a href="/" class="ms-btn lg bg-sc">Ver más información</a>
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
                  <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/testimonios/avatar_01.jpg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Fernando Lopez">
                </div>
                <p>Pet hotel me facilita la vida cuando hay momentos en las que no puedo ocuparme de mi engreido</p>
                <span class="ms-creator">-Fernando Lopez</span>
              </div>
              <div class="ms-wrap-count">
                <div class="ms-bone-count">
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone"></span>
                </div>
                <span class="ms-count">Hace un mes</span>
              </div>
            </div>
          </div>
          <div class="ms-item swiper-slide">
            <div class="ms-bubble">
              <div class="ms-wrap-bubble" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/bubble.png">
                <div class="ms-wrap-img">
                  <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/testimonios/avatar_01.jpg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Fernando Lopez">
                </div>
                <p>Pet hotel me facilita la vida cuando hay momentos en las que no puedo ocuparme de mi engreido</p>
                <span class="ms-creator">-Fernando Lopez</span>
              </div>
              <div class="ms-wrap-count">
                <div class="ms-bone-count">
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone"></span>
                </div>
                <span class="ms-count">Hace un mes</span>
              </div>
            </div>
          </div>
          <div class="ms-item swiper-slide">
            <div class="ms-bubble">
              <div class="ms-wrap-bubble" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/bubble.png">
                <div class="ms-wrap-img">
                  <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/testimonios/avatar_01.jpg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Fernando Lopez">
                </div>
                <p>Pet hotel me facilita la vida cuando hay momentos en las que no puedo ocuparme de mi engreido</p>
                <span class="ms-creator">-Fernando Lopez</span>
              </div>
              <div class="ms-wrap-count">
                <div class="ms-bone-count">
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone"></span>
                </div>
                <span class="ms-count">Hace un mes</span>
              </div>
            </div>
          </div>
          <div class="ms-item swiper-slide">
            <div class="ms-bubble">
              <div class="ms-wrap-bubble" data-real-type="background" data-img="<?php echo get_template_directory_uri(); ?>/img/bubble.png">
                <div class="ms-wrap-img">
                  <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/testimonios/avatar_01.jpg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Fernando Lopez">
                </div>
                <p>Pet hotel me facilita la vida cuando hay momentos en las que no puedo ocuparme de mi engreido</p>
                <span class="ms-creator">-Fernando Lopez</span>
              </div>
              <div class="ms-wrap-count">
                <div class="ms-bone-count">
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone active"></span>
                  <span class="ms-icon-bone"></span>
                </div>
                <span class="ms-count">Hace un mes</span>
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
  <div class="ms-wrap-img">
    <span class="ms-address">1600 Shangrilla, Lima</span>
    <img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/mapa.png" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="1600 Shangrilla, Lima">
  </div>
</section>

<section id="contact" class="ms-animate">
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
          <a href="tel:+51123412344">+51 1234 12344</a>
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
              <input type="text" name="inputName" id="inputName" placeholder="Nombre" data-text="¡Hola <span></span>, bienvenido!" class="form-control icon-user">
            </div>
            <div class="ms-input-form">
              <label for="inputEmail">Email</label>
              <input type="email" name="inputEmail" id="inputEmail" placeholder="Email" data-text="¡Bien, ahora ingresa el asunto y mensaje!" class="form-control icon-email">
            </div>
            <div class="ms-input-form ms-textarea">
              <label for="inputComment">Tu mensaje</label>
              <textarea name="inputComment" id="inputComment" cols="30" rows="10" placeholder="Tu mensaje" data-text="¡Perfecto!" class="form-control"></textarea>
            </div>
            <div class="ms-wrap-button">
              <button class="ms-btn bg-sc">enviar</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</section>

<?php get_footer();?>