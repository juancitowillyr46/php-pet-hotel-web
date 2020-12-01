(function($) {



	var cropper;

	var reader;

	var file;

	var avatar;

	var canvas;

	var initialAvatarURL;

	var fileSizeMax = 1160974; // 1813346



	function loadModal(action, element, image){

		

		if(action == "active"){

			

			$("body").addClass('modal-open');

			$(element).fadeIn();



		}else if(action == "remove"){

			if(!$("body").hasClass("close-false")){

				$("body").removeClass('modal-open');

				$(element).fadeOut();

			}

		}else if(action == "cropp"){

			

			$("body").addClass('modal-open-cropp');

			$(element).fadeIn();



			var $image = image;

			$image.cropper({

				aspectRatio: 9 / 9,

			});



			cropper = $image.data('cropper');

		

		}else if(action == "remove-cropp"){

			$("body").removeClass('modal-open-cropp');

			$(element).fadeOut();

			cropper.destroy();

			cropper = null;

		}

	}



	function chekSectionAnimate(){

		var windowSize = $(window).width();

		var elementSection = $('.ms-animate');

		if (elementSection.length) {

			elementSection.each(function(e) {

				var sectionId = $("#" + $(this).attr('id'));

				if (is_in_view(sectionId)) {

					var item = 0, el = $(this);

					sectionId.find('[data-img]').each(function(e) {

						if ($(this).attr('data-real-type') == "image") {

							var imgUrl = $(this).attr('data-img');

							if (is_in_view($(this))){

								$(this).attr('src', imgUrl).on('load', function() {

									$(this).removeAttr('data-img').addClass('ms-loaded');

								});

								item++;

							}



						} else if ($(this).attr('data-real-type') == "video") {

							if (is_in_view($(this))){

								var videoId = $(this).attr('id');

								var urlVideo = $(this).attr('data-img');

								var titleVideo = $(this).attr('data-title');

								$(this).html('<video id="idx-video-'+videoId+'" src="'+$urlVideo+'" title="'+titleVideo+'" preload="none" loop muted playsinline></video>');

								$(this).removeAttr('data-img');

								setTimeout(function(){

									$('#idx-video-'+videoId)[0].play();

								}, 1000);

								item++;

							}

						} else if ($(this).attr('data-real-type') == "youtube") {

							if (is_in_view($(this))) {

								var urlVideo = $(this).attr('data-img');

								var titleVideo = $(this).attr('data-title');

								$(this).html("<iframe allowfullscreen='' src='"+urlVideo+"' title='"+titleVideo+"' frameborder='0' allowfullscreen></iframe>");

								$(this).removeAttr('data-img');

								item++;

							}

						} else if ($(this).attr('data-real-type') == "mapa") {

							if (is_in_view($(this))) {

								var mapa = $(this).attr('data-img');

								var lat = $(this).attr('data-lat');

								var lng = $(this).attr('data-lng');



								if(mapa !== undefined && lat !== undefined && lng !== undefined){



									var myLatLng = {

										lat: parseFloat(lat),

										lng: parseFloat(lng)

									};



									var newMap = new google.maps.Map(document.getElementById(mapa), {

										zoom: 16,

										center: myLatLng,

										mapTypeControl: false,

										fullscreenControl: false,

										styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

									});



									var marker = new google.maps.Marker({

										position: myLatLng,

										map: newMap

									});

									

									$(this).removeAttr('data-img');

								}

								item++;

							}

						} else if($(this).attr('data-real-type') == "background"){						

							var imgUrl = $(this).attr('data-img');

							if (is_in_view($(this))){

								$(this).css({"background-image":"url("+imgUrl+")"});

								$(this).removeAttr('data-img data-real-type').addClass('ms-loaded');

								item++;

							}

            }

					});

					/*if (item == sectionId.find('[data-img]').size()) {

						el.addClass('ms-loaded-animate').removeClass('ms-animate');

					}*/

				}

			});

		}

	}



	function is_in_view(elem) {

		var docViewTop = 0;  

		var docViewBottom = 0;  

		var elemTop = 0;  

		var elemBottom = 0;  

		docViewTop = $(window).scrollTop();  

		docViewBottom = docViewTop + $(window).height();  

		elemTop = $(elem).offset().top;  

		elemBottom = elemTop + $(elem).height();

		return ((elemBottom > docViewTop) && (elemTop < docViewBottom));

	}

	

	$(window).load(function() { 

		chekSectionAnimate();

		var loadPge = $(".ms-loading");

		if(loadPge.length){

			loadPge.fadeOut(500, function() {

				loadPge.remove();

			});

		}

	});



	$(window).scroll(function() { chekSectionAnimate(); });



	var windowSize = $(window).width();

	if(windowSize < 768){

		var speedInitital = 700;

	}else{

		var speedInitital = 1300;

	}



	var welcomeSwiper = $("#sliderWelcome");

	if(welcomeSwiper.length){

		welcomeSwiperGn = new Swiper("#sliderWelcome", {

			lazy: true,

			slidesPerView: 1,

			spaceBetween: 0,

			loop: true,

			autoplay: true,

			//effect: 'fade',

			speed: speedInitital,

			pagination: {

				el: '.swiper-pagination',

				clickable: true,

			},

			navigation: {

				nextEl: '.swiper-button-next',

				prevEl: '.swiper-button-prev',

			},

		});

	}



	var testimonialSwiper = $("#sliderTestimonial");

	if(testimonialSwiper.length){

		testimonialSwiperGn = new Swiper("#sliderTestimonial", {

			autoHeight: true,

			lazy: true,

			slidesPerView: 1,

			spaceBetween: 15,

			loop: true,

			speed: speedInitital,

			pagination: {

				el: '.swiper-pagination',

				clickable: true,

			},

			navigation: {

				nextEl: '.swiper-button-next',

				prevEl: '.swiper-button-prev',

			},

			breakpoints: {

				640: {

					slidesPerView: 2,

					spaceBetween: 15,

				},

				991: {

					slidesPerView: 3,

					spaceBetween: 15,

				},

				1200: {

					slidesPerView: 5,

					spaceBetween: 15,

				},

			}

		});

	}



	var sliderServicios1 = $("#slider-servicios1");

	if(sliderServicios1.length){

		sliderServicios1Gen = new Swiper("#slider-servicios1", {

			lazy: true,

			slidesPerView: 1,

			spaceBetween: 15,

			loop: true,

			speed: speedInitital,

			pagination: {

				el: '.swiper-pagination',

				clickable: true,

			}

		});

	}



	var sliderServicios2 = $("#slider-servicios2");

	if(sliderServicios2.length){

		sliderServicios2Gen = new Swiper("#slider-servicios2", {

			lazy: true,

			slidesPerView: 1,

			spaceBetween: 15,

			loop: true,

			speed: speedInitital,

			pagination: {

				el: '.swiper-pagination',

				clickable: true,

			}

		});

	}



	$.datepicker.regional['es'] = {

		closeText: 'Cerrar',

		prevText: '< Ant',

		nextText: 'Sig >',

		currentText: 'Hoy',

		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],

		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],

		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],

		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],

		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],

		weekHeader: 'Sm',

		dateFormat: 'dd/mm/yy',

		firstDay: 1,

		isRTL: false,

		showMonthAfterYear: false,

		yearSuffix: ''

	};



	$.datepicker.setDefaults($.datepicker.regional['es']);

	

	/*MODAL CALENDARIO*/

	var monthText = ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'];

	var startDate = $("#startDate");



	// JR

	var dd = new Date().getDate();

	var mm = new Date().getMonth() + 1; 

	var yyyy = new Date().getFullYear(); 



	if (dd < 10) { 

		dd = '0' + dd; 

	} 

	if (mm < 10) { 

		mm = '0' + mm; 

	} 

	var today = yyyy + '-' + mm + '-' + dd;

	if (dd < 10) { 

		dd = '0' + dd; 

	} 

	var month = monthText[new Date().getMonth()];



	$(".startDate").find(".ms-item-date").empty().html(dd+'<span class="ms-item-month">'+month+'</span></span>');

	$(".endDate").find(".ms-item-date").empty().html(dd+'<span class="ms-item-month">'+month+'</span></span>');



	$("#dateFrom").val(today);

	$("#dateTo").val(today);

	



	if(startDate.length){

		startDate.datepicker({ 

			minDate: 0,

			beforeShow:function(textbox, instance){

				$('#bookingBox').append($('#ui-datepicker-div'));

				$('#ui-datepicker-div').hide();

				$("#bookingBox").removeClass("open-end-date");

			},

			onSelect: function(dateText, inst) { 

				var date = $(this).datepicker('getDate'),

				day  = date.getDate(),  

				//month = date.getMonth() + 1, 

				month = monthText[date.getMonth()];         

				//year =  date.getFullYear();

				$(".startDate").find(".ms-item-date").empty().html(day+'<span class="ms-item-month">'+month+'</span></span>');



				// JR

				var dd = date.getDate(); 

				var mm = date.getMonth() + 1; 

		

				var yyyy = date.getFullYear(); 

				if (dd < 10) { 

					dd = '0' + dd; 

				} 

				if (mm < 10) { 

					mm = '0' + mm; 

				} 

				var today = yyyy + '-' + mm + '-' + dd;



				$("#dateFrom").val(today);

				$(".error").hide();

		

			}

		});

	}



	var startDate = $("#endDate");

	if(startDate.length){

		startDate.datepicker({ 

			minDate: 0,

			beforeShow:function(textbox, instance){

				$('#bookingBox').append($('#ui-datepicker-div'));

				$('#ui-datepicker-div').hide();

				$("#bookingBox").addClass("open-end-date");

			},

			onSelect: function(dateText, inst) { 

				var date = $(this).datepicker('getDate'),

				day  = date.getDate(),  

				//month = date.getMonth() + 1, 

				month = monthText[date.getMonth()];         

				//year =  date.getFullYear();

				$(".endDate").find(".ms-item-date").empty().html(day+'<span class="ms-item-month">'+month+'</span></span>');



				// JR

				var dd = date.getDate(); 

				var mm = date.getMonth() + 1; 

		

				var yyyy = date.getFullYear(); 

				if (dd < 10) { 

					dd = '0' + dd; 

				} 

				if (mm < 10) { 

					mm = '0' + mm; 

				} 

				var today = yyyy + '-' + mm + '-' + dd;



				$("#dateTo").val(today);

				$(".error").hide();



				$(".ms-count-list").html('');

				

				baseGet("security/search?dateTo="+$("#dateTo").val()+"&dateFrom="+$("#dateFrom").val(), '')

                .done(function(response) {

					if(Number(response['data']['numKennels']) == 0) {

						alert('No tenemos caniles disponibles');

						return true;

					}

					for (var kennel = 1; kennel <= Number(response['data']['numKennels']); kennel++) { 

						if(kennel == 1) {

							$(".ms-count-list").append('<li><a class="active">'+kennel+'</a></li>');

							//$(".ms-item-count").html(kennel);	

						} else {

							$(".ms-count-list").append('<li><a>'+kennel+'</a></li>');	

						}

					}

					$("#petCount").trigger("click");

                })

                .fail(function(response) {

                    alertError(response);

                })

                .always(function() {



                });



			}

		});

	}



	/*MODAL PET COUNT*/

	$(document).on('click', '.ms-count-list li a', function(e) {

		e.preventDefault();

		var selectCount = $(this).text();

		$(".ms-count-list li a").removeClass("active");

		$(this).addClass("active");

		$("#petCount .ms-item-count").text(selectCount);

		

		// JR

		$("#save-step-booking").attr("disabled", "");

		$("#save-step-booking").prop("disabled",false);

		$("#numPets").val(selectCount);

		

	});



	$(document).on('click', '#petCount', function(e) {

		e.preventDefault();

		$(".ms-count-list").addClass("active");



	});



	/*CLOSE MODL PET COUNT*/

	$(document).click(function(event) {

		//if you click on anything except the modal itself or the "open modal" link, close the modal

		if (!$(event.target).closest("#petCount").length) {

			$("body").find(".ms-count-list").removeClass("active");

		}



		if (!$(event.target).closest(".ms-user-btn").length) {

			$("body").find(".ms-wrap-login").removeClass("active");

		}

	});



	/*OPEN MENU - CLOSE MENU*/

	$(document).on('click', '.ms-btn-menu', function(e) {

		$("body").addClass("openMenu");

	});



	$(document).on('click', '.menu-int', function(e) {

		$("body").addClass("openMenuInt");

	});



	$(document).on('click', '.ms-btn-close-menu', function(e) {

		$("body").removeClass("openMenu openMenuInt");

	});



	/*OPEN MENU USUARIO*/

	$(document).on('click', '.ms-user-btn', function(e) {

		e.preventDefault();

		$(".ms-wrap-login").toggleClass("active");

	});



	/*CLOSE STANDAR MODAL*/

	$(document).on('click', '.close-modal', function(e) {

		var idModal = $("#"+$(this).parents(".ms-modal").attr("id"));

		var removeType = $(this).attr("data-remove");

		loadModal(removeType, idModal);

	});



	/**ACORDEON**/

	$(document).on("click", ".ms-tab-header", function(e) {

		e.preventDefault();

		var parentTab = $(this).attr("href");

		var parentSelected = $(parentTab).parents(".ms-tab-item");

		

		if (parentSelected.hasClass("active")) {

			$(".ms-tab-item").removeClass("active");

			$(".ms-tab-body").slideUp(350);

		}else{

			$(".ms-tab-item").removeClass("active");

			$(".ms-tab-body").slideUp(350);

			parentSelected.addClass("active");

			$(parentTab).slideToggle(350);

		}

	});



	/**CHECKBOX SERVICIOS**/

	var smTotal = 0;

	$(document).on("click", ".chekservices", function(e) {

		var priceCount = ($(this).attr("data-price")) * 1;

		if($(this).is(':checked')){

			smTotal = smTotal + priceCount;

			$("#servicesTotal").empty().html("S/"+smTotal);

		} else {

			smTotal = smTotal - priceCount;

			$("#servicesTotal").empty().html("S/"+smTotal);

		}

	});



	/**INPUT FILE NAME**/

	$(document).on("change", ".ms-payment-list input[type='file']", function(e) {

		var fileName = e.target.files[0].name;

		$(this).parent().find("label").text(fileName);

	});



	/**EDIT PINTURE**/

	$(document).on('click', '.ms-picture-edit', function(e) {

		var idFile = $(this).attr("data-label");

		$(idFile).trigger("click");

	});



	/**CHANGE IMAGE MODAL**/

	$(document).on('change', '.ms-picture-file', function(e) {

		var file_size = $(this)[0].files[0].size;

		if(file_size > fileSizeMax) { 

			$(".error-size").html('El tamaño del archivo es superior a 2 MB');

		} else {

			avatar = $(this).parent().find("img");

			var image = $("#imgCropp");

			var input = $(this).attr("id");

			var image;

		

			var files = e.target.files;

			var done = function (url) {

				input.value = '';

				image.src = url;

				var imgTemp = "<img src='"+image.src+"' id='imgCropp'>";

				$("#modal-cropp").find(".ms-wrap-img-modal").empty().html(imgTemp);

				loadModal("cropp", "#modal-cropp", $("#imgCropp"));

			};

	

			if (files && files.length > 0) {

				file = files[0];

				if (URL) {

					done(URL.createObjectURL(file));

				} else if (FileReader) {

					reader = new FileReader();

					reader.onload = function (e) {

						done(reader.result);

					};

					reader.readAsDataURL(file);

				}

			}

		}



		

	});



	// JR

	$(document).on('change', '.ms-picture-file-customer', function(e) {

		console.log('dsdsds');

		avatar = $("#frm-edit-customer").find("img");

		var image = $("#imgCropp");

		var input = $(this).attr("id");

		var image;

	

		var files = e.target.files;

		var done = function (url) {

			input.value = '';

			image.src = url;

			var imgTemp = "<img src='"+image.src+"' id='imgCropp'>";

			$("#modal-cropp").find(".ms-wrap-img-modal").empty().html(imgTemp);

			loadModal("cropp", "#modal-cropp", $("#imgCropp"));

		};



		if (files && files.length > 0) {

			file = files[0];

			if (URL) {

				done(URL.createObjectURL(file));

			} else if (FileReader) {

				reader = new FileReader();

				reader.onload = function (e) {

					done(reader.result);

				};

				reader.readAsDataURL(file);

			}

		}

	});



	/**BUTTOM CROPPE MODAL**/

	$(document).on('click', '#btnCropp', function(e) {



		canvas = cropper.getCroppedCanvas({

			width: 160,

			height: 160,

		});

		avatar.attr("src",canvas.toDataURL());



		$(avatar).closest('form').find("input[name='image']").val(canvas.toDataURL());

		

		$("body").removeClass('modal-open');

		$("#modal-cropp").fadeOut();

		cropper.destroy();

		cropper = null;

	});



	/**EDIT PET PROFILE**/

	$(document).on('click', '.ms-edit-pet', function(e) {

		loadModal("active", "#modal-edit");

	});



	// JR

	$(document).on('click', '.ms-edit-customer', function(e) {

		loadModal("active", "#modal-edit-customer");

	});



	/**MODAL LOGIN Y REGISTER**/

	$(document).on('click', '.ms-show-lg-modal', function(e) {

		var tabId = $(this).attr("data-tab");

		loadModal("active", "#modal-login-register");

		var tabId = $(this).attr("data-tab");

		$(".ms-tab-item").removeClass("active");

		$("#"+tabId).addClass("active");

		$(".ms-header-group .ms-tab-btn").removeClass("active");

		$(".ms-tab-btn[data-tab='"+tabId+"']").addClass("active");

	});



	$(document).on("click", ".ms-view-pass", function() {

		var element = $(this).parent().find("input");

		if($(this).hasClass("showPass")){

			element.attr("type","password");

			$(this).removeClass("showPass");

		}else{

			element.attr("type","text");

			$(this).addClass("showPass");

		}

	});



	$(document).on("click", ".ms-header-group .ms-tab-btn", function(e) {

		e.preventDefault();

		var tabId = $(this).attr("data-tab");

		$(".ms-tab-item").removeClass("active");

		$("#"+tabId).addClass("active");

		$(".ms-header-group .ms-tab-btn").removeClass("active");

		$(this).addClass("active");

	});



	/**CERRAR MODALES CON LA TECLA ESC**/

	document.onkeydown = function(evt) {

    evt = evt || window.event;

    var isEscape = false;

    if ("key" in evt) {

        isEscape = (evt.key === "Escape" || evt.key === "Esc");

    } else {

        isEscape = (evt.keyCode === 27);

    }

    if (isEscape) {

			if(!$("body").hasClass("close-false")){

				if($("body").hasClass("modal-open-cropp")){

					cropper.destroy();

					cropper = null;

				}

				$("body").removeClass('modal-open modal-open-cropp');

				$(".ms-modal").fadeOut();

			}

    }

  };



	/*NAVEGACION INTERNA*/

		$(document).on("click", ".ms-item-scroll", function(e) {

		e.preventDefault();

		var sectionId = $($(this).attr("href"));

		var offsetPosition = sectionId.offset();

		var offsetPositionTop = offsetPosition.top - 150;

		$("html, body").animate({ scrollTop: offsetPositionTop }, 600);

	});


  var calendarInput = $(".ms-input-calendar");
  if(calendarInput.length){
    calendarInput.each(function() {
      var calendarParent = $(this).parent();
      var calendarId = $(this).attr("id");
      $("#"+calendarId).datepicker({
        beforeShow:function(textbox, instance){
          calendarParent.append($('#ui-datepicker-div'));
        }
      });
    });
  }

  $(document).on('click', '.ms-show-trmd', function(e) {
    e.preventDefault();
    $("body").addClass('modal-open');
    $("#modal-terminos-comida").fadeIn();
	});
	

}(jQuery));

