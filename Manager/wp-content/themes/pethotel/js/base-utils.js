var bodyParsedPayment = {
    booking: {},
    customer: {},
    pets: [],
    payment: {},
    order: [],
    terms: {},
    usingContact: {}
};

// 2097152 = 2MB
// 1813346 = 1MB
var fileSizeMax = 1813346; // 1813346

Handlebars.registerHelper('ifeq', function (a, b, options) {
    if (a == b) { return options.fn(this); }
    return options.inverse(this);
});

Handlebars.registerHelper('ifnoteq', function (a, b, options) {
    if (a != b) { return options.fn(this); }
    return options.inverse(this);
});

(function ($) { 

    getFormData = function($form){
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};   
        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }

    disabledButton = function(element, disabledBoolean) {
        if(disabledBoolean === true) {
            $("#modal-loading").fadeIn();
        } else {
            $("#modal-loading").fadeOut();
        }
        
        $("#" + element).attr("disabled", disabledBoolean);
        $("#" + element).prop('disabled', disabledBoolean);
        if($("#" + element).is(":disabled")){
            $("#" + element).attr("style", "cursor: not-allowed! important");
        } else {
            $("#" + element).attr("style", "");
        }
    }

    resetForm = function(element) {
        $("#" + element).get(0).reset();
    }

    alertError = function(response, message = '') {
        $("#modal-error").fadeIn();
        if(message != '') {
            $("#modal-error").find(".message").html(message);
        } else {
            $("#modal-error").find(".message").html(response.responseJSON.error.message);
        }
        
        setTimeout(() => {
            $("#modal-error").fadeOut();
        }, 5000);
    }

    alertErrorServiceNoExist = function(response, message = '') {
        $("#modal-error").fadeIn();
        if(message != '') {
            $("#modal-error").find(".message").html(message);
        } else {
            $("#modal-error").find(".message").html(response.responseJSON.error.message);
        }
        
        setTimeout(() => {
            $("#modal-error").fadeOut();
            window.history.back();
        }, 4000);
    }

    alertErrorTokenExpired = function(response, message = '') {
        $("#modal-error").fadeIn();
        if(message != '') {
            $("#modal-error").find(".message").html(message);
        } else {
            $("#modal-error").find(".message").html(response.responseJSON.error.message);
        }
        
        setTimeout(() => {
            
            $("#modal-error").fadeOut();
            $("#modal-loading").fadeOut();
            $("#modal-login-register").fadeIn();

            var tabId = "tabLogin";
            $(".ms-tab-item").removeClass("active");
            $("#"+tabId).addClass("active");
            $(".ms-header-group .ms-tab-btn").removeClass("active");
            $(".ms-tab-btn[data-tab='"+tabId+"']").addClass("active");

            $("body").addClass("close-false");
        }, 5000);

    }

    assignedToken = function(response) {
        localStorage.setItem('accessToken', response.data.token);
    }

    setValueBoolean = function(bodyParsed) {
        bodyParsed.active = (bodyParsed.active === 'true')? true : false;
        return bodyParsed;
    }

    getLogout = function() {
        localStorage.removeItem('accessToken');
        localStorage.clear();
        location.href = '/';
    }

    // Generador de Formularios
    generateFormOfPets = function () {

        if(localStorage.getItem('accessToken') != undefined && localStorage.getItem('accessToken').value != '' && localStorage.getItem('accessToken') != null){ 

            
        } else {

            // Logic B
            // var existParamServiceId = getValidateUrlServiceId();
            // console.log(existParamServiceId);
            // if(!existParamServiceId){
            //     return true;
            // } else {

            // }
            // if(!existParamServiceId) {
            //     paymentMethod = response['data'].filter(f => f.value != '176d7072-19f1-11eb-a86b-50e549398ade4');
            // } else {
            //     paymentMethod = response['data'];
            // }

            return true;
        }

        if(localStorage.getItem('transaction') != undefined && localStorage.getItem('transaction').value != ''){
            
            baseGet("security/me", '')
            .done(function(response) {
                if(response.data['pets'].length > 0) {
                    if($("#store-pet-exist-tpl").length > 0) {

                        var theTemplateScript = $("#store-pet-exist-tpl").html();
                        var theTemplate = Handlebars.compile(theTemplateScript);

                        // Perros registrados anteriormente
                        var userInfo = response.data;
                        if(userInfo['pets'].length > 0){
                            var idx = 0;
                            $(".count-pets").html('N° de perros permitidos: ' + Number(bodyParsedPayment['booking']['numPets']));

                            userInfo['pets'].forEach(element => {
                                element['index'] = idx;
                                idx = idx + 1;
                                if($("#frm-store-pet-" + element['index']).length > 0) {

                                    $("#frm-store-pet-" + element['index']).validate({ignore: ""});

                                    keys = Object.keys(element);
                                    keys.forEach(key => {
                                        $("#frm-store-pet-" + element['index']).find("[name='" + key+"']").val(element[key]);
                                    });
                                }
                            });

                            $(".ms-dogs").html(theTemplate(userInfo));
                            
                            userInfo['pets'].forEach(element => {
        
                                if($("#frm-store-pet-" + element['index']).length > 0) {
                                    keys = Object.keys(element);
                                    keys.forEach(key => {
                                        $("#frm-store-pet-" + element['index']).find("[name='" + key+"']").val(element[key]);
                                    });
                                }
                            });

                        }

                    }

                } else {

                    // Nuevos perros
                    bodyParsedPayment = JSON.parse(window.localStorage.getItem('transaction'));
                    var numPets = Number(bodyParsedPayment['booking']['numPets']);

                    if($(".container-pets-add").length > 0){
                        for (let index = 0; index < numPets; index++) {
                            var theTemplateScript = $("#store-pet-template").html();
                            var theTemplate = Handlebars.compile(theTemplateScript);
                            var pets = {"pets": {"index" : index, "idx" : (index+1) }, };
                            $(".container-pets-add").append(theTemplate(pets));
                            //getFileReaderPets("#frm-store-pet-" + index);
                            $("#frm-store-pet-" + index).validate();
                            buttonOpenFile("#frm-store-pet-" + index);
                        }
                    }

                    // Default is Agressive
                    $('input:radio[name="isAgressive"][value="7cd24279-5dfa-45ca-8fb5-6a730359721d"]').prop('checked', true).attr('checked', true);
                     
                }

                var calendarInput = jQuery(".ms-input-calendar");
                if(calendarInput.length){
                    calendarInput.each(function() {
                    var calendarParent = jQuery(this).parent();
                    var calendarId = jQuery(this).attr("id");
                    jQuery("#"+calendarId).datepicker({
                        beforeShow:function(textbox, instance){
                        calendarParent.append(jQuery('#ui-datepicker-div'));
                        }
                    });
                    });
                }
                
                getItemLocalStorageTransaction();
                
            })
            .fail(function(response) {

            })
            .always(function() {
                
            });

        }
        
    }

    validateIsLogin = function() {
        if(localStorage.getItem('accessToken') != undefined && localStorage.getItem('accessToken').value != ''){
            return true;
        } else {
            return false;
        }
    }

    validateIsStep = function() {

        // Logic B
        var existParamServiceId = getValidateUrlServiceId();

        if(existParamServiceId) {

            var queryString = window.location.search;

            var urlParams = new URLSearchParams(queryString);

            var serviceId = urlParams.get('serviceId');

            getService(serviceId);

            
            return true;
        } 

        // Logic A
        // Validar si el usuario existe logeando
        if(localStorage.getItem('accessToken') != undefined && localStorage.getItem('accessToken').value != ''){

            var validateTransaction;

            if(window.localStorage.getItem('transaction') != undefined && window.localStorage.getItem('transaction') != null && window.localStorage.getItem('transaction') != '') {
                validateTransaction = JSON.parse(window.localStorage.getItem('transaction'));             
            } else {
                window.location.href = '/';
            }

            if(pathname == '/step1/') {
                if($.isEmptyObject(validateTransaction['booking']) == true) {
                    window.location.href = '/';
                }
            } else if(pathname == '/step2/') {
                if(validateTransaction['pets'].length == 0) {
                    window.location.href = '/step1/';
                }
            } else if(pathname == '/step3/') {
                if($.isEmptyObject(validateTransaction['customer']) == true) {
                    window.location.href = '/step2/';
                }
            } else if(pathname == '/step4/') {

                if(validateTransaction['order'].length == 0) {
                    window.location.href = '/step3/';
                }

            } else if(pathname == '/thankyou/' || pathname == '/gracias/') {
                localStorage.removeItem('transaction');
            }

            return true;
        } else {
            $(".icon-user.ms-show-lg-modal").trigger("click");
        }
        


       
    }

    setDataOfPayment = function(key, element) {
        var formData = element;
        bodyParsedPayment[key] = formData;
    }

    getValidateUrlServiceId = function() {
        var field = 'serviceId';
        var url = window.location.href;
        if(url.indexOf('?' + field + '=') != -1)
            return true;
        else if(url.indexOf('&' + field + '=') != -1)
            return true;
        return false;
    }
    getValidateUrlServiceISpecial = function() {
        var field = 'serviceSpecial';
        var url = window.location.href;
        if(url.indexOf('?' + field + '=') != -1)
            return true;
        else if(url.indexOf('&' + field + '=') != -1)
            return true;
        return false;
    }
    
    // getFileReaderVouchers = function(content) {
    //     $(document).on("change", content + " input:file", function(element){

    //         var file_size = $(this)[0].files[0].size;
    //         if(file_size > fileSizeMax) { // 
    //             $(".error-size").html('El tamaño del archivo es superior a 2 MB');
    //         } else {
    //             var that = $(this);
    //             $(".error-size").html('');
    //             if (this.files && this.files[0]) {  
    //                 performImageCompression(this.files[0], $(content).find("[name='screenVoucher']"), null);
                    
                    
    //             }

    //         }
    //     });
    // }
        
    setItemLocalStorageTransaction = function(item, value) {
        const that = this;
        bodyParsedPayment[item] = value;
        window.localStorage.setItem('transaction', JSON.stringify(bodyParsedPayment));
    }

    getItemLocalStorageTransaction = function() {
        const that = this;
        if(window.localStorage.getItem('transaction') != undefined && window.localStorage.getItem('transaction') != null && window.localStorage.getItem('transaction') != '') {

            bodyParsedPayment = JSON.parse(window.localStorage.getItem('transaction'));

            // New Pets
            if($(".frm-pets").length > 0 && bodyParsedPayment['pets'].length > 0) {

                $(".frm-pets").each(function(index){
                    
                    var frmPetStore = $("#frm-store-pet-" + index);
                    if(frmPetStore.length > 0) {
                        
                        keys = Object.keys(bodyParsedPayment['pets'][index]);
                        keys.forEach(key => {
                            if(key == 'isAgressive') {
                                frmPetStore.find('[name="isAgressive"][value="'+ bodyParsedPayment['pets'][index][key] +'"]')
                                                            .prop('checked', true).attr('checked', true);
                            } else {

                                frmPetStore.find("[name='" + key+"']").val(bodyParsedPayment['pets'][index][key]);
                            }

                            if(key == 'gender') {
                                frmPetStore.find('option[value="'+ bodyParsedPayment['pets'][index][key] +'"]').prop('selected', true).attr('selected', true);
                            }

                            if(key == 'image') { 
                                if(bodyParsedPayment['pets'][index][key] != '') {
                                    frmPetStore.find("img").attr("src", bodyParsedPayment['pets'][index][key]);
                                } else {
                                    frmPetStore.find("img").attr("src", frmPetStore.find("img").attr("data-image-default"));
                                }
                            }
                        });
                       
                    }
                });  
                
                if($('input:checkbox[name="terms"]').length > 0 && bodyParsedPayment['terms']) {
                    $('input:checkbox[name="terms"]').prop("checked", (bodyParsedPayment['terms'] === '1')? true : false);
                }

            // Exists Pets
            } else if($(".frm-petsbycheckbox").length > 0 && bodyParsedPayment['pets'].length > 0) {
                
                $(".frm-petsbycheckbox").removeClass('checked-form');
                
                $(".frm-petsbycheckbox").each(function(index){ 
                    bodyParsedPayment['pets'].forEach(element => {
                        $('input:checkbox[name="selectPet"][value="'+element.id+'"]').prop('checked', true).attr('checked', true);
                        $(this).addClass('checked-form');
                    });
                });

                validateSelectedPet();

            }

            if($("#frm-store-customer").length > 0) {

                keys = Object.keys(bodyParsedPayment['customer']);
                keys.forEach(key => {
                    if(key == 'isAgressive') {
                        $('input:radio[name="isAgressive"][value="'+ bodyParsedPayment['customer'][key] +'"]').prop('checked', true).attr('checked', true);
                    } else {
                        $("[name='" + key + "']").val(bodyParsedPayment['customer'][key]);
                    }

                    if(key == 'image') { 

                        if(bodyParsedPayment['customer'][key] != '') {
                            $("#frm-store-customer").find("img").attr("src", bodyParsedPayment['customer'][key]);
                        } else {
                            $("#frm-store-customer").find("img").attr("src", $("frm-store-customer").find("img").attr("data-image-default"));
                        }
                        
                    }
                });
            }

            if($("#frm-store-services").length > 0) { 
    
                if(Number(bodyParsedPayment['booking']['numPets']) > 1) {
                    $(".ms-msg-note").show();
                }
                
                if(bodyParsedPayment['order'].length > 0) {  
                    bodyParsedPayment['order'].forEach(element => {
                        $("#service-" + element['serviceId']).prop("checked", true);
                        $("#cant-pet-" + element['serviceId']).val(Number(element['quantity']));
                        $("#cant-pet-" + element['serviceId']).prop('disabled', true);
                        if(element['serviceId'] != '1fdcf8ea-199c-11eb-aed1-50e549398ade'){
                            $("#cant-pet-" + element['serviceId']).prop('disabled', false);
                        }
                    });
                    calculateService();
                    

                } else {
                    $("#service-1fdcf8ea-199c-11eb-aed1-50e549398ade").prop("checked", true).attr("checked", 'checked');
                    $("#cant-pet-1fdcf8ea-199c-11eb-aed1-50e549398ade").prop('disabled', true);
                    calculateService();

                }
            }

            if($("#frm-store-payment").length > 0) {

                // Mostrar datos del cliente en la facturación
                keys = Object.keys(bodyParsedPayment['payment']);
                keys.forEach(key => {
                    if(key == 'paymentMethodId') {
                        $('input:radio[name="paymentMethodId"][value="'+ bodyParsedPayment['payment'][key] +'"]').prop('checked', true).attr('checked', true);
                    } else {
                        $("#" + key).val(bodyParsedPayment['payment'][key]);
                    }
                });
                
                // Mostrar datos del cliente en la facturación
                if($('input:checkbox[name="payment"]').length > 0) {
                    $('input:checkbox[name="payment"]').prop("checked", (bodyParsedPayment['usingContact'] === '1')? true : false);
                }

                viewDetail(bodyParsedPayment);
            }

        }

    }

    removeItemLocalStorage = function(item) {
        if(window.localStorage.getItem('transaction') != undefined && window.localStorage.getItem('transaction') != null && window.localStorage.getItem('transaction') != '') {
            window.localStorage.removeItem(item);
        }
    }

    buttonOpenFile = function(content) {
        $(document).on("click", content + " .ms-picture-jr", function(element){
            $(content + " input:file").trigger("click");
        });
    }

    restaFechas = function(f1,f2) {
        
        // 23:59:00
        // 23:59:00
        var itr = moment.twix(new Date(f1+' 00:00:00'),new Date(f2+' 23:59:00')).iterate("days");
        var range=[];
        while(itr.hasNext()){
            range.push(itr.next().format("YYYY-M-D"))
        }
        // console.log(range.length);

        // var fechaini = new Date(f1);
        // var fechafin = new Date(f2);
        // var diasdif= fechafin.getTime()-fechaini.getTime();
        // var contdias = Math.round(diasdif/(1000*60*60*24));
        return range.length;
    }

    calculateTotal = function(bodyParsedPayment) {

        var numDays = restaFechas(bodyParsedPayment['booking']['dateFrom'], bodyParsedPayment['booking']['dateTo']);
        var numPets = Number(bodyParsedPayment['booking']['numPets']);
        var countTotal = 0;

        bodyParsedPayment['order'].forEach(service => { 
            if(service.serviceId == '1fdcf8ea-199c-11eb-aed1-50e549398ade') {
                countTotal = countTotal + ((service.price * numDays) * numPets);
            } else {
                
                var serviceType = $("#service-" + service.serviceId).data("service-type");

                // Solo Paquetes
                if(serviceType === '7afa5547-3043-43de-8299-c9491ede9019') {
                    var isServiceSpecial = $("#service-" + service.serviceId).data("service-special");
                    // Es NO
                    if(isServiceSpecial == '87f31ead-cbbe-40a1-bef3-b7d16b65b280') {
                        var numDaysServices = $("#service-" + service.serviceId).data("num-days");
                        countTotal = countTotal + ((service.price * numDaysServices) * numPets);
                    } else {
                        countTotal = countTotal + (service.price * service.quantity);
                    }
                } else {
                    countTotal = countTotal + (service.price * service.quantity);
                } 
                
            }
        });
        return countTotal;

    }

    calcularSubtotal = function(bodyParsedPayment) {

        var numDays = restaFechas(bodyParsedPayment['booking']['dateFrom'], bodyParsedPayment['booking']['dateTo']);
        var numPets = (bodyParsedPayment['booking']['numPets'] != undefined)? Number(bodyParsedPayment['booking']['numPets']) : 1;

        bodyParsedPayment['order'].forEach(service => { 
            if(service.serviceId == '1fdcf8ea-199c-11eb-aed1-50e549398ade') {
                service['subtotal'] = ((service.price * numDays) * numPets);
            } else {
                service['subtotal'] = (service.price * numPets);
            }
        });

        return bodyParsedPayment;

    }

    viewDetail = function(bodyParsedPayment) {
        if(bodyParsedPayment['order'].length > 0 && $("#store-detail-payment-template").length) {
            var theTemplateScript = $("#store-detail-payment-template").html();
            var theTemplate = Handlebars.compile(theTemplateScript);
            var getCalcularSubtotal = calcularSubtotal(bodyParsedPayment);
            $(".tBody").html('');
            $(".tBody").append(theTemplate(getCalcularSubtotal));
            $(".count_total").html(calculateTotal(bodyParsedPayment));
            $(".tBody").append('<tr><td align="left">TOTAL S/</td><td align="right">'+calculateTotal(bodyParsedPayment)+'</td></tr>');
        }
    }

    getDataCustomer = function(me) {

        if($("#frm-store-customer").length > 0) {
            if(me['customer'] && me['customer']['firstName'] != '') {
                var keys = Object.keys($("#frm-store-customer").serializeFormJSON());
                keys.forEach(key => {
                    $("#frm-store-customer").find("[name='" + key + "']").val(me['customer'][key]);
                    if(key == 'image'){
                        if(me['customer'][key] != '') {
                            $("#frm-store-customer").find("img").attr("src", me['customer'][key]);
                        } else {
                            $("#frm-store-customer").find("img").attr("src", $("#frm-store-customer").find("img").attr("data-image-default"));
                        }
                    }
                });
                $("#frm-store-customer").find("[name='districtId']").val(me['customer']['districtId']);
            }
        }
    }

    validateSelectedPet = function() {

        var numPets = bodyParsedPayment['booking']['numPets'];

        if($('input:checkbox[name="selectPet"]:checked').length == numPets) {
            $('input:checkbox[name="selectPet"]').not(':checked').each(function ()
                {
                    $(this).prop('disabled', true);
                }
            );
        } else {
            $('input:checkbox[name="selectPet"]').each(function ()
                {
                    $(this).prop('disabled', false);
                }
            );
        }
    }

    $.fn.serializeFormJSON = function () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };


    performImageCompression = function(eventHandler, control, controlImage){

        var canvas=document.createElement("canvas");
        var ctx=canvas.getContext("2d");
        var cw=canvas.width;
        var ch=canvas.height;
        var maxW=600;
        var maxH=600;

        var img = new Image;
        img.onload = function() {
            var iw=img.width;
            var ih=img.height;
            var scale=Math.min((maxW/iw),(maxH/ih));
            var iwScaled=iw*scale;
            var ihScaled=ih*scale;
            canvas.width=iwScaled;
            canvas.height=ihScaled;
            ctx.drawImage(img,0,0,iwScaled,ihScaled);
            var dataurl = canvas.toDataURL("image/jpeg", 0.5);
            if(controlImage != null) {
                controlImage.attr("src", dataurl);
            }
            control.val(dataurl);
            console.log(dataurl);
        }
        img.src = URL.createObjectURL(eventHandler);
        
    }

    incrementDays = function(bodyParsedPayment, numDays, increment) {

        var bookingLog = JSON.parse(localStorage.getItem('bookingLog'));
        var tomorrow = '';

        if(increment == 1) {
            tomorrow = new Date(bodyParsedPayment['booking']['dateFrom']);
            tomorrow.setDate((tomorrow.getDate() + 1) + (numDays));

            var dd = tomorrow.getDate();
            var mm = tomorrow.getMonth() + 1; 
            var yyyy = tomorrow.getFullYear(); 

            if (mm < 10) { 
                mm = '0' + mm; 
            } 
            if (dd < 10) { 
                dd = '0' + dd; 
            } 
            var today = yyyy + '-' + mm + '-' + dd;

            bodyParsedPayment['booking']['dateTo'] = today;
        } else {
            
            bodyParsedPayment['booking']['dateTo'] = bookingLog['dateTo'];
        }
        
        
        setItemLocalStorageTransaction('booking', bodyParsedPayment['booking']);
    }

    calculateService = function() {
        orderList = [];


        $("input[name='services']").each(function( i ) { 
            

            if($(this).is(':checked')) {  

                // Servicio
                var serviceId = $(this).val();

                $("#cant-pet-" + serviceId).prop('disabled', true);
                if($(this).data('service-type') != '7afa5547-3043-43de-8299-c9491ede9019' && serviceId != '1fdcf8ea-199c-11eb-aed1-50e549398ade') {
                    $("#cant-pet-" + serviceId).prop('disabled', false);
                }

                $("#service-1fdcf8ea-199c-11eb-aed1-50e549398ade").prop("checked", true);

                if($(this).data('service-type') === '7afa5547-3043-43de-8299-c9491ede9019' && $(this).data('service-special') === '685e7f12-7fef-421b-b57c-f3e05e2b1196') {
                    $("#service-1fdcf8ea-199c-11eb-aed1-50e549398ade").prop("checked", false);
                }

                // Es especial
                if($(this).data('service-special') === '685e7f12-7fef-421b-b57c-f3e05e2b1196') {
                    $("input[name='services']").each(function( i ) {  
                        if($(this).data('service-special') === '685e7f12-7fef-421b-b57c-f3e05e2b1196') {
                            $(this).prop("checked", false);
                            if($(this).val() == serviceId) {
                                $(this).prop("checked", true);
                            }
                        }
                    });
                }
            }
        });

        
        
        $("input[name='services']").each(function( i ) {  
            if($(this).is(':checked')) {  

                // Servicio
                var serviceId = $(this).val();

                // Obtendo el precio
                var price = $(this).data("price");

                // Obtengo el número de mascotas
                var cantPets = Number($("#cant-pet-" + serviceId).val());

                // Subtotal
                var subtotal = (price * cantPets);

                // Name Service
                var serviceName = $(this).data('name');

                orderList.push({
                    'serviceId': serviceId,
                    'price'    : price,
                    'quantity' : cantPets,
                    'subtotal' : subtotal,
                    'serviceName': serviceName
                });

            }
        });

        if(orderList.length > 0){

            incrementDays(bodyParsedPayment, 0, 0);

            $("input[name='services']").each(function( i ) {  
                if($(this).is(':checked')) {   
                    if($(this).data('service-special') === '685e7f12-7fef-421b-b57c-f3e05e2b1196') { 
                        incrementDays(bodyParsedPayment, Number($(this).data('num-days')), 1);
                    }
                }
            });

            setItemLocalStorageTransaction('order', orderList);
        }
        $(".price_total").html('S/' + calculateTotal(bodyParsedPayment));
    }

    getService = function(serviceId) {
        baseGet("services/", serviceId).done(function(response) {
            if(response['data'] && response['statusCode'] == 200){
                // console.log(response);
                var orderList = [];

                orderList.push({
                    'serviceId': response['data']['id'],
                    'price'    : response['data']['price'],
                    'quantity' : 1,
                    'subtotal' : response['data']['price'],
                    'serviceName': response['data']['name']
                });

                bodyParsedPayment['order'] = orderList;

                setItemLocalStorageTransaction('serviceId', serviceId);
                setItemLocalStorageTransaction('order', bodyParsedPayment['order']);

                viewDetail(bodyParsedPayment);
            }
        })
        .fail(function(response) {
            
            if(response.responseJSON.statusCode === 404) {
                alertErrorServiceNoExist(response, 'El servicio no existe');
            }
        })
        .always(function() {

        });
    }


})(jQuery);