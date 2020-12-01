<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title('|', 1, 'right');?> <?php bloginfo('name');?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<meta name="msapplication-navbutton-color" content="#ffffff">

	<meta name="keywords" content="Mascotas, Perú, Lima, Hotel de mascotas, Confianza, Seguro, vacunas">
	<meta name="description" content="Pet Hotel Shangrila, brinda un servicio de calidad y de confianza con grandes profesionales de amplia experiencia.">
	<meta name="organization" content="Pet Hotel Shangrila">
	<meta content="Pet Hotel Shangrila" name="author">
	<meta content="Pet Hotel Shangrila" name="Origen">
	<meta content="Lima, Peru" name="locality">

	<meta property="og:title" content="Pet Hotel Shangrila | Confianza y seguridad">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Pet Hotel Shangrila">
	<meta property="og:image" content="">
	<meta property="og:description" content="Pet Hotel Shangrila, brinda un servicio de calidad y de confianza con grandes profesionales de amplia experiencia.">
	<meta property="og:url" content="">

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/touch-icon-iphone.png">
	<link rel="android-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/touch-icon-iphone.png">
	<?php wp_head(); ?>

	<link rel="preload" as="font" type="font/ttf" href="<?php echo get_site_url(); ?>/wp-content/themes/pethotel/css/icons/fonts/ms-icons.ttf?c14k3k" crossorigin>
	<link rel="preload" as="font" type="font/ttf" href="<?php echo get_site_url(); ?>/wp-content/themes/pethotel/fonts/carnas/Carnas-Regular.woff2" crossorigin>
	<link rel="preload" as="font" type="font/ttf" href="<?php echo get_site_url(); ?>/wp-content/themes/pethotel/fonts/carnas/Carnas-Bold.woff2" crossorigin>

</head>
<body <?php body_class(); ?>>

<?php if (is_front_page()){ ?>
	<header id="header" class="ms-animate">
		<div class="ms-wrap-header">
			<div class="ms-top-header">
				<ul class="ms-social-media">
					<li><a href="/" class="ms-icon-facebook">"Visitanos en Facebook</a></li>
					<li><a href="/" class="ms-icon-instagram">"Visitanos en Instagram</a></li>
					<li><a href="/" class="ms-icon-twitter">"Visitanos en Twitter</a></li>
				</ul>

				<div class="ms-wrap-login" id="success-anonymus">
					<button class="ms-link icon-user ms-show-lg-modal" data-tab="tabLogin">Ingresar</button>
					<button class="ms-link ms-show-lg-modal" data-tab="tabRegister">Regístrate</button>
				</div>

				<div class="ms-wrap-login" id="success-login">
					<button class="ms-user-btn">
						<img data-real-type="image" data-img-default="<?php echo get_template_directory_uri(); ?>/img/profile/avatar_min.jpg" src="http://www.pethotelshangrila.pe/wp-content/themes/pethotel/img/profile/avatar_min.jpg" id="user-image" alt="">
						<span id="user-name"></span>
					</button>
					<ul class="ms-user-menu">
						<li><a href="/user-profile">Editar Perfil</a></li>
						<li><a href="/">Ver a mi perro</a></li>
						<li><a href="javascript:void(0)" id="btn-logout">Cerrar sesión</a></li>
					</ul>
				</div>
				
			</div>
			<div class="ms-main-menu">
				<nav>
					<ul>
						<li><a href="/">Nosotros</a></li>
						<li><a href="/">Servicios</a></li>
						<li><a href="/">Reserva</a></li>
						<li><a href="/">Contacto</a></li>
					</ul>
					<button class="ms-btn-close-menu" aria-label="Cerrar Menú">
						<span></span>
					</button>
				</nav>
			</div>
			<div class="ms-wrap-logo">
				<a href="/" class="ms-logo">
					<img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/logo/logo_b.svg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel Shangrila" class="mb">
					<img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/logo/logo_a.svg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel Shangrila" class="pc">
				</a>
				<button class="ms-btn-menu" aria-label="Menú">
					<span></span>
				</button>
			</div>
		</div>
		<div class="ms-btn-close-menu ms-layout"></div>
	</header>
<?php }else{ ?>
	<header id="header" class="ms-animate ms-inside shadow">
		<div class="ms-wrap-header">
			<div class="ms-top-header">
				<ul class="ms-social-media">
					<li><a href="/" class="ms-icon-facebook">"Visitanos en Facebook</a></li>
					<li><a href="/" class="ms-icon-instagram">"Visitanos en Instagram</a></li>
					<li><a href="/" class="ms-icon-twitter">"Visitanos en Twitter</a></li>
				</ul>
				<div class="ms-wrap-login" id="success-anonymus">
					<button class="ms-link icon-user ms-show-lg-modal" data-tab="tabLogin">Ingresar</button>
					<button class="ms-link ms-show-lg-modal" data-tab="tabRegister">Regístrate</button>
				</div>

				<div class="ms-wrap-login" id="success-login">
					<button class="ms-user-btn">
						<img data-real-type="image" data-img-default="<?php echo get_template_directory_uri(); ?>/img/profile/avatar_min.jpg" src="http://www.pethotelshangrila.pe/wp-content/themes/pethotel/img/profile/avatar_min.jpg" id="user-image" alt="">
						<span id="user-name"></span>
					</button>
					<ul class="ms-user-menu">
						<li><a href="/user-profile">Editar Perfil</a></li>
						<li><a href="/">Ver a mi perro</a></li>
						<li><a href="javascript:void(0)" id="btn-logout">Cerrar sesión</a></li>
					</ul>
				</div>
				<button class="ms-btn-menu menu-int" aria-label="Menú">
					<span></span>
					<label>Menú</label>
				</button>
			</div>
			<div class="ms-main-menu">
				<nav>
					<ul>
						<li><a href="/">Nosotros</a></li>
						<li><a href="/">Servicios</a></li>
						<li><a href="/">Reserva</a></li>
						<li><a href="/">Contacto</a></li>
					</ul>
					<button class="ms-btn-close-menu" aria-label="Cerrar Menú">
						<span></span>
					</button>
				</nav>
			</div>
			<div class="ms-wrap-logo">
				<a href="/" class="ms-logo">
					<img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/logo/logo_b.svg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel Shangrila" class="mb">
					<img data-real-type="image" data-img="<?php echo get_template_directory_uri(); ?>/img/logo/logo_a.svg" src="<?php echo get_template_directory_uri(); ?>/img/temp.png" alt="Pet Hotel Shangrila" class="pc">
				</a>
			</div>
		</div>
		<div class="ms-btn-close-menu ms-layout"></div>
	</header>
<?php } ?>