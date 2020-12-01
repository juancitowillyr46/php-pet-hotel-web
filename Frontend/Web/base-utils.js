var bodyParsedPayment = {
    booking: {},
    customer: {},
    pets: [],
    payment: {},
    order: []
};

// 2097152 = 2MB
// 1813346 = 1MB
var fileSizeMax = 1160974; // 1813346

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

    getValidateIsLogin = function(response) {
        if(localStorage.getItem('accessToken') != undefined && localStorage.getItem('accessToken').value != ''){
            if(response != null) {
                $("#user-name").html(response.username);

                var imageDefault = $("#user-image").attr("src");
                console.log(imageDefault);

                if(response.customer && response.customer.image != undefined){
                    document.getElementById("user-image").src = (response.customer.image != '')?  response.customer.image: imageDefault;
                } else {
                    document.getElementById("user-image").src = imageDefault;                  
                }
            }
            $("#success-anonymus").hide();
            $("#success-login").show();
        } else {
            $("#success-anonymus").show();
            $("#success-login").hide();
        }
    }

    disabledButton = function(element, disabledBoolean) {
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

    alertError = function(response) {
        alert(response.responseJSON.error.message);
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

        if(localStorage.getItem('transaction') != undefined && localStorage.getItem('transaction').value != ''){
            
            bodyParsedPayment = JSON.parse(window.localStorage.getItem('transaction'));
            var numPets = Number(bodyParsedPayment['booking']['numPets']);

            if($(".container-pets-add").length > 0){
                for (let index = 0; index < numPets; index++) {
                    var theTemplateScript = $("#store-pet-template").html();
                    var theTemplate = Handlebars.compile(theTemplateScript);
                    var pets = {"pets": {"index" : index, "idx" : (index+1) }, };
                    $(".container-pets-add").append(theTemplate(pets));
                    getFileReaderPets("#frm-store-pet-" + index);
                    $("#frm-store-pet-" + index).validate();
                    buttonOpenFile("#frm-store-pet-" + index);
                }
            }
            
            // Default is Agressive
            $('input:radio[name="isAgressive"][value="7cd24279-5dfa-45ca-8fb5-6a730359721d"]').prop('checked', true).attr('checked', true);

        }
        
    }

    validateIsLoggin = function() {
        if(localStorage.getItem('accessToken') != undefined && localStorage.getItem('accessToken').value != ''){
            return true;
        } else {
            return false;
        }
    }

    validateIsStep = function() {
        // Validar si el usuario extá logeando
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
                // if(validateTransaction['order'].length == 0) {
                    window.location.href = '/step2/';
                }
            } else if(pathname == '/step4/') {
                // if($.isEmptyObject(validateTransaction['payment']) == true) {
                if(validateTransaction['order'].length == 0) {
                    window.location.href = '/step3/';
                }
            } else if(pathname == '/thankyou/' || pathname == '/gracias/') {
                // var bodyParsedPayment = {
                //     booking: {},
                //     customer: {},
                //     pets: [],
                //     payment: {},
                //     order: []
                // };
                localStorage.removeItem('transaction');
                //JSON.parse(window.localStorage.setItem('transaction', JSON.stringify(bodyParsedPayment)));  
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
    
    getFileReader = function(element) {
        $(document).on("change", element + " input:file", function(element){
            var that = $(this);

            var file_size = $(this)[0].files[0].size;
            console.log(file_size);
            if(file_size > fileSizeMax) {
                $(".error-size").html('El tamaño del archivo es superior a 2 MB');
            } else {
                if (this.files && this.files[0]) {  
                    var FR = new FileReader();
                    FR.addEventListener("load", function(e) {
                        that.parent(element).find("img").attr("src", e.target.result);
                        that.parent(element).find("#image").val(e.target.result);
                    }); 
                    FR.readAsDataURL( this.files[0] );
                    $(".error-size").html('');
                }
                
            }


        });
    }

    getFileReaderPets = function(content) {
        $(document).on("change", content + " input:file", function(element){
            var that = $(this);

            var file_size = $(this)[0].files[0].size;
            console.log(file_size);
            if(file_size > fileSizeMax) { // 
                $(".error-size").html('El tamaño del archivo es superior a 2 MB');
            } else {
                if (this.files && this.files[0]) {  
                    var FR = new FileReader();
                    FR.addEventListener("load", function(e) {
                        $(content).find("img").attr("src", e.target.result);
                        $(content).find(".image-pets").val(e.target.result);
                        //that.parent(element).find(".image-pets").val(e.target.result);
                    }); 
                    FR.readAsDataURL( this.files[0] );
                    $(".error-size").html('');
                }
            }

        });
    }

    getFileReaderVouchers = function(content) {
        $(document).on("change", content + " input:file", function(element){
            var that = $(this);
            if (this.files && this.files[0]) {  
                var FR = new FileReader();
                FR.addEventListener("load", function(e) {
                    //$(content).find("img").attr("src", e.target.result);
                    $(content).find("#screenVoucher").val(e.target.result);
                    //that.parent(element).find("img").attr("src", e.target.result);
                    //that.parent(element).find("#image").val(e.target.result);
                }); 
                FR.readAsDataURL( this.files[0] );
              }
        });
    }
        
    setItemLocalStorageTransaction = function(item, value) {
        const that = this;
        bodyParsedPayment[item] = value;
        window.localStorage.setItem('transaction', JSON.stringify(bodyParsedPayment));
    }

    getItemLocalStorageTransaction = function() {
        const that = this;
        if(window.localStorage.getItem('transaction') != undefined && window.localStorage.getItem('transaction') != null && window.localStorage.getItem('transaction') != '') {
            bodyParsedPayment = JSON.parse(window.localStorage.getItem('transaction'));

            if($("#frm-store-customer").length > 0) {
                keys = Object.keys(bodyParsedPayment['customer']);
                keys.forEach(key => {
                    if(key == 'isAgressive') {
                        $('input:radio[name="isAgressive"][value="'+ bodyParsedPayment['customer'][key] +'"]').prop('checked', true).attr('checked', true);
                    } else {
                        $("#" + key).val(bodyParsedPayment['customer'][key]);
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

            if($("#frm-store-payment").length > 0) {
                keys = Object.keys(bodyParsedPayment['payment']);
                keys.forEach(key => {
                    if(key == 'paymentMethodId') {
                        $('input:radio[name="paymentMethodId"][value="'+ bodyParsedPayment['payment'][key] +'"]').prop('checked', true).attr('checked', true);
                    } else {
                        $("#" + key).val(bodyParsedPayment['payment'][key]);
                    }
                });
            }

            if($(".frm-pets").length > 0 && bodyParsedPayment['pets'].length > 0) {
                $(".frm-pets").each(function(index){
                    
                    if($("#frm-store-pet-" + index).length > 0) {
                        
                        keys = Object.keys(bodyParsedPayment['pets'][index]);
                        keys.forEach(key => {
                            if(key == 'isAgressive') {
                                $("#frm-store-pet-" + index).find('input:radio[name="isAgressive"][value="'+ bodyParsedPayment['pets'][index][key] +'"]')
                                                            .prop('checked', true).attr('checked', true);
                            } else {

                   
                                $("#frm-store-pet-" + index)
                                                            .find("input[name='" + key+"']").val(bodyParsedPayment['pets'][index][key]);
                            }

                            if(key == 'gender') {
                                $("#frm-store-pet-" + index)
                                                            .find('option[value="'+ bodyParsedPayment['pets'][index][key] +'"]').prop('selected', true).attr('selected', true);
                            }

                            if(key == 'image') { 
                                if(bodyParsedPayment['pets'][index][key] != '') {
                                    $("#frm-store-pet-" + index).find("img").attr("src", bodyParsedPayment['pets'][index][key]);
                                } else {
                                    $("#frm-store-pet-" + index).find("img").attr("src", $("#frm-store-pet-" + index).find("img").attr("data-image-default"));
                                }
                                
                            }
                        });
                       
                        
                    }
                });   
            }

            if($("#frm-store-services").length > 0) { 
    
                if(bodyParsedPayment['order'].length > 0) { 
                    bodyParsedPayment['order'].forEach(element => {
                        $("#service-" + element['serviceId']).prop("checked", true);
                    });
                } else {
                    $("input[name='services']").each(function( i ) {
                        if($(this).val() == '1fdcf8ea-199c-11eb-aed1-50e549398ade') {
                            $(this).prop("checked", true).attr("checked", 'checked');
                            setItemLocalStorageTransaction('order', [{
                                'serviceId': $(this).val(),
                                'price': $(this).data("price"),
                                'quantity': 0,
                                'subtotal': 0
                            }]);
                        }
                    });
                }

                $(".price_total").html('S/' + calculateTotal(bodyParsedPayment));

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


    restaFechas = function(f1,f2)
    {
        var fechaini = new Date(f1);
        var fechafin = new Date(f2);
        var diasdif= fechafin.getTime()-fechaini.getTime();
        var contdias = Math.round(diasdif/(1000*60*60*24));
        return contdias;
    }

    calculateTotal = function(bodyParsedPayment) {

        var numDays = restaFechas(bodyParsedPayment['booking']['dateFrom'], bodyParsedPayment['booking']['dateTo']);
        var numPets = Number(bodyParsedPayment['booking']['numPets']);

        var countTotal = 0;
        bodyParsedPayment['order'].forEach(service => { 
            if(service.serviceId == '1fdcf8ea-199c-11eb-aed1-50e549398ade') {
                countTotal = countTotal + ((service.price * numDays) * numPets);
            } else {
                countTotal = countTotal + (service.price * numPets);
            }
        });
        return countTotal;

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

})(jQuery);