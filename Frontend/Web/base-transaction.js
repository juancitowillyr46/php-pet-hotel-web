var getServiceData = [];
var pathname = window.location.pathname;
(function ($) { 

        if(pathname == '/') {
            removeItemLocalStorage('transaction');
        }

        if(pathname == '/step1/' || pathname == '/step2/' || pathname == '/step3/' || pathname == '/step4/' || pathname == '/thankyou/' || pathname == '/gracias/') {
            validateIsStep();
        }

        if(pathname == '/step1/') {
            $("body").addClass("close-false");
        } else {
            $("body").removeClass("close-false");
        }
        
        // Validates
        $("#frm-store-booking").validate({ignore: ""});
        $("#frm-store-customer").validate();
        $("#frm-store-services").validate();
        $("#frm-store-payment").validate();

        // Disables Buttons
        disabledButton('save-step-pets', true);
        // disabledButton('save-step-customer', true);
        // disabledButton('save-step-services', true);
        // disabledButton('save-step-payment', true);

        buttonOpenFile('#frm-store-customer');
        // buttonOpenFile('#frm-store-payment');

        // Inputs Files
        getFileReader('#frm-store-customer');
        getFileReaderVouchers('#frm-store-payment');
        

        //bodyParsedPayment = JSON.parse(window.localStorage.getItem('transaction'));

        //if(bodyParsedPayment['pets'].length > 0) { 
            //var numPets = Number(bodyParsedPayment['booking']['numPets']);
            generateFormOfPets();
        //}

        getItemLocalStorageTransaction();

        
        //setDataOfPayment("booking", $("#frm-store-booking").serializeFormJSON());
        //disabledButton('save-step-pets', false);
        //setItemLocalStorageTransaction("booking", bodyParsedPayment['booking']);

        $(document).on('click','#save-step-booking', function() {
            if($("#frm-store-booking").valid() == true){

                generateFormOfPets();
                setDataOfPayment("booking", $("#frm-store-booking").serializeFormJSON());
                disabledButton('save-step-pets', false);
                setItemLocalStorageTransaction("booking", bodyParsedPayment['booking']);
                window.location.href = '/step1/';

                var parameters = $("#frm-store-booking").serializeFormJSON();



                // TODO: antes de ir al paso 1
                //if(validateIsLoggin() == true) {
                    //var numPets = Number(bodyParsedPayment['booking']['numPets']);
                    
                // } else {
                //     window.location.href = '/step6/';
                // }
            }
        });
    
        $(document).on("click", '#save-step-pets', function() {

            disabledButton('save-step-customer', true);

            // setTimeout(() => {
            var num_pets = Number(bodyParsedPayment['booking']['numPets']);
            var num_form_valid = 0;
    
            for (let index = 0; index < num_pets; index++) { 
                if($("#frm-store-pet-" + index).valid() == true){
                    num_form_valid = num_form_valid + 1;
                }
            }
            
            var pets = [];
            if(num_form_valid == num_pets) {
    
                for (let index = 0; index < num_pets; index++) { 
                    var petBodyParsed = $("#frm-store-pet-" + index).serializeFormJSON();
                    pets.push(petBodyParsed); 
                }
    
                disabledButton('save-step-customer', false);
                setDataOfPayment("pets", pets);
                setItemLocalStorageTransaction("pets", pets);
                window.location.href = '/step2';
            }
            // }, 1000);
            
        });
        
        $(document).on("click", "#save-step-customer", function() { 
            if($("#frm-store-customer").valid() == true){
                setDataOfPayment("customer", $("#frm-store-customer").serializeFormJSON());
                disabledButton('save-step-services', false);
                setItemLocalStorageTransaction("customer", bodyParsedPayment['customer']);
                window.location.href = '/step3';
            }
        });
        
        $(document).on("click", "#save-step-services", function() { 
            try {

                $("#services-errorx").hide();

                if($("#frm-store-services").valid() == true && $('#service-1fdcf8ea-199c-11eb-aed1-50e549398ade').is(':checked')){
                    
                    disabledButton('save-step-payment', false);
                    var order = [];
                    var servicesBodyParsed = $("#frm-store-services").serializeFormJSON();

                    if(servicesBodyParsed.hasOwnProperty('services') && Array.isArray(servicesBodyParsed['services'])) {
                        servicesBodyParsed['services'].forEach(service => {
                            if(service == getServiceData.find(f => f.id == service) != undefined) {
                                order.push(getServiceData.find(f => f.id == service));
                            }
                        });
                    } else {

                        if(getServiceData.find(f => f.id == servicesBodyParsed['services']) != undefined) {
                            order.push(getServiceData.find(f => f.id == servicesBodyParsed['services']));
                        }
                    }
                    
                    var orderSend = [];
                    order.forEach(services => {
                        orderSend.push({
                            'serviceId': services['id'],
                            'price': services['price'],
                            'quantity': 0,
                            'subtotal': 0
                        })
                    });

                    setDataOfPayment("order", orderSend);
                    setItemLocalStorageTransaction("order", orderSend);
                    window.location.href = '/step4';
                } else {
                    $("#services-errorx").show();
                }
            } catch(e) {
                console.log(e);
            }
            
        });
        
        $(document).on("click", "#save-step-payment", function() { 

            $(".type-method-error").hide();

            // Validate is checked payment method
            if(!$('input[name="paymentMethodId"]').is(':checked')) {

                $(".type-method-error").html('<span>Elige el método de pago</span>');
                $(".type-method-error").show();

            } else {

                // Validate is upload image
                var inputPaymentMethodId = $('input[name="paymentMethodId"]').val();
                var screenVoucherValue = $('input[name="screenVoucher"]').val();
                if((inputPaymentMethodId == '176d7072-19f1-11eb-a86b-50e549398ade1' || // Tranferencia bancaria 
                    inputPaymentMethodId == '176d7072-19f1-11eb-a86b-50e549398ade3') && screenVoucherValue == '') { // Yape  
                    $(".type-method-error").html('<span>Sube la imagen del comprobante de pago</span>');
                    $(".type-method-error").show();
                }

            }

            if($("#frm-store-payment").valid() == true){
                setDataOfPayment("payment", $("#frm-store-payment").serializeFormJSON());
                setItemLocalStorageTransaction("payment", bodyParsedPayment['payment']);

                if($('#paymentMethodId_176d7072-19f1-11eb-a86b-50e549398ade2').is(':checked') || $('#paymentMethodId_176d7072-19f1-11eb-a86b-50e549398ade4').is(':checked')) {
                    $("#frm-store-payment").find("#image").val('').attr("value", '');
                }
                
                if(window.localStorage.getItem('transaction') != undefined && window.localStorage.getItem('transaction') != null && window.localStorage.getItem('transaction') != '') {

                    var bodyParsedEnd = JSON.parse(window.localStorage.getItem('transaction'));

                    basePost("security/transaction", bodyParsedEnd)
                    .done(function(response) {
                        window.location.href = '/gracias/';
                    })
                    .fail(function(response) {
                    })
                    .always(function() {
                    }); 
    
                }
                
            }
        });

        $(document).on("click", "input:checkbox[name='services']", function() { 
    
            if(!$('#service-1fdcf8ea-199c-11eb-aed1-50e549398ade').is(':checked')) {
                $("#services-errorx").show();
            } else {
                $("#services-errorx").hide();
            }

            bodyParsedPayment['order'] = [];

            $("input[name='services']").each(function( i ) {
                if($(this).is(':checked')) {
                    bodyParsedPayment['order'].push({
                        'serviceId': $(this).val(),
                        'price': $(this).data("price"),
                        'quantity': 0,
                        'subtotal': 0
                    })
                }
            });

            setItemLocalStorageTransaction('order', bodyParsedPayment['order']);

            $(".price_total").html('S/' + calculateTotal(bodyParsedPayment));

    
        });

        $(document).on("click", 'input:radio[name="paymentMethodId"]', function() {  
            if($(this).is(':checked')) {
                $(".type-method-error").hide();
                if(($(this).val() == '176d7072-19f1-11eb-a86b-50e549398ade2' || $(this).val() == '176d7072-19f1-11eb-a86b-50e549398ade4')) {
                    $("#frm-store-payment").find("#image").val('').attr("value", '');
                }
            }
        });

        $(document).on("click", 'input:checkbox[name="terms"]', function() {  
            disabledButton('save-step-pets', true);
            if($(this).is(':checked')) {
                
                disabledButton('save-step-pets', false);
            }
        });


})(jQuery);
