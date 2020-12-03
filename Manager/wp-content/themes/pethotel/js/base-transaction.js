var getServiceData = [];
var pathname = window.location.pathname;
(function ($) { 

        if(pathname == '/') {
            removeItemLocalStorage('transaction');
            $("#contactForm").validate();
            
            $(document).on("click", "#btn-send-mesasge", function() { 
                disabledButton('btn-send-mesasge', true);
                if($("#contactForm").valid() == true){
                    disabledButton('btn-send-mesasge', false);
                    postContact($("#contactForm").serializeFormJSON());
                    resetForm('contactForm');
                }
            });
        }

        if(pathname == '/step1/' || pathname == '/step2/' || pathname == '/step3/' || pathname == '/step4/' || pathname == '/thankyou/' || pathname == '/gracias/') {
            if(pathname == '/gracias/') {
                var existParamServiceId = getValidateUrlServiceId();
                if(existParamServiceId){
                    return true;
                }
            }
            validateIsStep();
        }

        if(pathname == '/step1/') {

            if(validateIsLogin() == false) {
                $("body").addClass("close-false");
            } else {
                $("body").removeClass("close-false");
            }
           
        } else {
            $("body").removeClass("close-false");
        }

        // Validates
        $("#frm-store-booking").validate({ignore: ""});
        $("#frm-store-customer").validate();
        $("#frm-store-services").validate();
        $("#frm-store-payment").validate();

        buttonOpenFile('#frm-store-customer');

        // Inputs Files
        //getFileReaderVouchers('#frm-store-payment');

        if(pathname == '/step1/') {
            generateFormOfPets();
        }

        getItemLocalStorageTransaction();

        $(document).on('click','#save-step-booking', function() {
            disabledButton('save-step-booking', true);
            if($("#frm-store-booking").valid() == true){
                setDataOfPayment("booking", $("#frm-store-booking").serializeFormJSON());
                disabledButton('save-step-booking', false);
                setItemLocalStorageTransaction("booking", bodyParsedPayment['booking']);
                localStorage.setItem('bookingLog', JSON.stringify(bodyParsedPayment['booking']));
                window.location.href = '/step1/';
            } else {
                disabledButton('save-step-booking', false);
            }
        });
    
        $(document).on('click','#save-step-booking-doggy', function() {

            var dateFrom    = $("#dateFrom").val();
            var dateTo      = $("#dateTo").val();
            var dateNumPets = $("#numPets").val();
            var serviceId = '7bcf5547-f268-463d-8760-e769d31fd345';

            disabledButton('save-step-booking-doggy', true);

            if(dateFrom != '' && dateTo != '') {

                baseGet("services/", serviceId).done(function(response) {
                    if(response['data'] && response['statusCode'] == 200){

                        disabledButton('save-step-booking-doggy', true);

                        var booking = {
                            dateFrom: dateFrom,
                            dateTo: dateTo,
                            numPets: Number(dateNumPets)
                        };
                        setItemLocalStorageTransaction("booking", booking);
                        localStorage.setItem('bookingLog', JSON.stringify(booking)); 

                        // console.log(response);
                        var orderList = [];
        
                        orderList.push({
                            'serviceId': response['data']['id'],
                            'price'    : response['data']['price'],
                            'quantity' : Number(dateNumPets),
                            'subtotal' : response['data']['price'] * Number(dateNumPets),
                            'serviceName': response['data']['name']
                        });
        
                        bodyParsedPayment['order'] = orderList;
        
                        setItemLocalStorageTransaction('serviceId', serviceId);
                        setItemLocalStorageTransaction('order', bodyParsedPayment['order']);
                        localStorage.setItem('serviceId', serviceId);
                        window.location.href = '/step1/?serviceSpecial=' +serviceId;
                    }
                })
                .fail(function(response) {
                    if(response.responseJSON.statusCode === 404) {
                        alertErrorServiceNoExist(response, 'El servicio no existe');
                    }
                })
                .always(function() {
        
                });

            } else {
                alertError(null, 'Ingrese la fecha de ingreso y fecha de recojo');
                disabledButton('save-step-booking-doggy', false);
            }

        });

        $(document).on("click", '#save-step-pets', function() {

            var urlRedirect = '/step2/';

            // Doggy School
            var existParamServiceSpecial = getValidateUrlServiceISpecial();
            if(existParamServiceSpecial) {
                urlRedirect = '/step2/?serviceSpecial=' + localStorage.getItem('serviceId');
            }

            disabledButton('save-step-pets', true);

            if(!$(document).find("[name='terms']").is(":checked")) {
                setItemLocalStorageTransaction('terms', '2');
                $(".msg-error-terms").html('Los terminos y condiciones son necesarios');
                disabledButton('save-step-pets', false);
                return true;
            } else {
                
                disabledButton('save-step-pets', false);

                setItemLocalStorageTransaction('terms', '1');

                var num_pets = Number(bodyParsedPayment['booking']['numPets']);
                // && bodyParsedPayment['pets'].length > 0
                if($(".frm-pets").length > 0 ) {

                    var num_form_valid = 0;

                    for (let index = 0; index < num_pets; index++) { 
                        if($("#frm-store-pet-" + index).valid() == true){
                            num_form_valid = num_form_valid + 1;
                        }
                    }
                    
                    var pets = [];
                    if(num_form_valid == num_pets) {
            
                        for (let index = 0; index < num_pets; index++) { 
                            if($("#frm-store-pet-" + index)){
                                var petBodyParsed = $("#frm-store-pet-" + index).serializeFormJSON();
                                pets.push(petBodyParsed); 
                            }
                        }
            
                        setDataOfPayment("pets", pets);
                        setItemLocalStorageTransaction("pets", pets);

                        $(document).find('input:checkbox[name="terms"]').trigger("change");

                        window.location.href = urlRedirect;
                    }

                } else if($(".frm-petsbycheckbox").length > 0) {

                    if($('[name="selectPet"]:checked').length == num_pets) {
                        window.location.href = urlRedirect;
                    } else {
                        $(".msg-error-terms").html('Seleccione el total de mascotas permitidas');
                        return true;
                    }

                }

            }

        });
        
        $(document).on("click", "#save-step-customer", function() { 

            var urlRedirect = '/step3/';

            // Doggy School
            var existParamServiceSpecial = getValidateUrlServiceISpecial();
            if(existParamServiceSpecial) {
                urlRedirect = '/step4/?serviceSpecial=' + localStorage.getItem('serviceId');
            }

            disabledButton('save-step-customer', true);
            if($("#frm-store-customer").valid() == true){
                setDataOfPayment("customer", $("#frm-store-customer").serializeFormJSON());
                disabledButton('save-step-customer', false);
                setItemLocalStorageTransaction("customer", bodyParsedPayment['customer']);
                window.location.href = urlRedirect;
            } else {
                disabledButton('save-step-customer', false);
            }
        });
        
        $(document).on("click", "#save-step-services", function() { 

            disabledButton('save-step-services', true);

            try {

                $("#services-errorx").hide();

                var checkedHospedaje = false;
                $("input[name='services']").each(function( i ) {  
                    // Especiales
                    if($(this).data('service-special') == '685e7f12-7fef-421b-b57c-f3e05e2b1196' && $(this).is(':checked') ){
                        checkedHospedaje = true;
                    // Hospedaje
                    } else if($(this).val() === '1fdcf8ea-199c-11eb-aed1-50e549398ade') {
                        checkedHospedaje = true;
                    }
                });

                
                if($("#frm-store-services").valid() == true && checkedHospedaje){
                    disabledButton('save-step-services', false);
                    setDataOfPayment("order", bodyParsedPayment['order']);
                    setItemLocalStorageTransaction("order", bodyParsedPayment['order']);
                    window.location.href = '/step4';
                } else {
                    disabledButton('save-step-services', false);
                    $("#services-errorx").show();
                }
            } catch(e) {
                console.log(e);
            }
            
        });
        
        $(document).on("click", "#save-step-payment", function() { 

            
            $(".error-size").hide();

            // Validate is checked payment method
            if(!$('input[name="paymentMethodId"]').is(':checked')) {

                $(".error-size").html('<span>Elige el método de pago</span>');
                $(".error-size").show();
                //disabledButton('save-step-payment', false);
                return true;

            } else {

                // Validate is upload image
                var inputPaymentMethodId = $('[name="paymentMethodId"]:checked').val();

                var screenVoucherValue = $('[name="screenVoucher"]').val();

                /* 
                    Transferencia bancaria 
                    Yape  
                */
                if(inputPaymentMethodId == '176d7072-19f1-11eb-a86b-50e549398ade1' || 
                    inputPaymentMethodId == '176d7072-19f1-11eb-a86b-50e549398ade3') { 
                    if(screenVoucherValue == '') {
                        $(".error-size").html('<span>Sube la imagen del comprobante de pago</span>');
                        $(".error-size").show();
                        return true;
                    }
                   
                    //disabledButton('save-step-payment', false);
                    
                }

            }

            if($("#frm-store-payment").valid() == true){

                setDataOfPayment("payment", $("#frm-store-payment").serializeFormJSON());
                setItemLocalStorageTransaction("payment", bodyParsedPayment['payment']);

                if($('#paymentMethodId_176d7072-19f1-11eb-a86b-50e549398ade2').is(':checked') ||
                $('#paymentMethodId_176d7072-19f1-11eb-a86b-50e549398ade4').is(':checked')) {
                    $("#frm-store-payment").find("[name='screenVoucher']").val('').attr("value", '');
                }

                var existParamServiceId = getValidateUrlServiceId();

                // Logic B
                if(existParamServiceId) {

                    delete bodyParsedPayment['booking'];
                    delete bodyParsedPayment['customer'];
                    delete bodyParsedPayment['pets'];
                    delete bodyParsedPayment['terms'];
                    delete bodyParsedPayment['usingContact'];
                    
                    bodyParsedPayment['order'].forEach(element => {
                        delete element.serviceName;
                    });
                    
                    if(localStorage.getItem('transaction') != undefined && localStorage.getItem('transaction') != null && localStorage.getItem('transaction') != '') {
                        var bodyParsedEnd = bodyParsedPayment;
                     
                        disabledButton('save-step-payment', true);

                        basePost("security/transaction-service", bodyParsedEnd)
                        .done(function(response) {
                            disabledButton('save-step-payment', false);
                            localStorage.removeItem('transaction');
                            window.location.href = '/gracias/?serviceId=' + bodyParsedPayment['serviceId'];
                        })
                        .fail(function(response) {
                            alertError(response);
                            disabledButton('save-step-payment', false);
                        })
                        .always(function() {
                        }); 

                    }
                    return true;
                }

                // Logic A
                delete bodyParsedPayment['payment']['usingContact'];


                bodyParsedPayment['order'].forEach(element => {
                    delete element.serviceName;
                });
                
                if(localStorage.getItem('transaction') != undefined && localStorage.getItem('transaction') != null && localStorage.getItem('transaction') != '') {

                    var bodyParsedEnd = bodyParsedPayment;

                    // Logic C
                    if(getValidateUrlServiceISpecial()) {
                        bodyParsedEnd['serviceSpecial'] = localStorage.getItem('serviceId');
                    } else {
                        bodyParsedEnd['serviceSpecial'] = null;
                    }

                    disabledButton('save-step-payment', true);

                    basePost("security/transaction", bodyParsedEnd)
                    .done(function(response) {
                        disabledButton('save-step-payment', false);
                        window.location.href = '/gracias/';
                    })
                    .fail(function(response) {
                        alertError(response);
                        disabledButton('save-step-payment', false);
                    })
                    .always(function() {
                    }); 
    
                }
                
            }
        });

        $(document).on("click", "input:checkbox[name='services']", function() { 
    
            if($(this).is(':checked')) {  

                // Servicio
                var serviceId = $(this).val();

                $("#cant-pet-" + serviceId).prop('disabled', true);
                if($(this).data('service-type') != '7afa5547-3043-43de-8299-c9491ede9019' && serviceId != '1fdcf8ea-199c-11eb-aed1-50e549398ade') {
                    $("#cant-pet-" + serviceId).prop('disabled', false);
                }

            } else {
                if($(this).data('service-type') === '7afa5547-3043-43de-8299-c9491ede9019') {
                    $("#service-1fdcf8ea-199c-11eb-aed1-50e549398ade").prop("checked", true);
                }
            }

            calculateService();

        });

        $(document).on("click", 'input:radio[name="paymentMethodId"]', function() {  
            if($(this).is(':checked')) {
                $(".ms-wrap-file-upload").closest("li").show();
                $(".error-size").hide();
                if($(this).val() == '176d7072-19f1-11eb-a86b-50e549398ade4') {
                    $("#frm-store-payment").find("#image").val('').attr("value", '');
                    $(".ms-wrap-file-upload").closest("li").hide();
                }
            }
        });

        $(document).on("click", 'input:checkbox[name="terms"]', function() {  

            $(".msg-error-terms").html('');

            if($(this).is(':checked')) {
                setItemLocalStorageTransaction('terms', '1');
            } else {
                setItemLocalStorageTransaction('terms', '2');
                $(".msg-error-terms").html('Los terminos y condiciones son necesarios');
            }
        });

        $(document).on("click", 'input:checkbox[name="usingContact"]', function() {  
            
            var keys = Object.keys($("#frm-store-payment").serializeFormJSON());

            if($(this).is(':checked')) {

                setItemLocalStorageTransaction('usingContact', '1');

                keys.forEach(key => { 
                    if(key === 'billingFirstName') {
                        $("#frm-store-payment").find("[name='" + key + "']").val(bodyParsedPayment['customer']['firstName']);
                    } else if(key === 'billingLastName') {
                        $("#frm-store-payment").find("[name='" + key + "']").val(bodyParsedPayment['customer']['lastName']);
                    } else if(key === 'billingDni') {

                    } else if(key === 'billingPhone') {
                        $("#frm-store-payment").find("[name='" + key + "']").val(bodyParsedPayment['customer']['phone']);
                    } else if(key === 'billingEmail') {
                        $("#frm-store-payment").find("[name='" + key + "']").val(bodyParsedPayment['customer']['email']);
                    } else if(key === 'billingAddress') {
                        $("#frm-store-payment").find("[name='" + key + "']").val(bodyParsedPayment['customer']['address']);
                    }
                });

            } else {

                setItemLocalStorageTransaction('usingContact', '1');

                keys.forEach(key => {  
                    $("#frm-store-payment").find("[name='" + key + "']").val('');
                });

            }
        });

        $(document).on("click", 'input:checkbox[name="selectPet"]',  function() {

            $(".msg-error-terms").html('');

            $(this).closest("li").find("form").removeClass('checked-form');

            if($(this).is(':checked')) {
                $(this).closest("li").find("form").addClass('checked-form');
                
    
                setItemLocalStorageTransaction('order', bodyParsedPayment['order']);
            }
            
            validateSelectedPet();

            bodyParsedPayment['pets'] = [];
            $('input:checkbox[name="selectPet"]').each(function () {
                if($(this).is(':checked') == true) {
                    bodyParsedPayment['pets'].push($(this).closest("li").find("form").serializeFormJSON())
                }
            });
            setItemLocalStorageTransaction('pets', bodyParsedPayment['pets']);

        });

        $(document).on("change", '[name="cantPet"]',  function() {

            // Update Precio y Cantidad
            var cantPet = Number($(this).val());
            bodyParsedPayment['order'].forEach(service => {
                if($(this).data("id") == service['serviceId']) {
                    service['quantity'] = cantPet;
                    service['subtotal'] = (service['price'] * cantPet);
                }
            });
            setItemLocalStorageTransaction('order', bodyParsedPayment['order']);
            $(".price_total").html('S/' + calculateTotal(bodyParsedPayment));
        });

        $(document).on("click", '.btn-delete-pet',  function() { 
            var petId = $(this).closest("#modal-delete").data("pet-id");
            bodyParsedPayment['order']
            console.log(petId);
            deletePet(petId);
        });

        $(document).on("change", "[name='gender']", function() {
            var value = $(this).val();
            var type = 'text';
            var inputInitZeal = $("[name='initZeal']").closest(".ms-form-input");
            var inputLastZeal = $("[name='lastZeal']").closest(".ms-form-input");
            

            if(value == 'HEMBRA') {
                type = 'text';
                inputInitZeal.show();
                inputLastZeal.show();
            } else if(value == 'MACHO') {
                type = 'hidden';
                inputInitZeal.hide();
                inputLastZeal.hide();
            }
            $("[name='initZeal']").attr("type", type);
            $("[name='lastZeal']").attr("type", type);
        });

})(jQuery);
