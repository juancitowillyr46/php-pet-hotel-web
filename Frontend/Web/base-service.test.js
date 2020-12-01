var that = this;

bodyParsedPayment = {
    booking: {},
    customer: {},
    pets: [],
    payment: {},
    order: []
};

var getServiceData = [];

(function ($) {
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

(function($) {

    $(function() { 


        /* Environment */
    var BASE_URL_API = 'http://localhost:8089/api/';
    var me = null;
    var pathname = window.location.pathname;
    var that = this;

    // Validate URls
    if(pathname == '/user-profile/'){
        if(localStorage.getItem('accessToken') == undefined || localStorage.getItem('accessToken') == null){
            location.href = '/';
        }
    }

    /* Integration */
    getMe();


    /* --- Integration DOM --- */

    // Form Login
    $("#frm-login").validate({
        beforeSubmit: function(arr, $form, options) {
            disabledButton("btn-login", true);
        },
        submitHandler: function(form) {
            
            disabledButton("btn-login", true);
            // $("#success-anonymus").hide();
            // $("#success-login").show();

            var bodyParsed = getFormData($("#frm-login"));
        
            basePost("security/web/login", bodyParsed)
            .done(function(response) {
                assignedToken(response);
                disabledButton("btn-login", false);
                resetForm("frm-login");
                //getMe();
                location.href = '';
            })
            .fail(function(response) {
                alertError(response);
                resetForm("frm-login");
                disabledButton("btn-login", false);
            })
            .always(function() {
                // alert( "finished" );
            }); 
        }
    });
   
    

    // Form Register 
    $("#frm-register").validate({
        beforeSubmit: function(arr, $form, options) {
            disabledButton("btn-register", true);
        },
        submitHandler: function(form) {
            var bodyParsed = getFormData($("#frm-register"));
            disabledButton("btn-register", true);
            basePost("security/web/register", bodyParsed)
            .done(function(response) {
                assignedToken(response);
                disabledButton("btn-register", false);
                resetForm("frm-register");
                location.href = '';
                //getMe();
            })
            .fail(function(response) {
                alertError(response);
                resetForm("frm-register");
                disabledButton("btn-register", false);
            })
            .always(function() {
                // alert( "finished" );
            });
        }
    });

    // Form Edit Pet
    $("#frm-edit-pet").validate({
        beforeSubmit: function(arr, $form, options) {
            disabledButton("btn-edit-pet", true);
        },
        submitHandler: function(form) {
            var bodyParsed = getFormData($("#frm-edit-pet"));
            disabledButton("btn-edit-pet", true);

            bodyParsed.image = $("#frm-edit-pet").find("#preview").attr("src");
            bodyParsed.isAgressive = (bodyParsed.isAgressive === 'true')? true : false;
            bodyParsed.active = 'true';

            if(bodyParsed.id != "") {
                try {

                    
                    
                    bodyParsed = setValueBoolean(bodyParsed);
                    
                    basePut("pets/", bodyParsed, bodyParsed.id)
                    .done(function(response) {
                        console.log(response);
                        resetForm("frm-edit-pet");
                        disabledButton("btn-edit-pet", false);
                    })
                    .fail(function(response) {
                        alertError(response);
                        resetForm("frm-edit-pet");
                        disabledButton("btn-edit-pet", false);
                    })
                    .always(function() {
                        location.href = '';
                    });
    
                } catch (e) {
                    disabledButton("btn-edit-pet", false);
                }
               
            } else {
                try {

                    bodyParsed = setValueBoolean(bodyParsed);
                    delete bodyParsed.id;

                    basePost("pets", bodyParsed)
                    .done(function(response) {
                        console.log(response);
                        resetForm("frm-edit-pet");
                        disabledButton("btn-edit-pet", false);
                    })
                    .fail(function(response) {
                        alertError(response);
                        resetForm("frm-edit-pet");
                        disabledButton("btn-edit-pet", false);
                    })
                    .always(function() {
                        location.href = '';
                    });
    
                } catch (e) {
                    disabledButton("btn-edit-pet", false);
                }
            }

           
        }
    });

    $(document).on('click','#btn-edit-pet', function() {
        $("#frm-edit-pet").submit();
    });

    $(document).on('click','.btn-get-pet',function(){
        if($(this).data("pet-id") != undefined || $(this).data("pet-id") != ""){
            setFormPet($(this).data("pet-id"));
        } else {
            setFormPet(null);
        }
    });

        
    $("#frm-edit-customer").validate({
        beforeSubmit: function(arr, $form, options) {
            disabledButton("btn-edit-customer", true);
        },
        submitHandler: function(form) {
            var bodyParsed = getFormData($("#frm-edit-customer"));
            disabledButton("btn-edit-customer", true);
            bodyParsed.image = $("#frm-edit-customer").find("#preview").attr("src");

            if(bodyParsed.id != "") {
                try {

                    
                    bodyParsed = setValueBoolean(bodyParsed);
                    
                    basePut("customers/", bodyParsed, bodyParsed.id)
                    .done(function(response) {
                        console.log(response);
                        resetForm("frm-edit-customer");
                        disabledButton("btn-edit-customer", false);
                    })
                    .fail(function(response) {
                        alertError(response);
                        resetForm("frm-edit-customer");
                        disabledButton("btn-edit-customer", false);
                    })
                    .always(function() {
                        location.href = '';
                    });
    
                } catch (e) {
                    disabledButton("btn-edit-customer", false);
                }
               
            } else {
                
                try {

                    bodyParsed = setValueBoolean(bodyParsed);
                    delete bodyParsed.id;

                    basePost("customers", bodyParsed)
                    .done(function(response) {
                        console.log(response);
                        resetForm("frm-edit-customer");
                        disabledButton("btn-edit-customer", false);
                    })
                    .fail(function(response) {
                        alertError(response);
                        resetForm("frm-edit-customer");
                        disabledButton("btn-edit-customer", false);
                    })
                    .always(function() {
                        location.href = '';
                    });
    
                } catch (e) {
                    disabledButton("btn-edit-customer", false);
                }
            }
           
        }
    });
    
    $(document).on('click','#btn-edit-customer', function() {
        $("#frm-edit-customer").submit();
    });


    
    $(document).on('click','.btn-get-customer',function(){
        console.log($(this).data("customer-id"));
        if($(this).data("customer-id") != undefined && $(this).data("customer-id") != ""){
            setFormCustomer($(this).data("customer-id"));
        } else {
            setFormCustomer(null);
        }
    });

    $(document).on('click','#btn-logout', function() {
        var success = confirm('¿Estás seguro que deseas cerrar sesión?');
        if(success){
            getLogout();
        }
    });

    
    // Proceso de Pago

    // Validación de formularios
    $("#frm-store-booking").validate();
    $("#frm-store-customer").validate();
    $("#frm-store-services").validate();
    $("#frm-store-payment").validate();
    
    disabledButton('save-step-pets', true);
    disabledButton('save-step-customer', true);
    disabledButton('save-step-services', true);
    disabledButton('save-step-payment', true);

    getFileReader('#frm-store-customer');
    getFileReader('#frm-store-payment');

    getServices();
    getMethodsPayments();
    
    $(document).on('click','#save-step-booking', function() {
        if($("#frm-store-booking").valid() == true){
            if(validateIsLoggin() == true) {
                var numPets = Number($("#numPets").val());
                generateFormOfPets(numPets);
                setDataOfPayment("booking", $("#frm-store-booking").serializeFormJSON());
                disabledButton('save-step-pets', false);
                setItemLocalStorage("booking", bodyParsedPayment['booking']);

            } else {
                alert('TODO: mostrar el modal para login o registro');
            }
        }
    });

    $(document).on("click", "#save-step-pets", function() {
        var num_pets = bodyParsedPayment['booking']['numPets'];
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
            setItemLocalStorage("pets", pets);
        }
    });
    
    $(document).on("click", "#save-step-customer", function() { 
        if($("#frm-store-customer").valid() == true){
            setDataOfPayment("customer", $("#frm-store-customer").serializeFormJSON());
            disabledButton('save-step-services', false);
            setItemLocalStorage("customer", bodyParsedPayment['customer']);
        }
    });
    
    $(document).on("click", "input:checkbox[name='services']", function() { 

        var total = 0;

        var formData = $("#frm-store-services").serializeFormJSON();

        if(formData.hasOwnProperty('services') && Array.isArray(formData['services'])) {

            formData['services'].forEach(function(element){
                if(that.getServiceData.find(f => f.id == element) != undefined) {
                    total = total + that.getServiceData.find(f => f.id == element).price;
                }
            });

        } else {

            if(that.getServiceData.find(f => f.id == formData['services']) != undefined) {
                total = total + that.getServiceData.find(f => f.id == formData['services']).price;
            }

        }
        if(total > 0){
            
            disabledButton('save-step-payment', false);
            
        }
        
        $(".price_total").html(total);

    });

    $(document).on("click", "#save-step-services", function() { 
        try {
            if($("#frm-store-services").valid() == true){
                disabledButton('save-step-payment', false);
                var order = [];
                var servicesBodyParsed = $("#frm-store-services").serializeFormJSON();
                servicesBodyParsed['services'].forEach(service => {
                    if(service == that.getServiceData.find(f => f.id == service) != undefined) {
                        order.push(that.getServiceData.find(f => f.id == service));
                    }
                });
                setDataOfPayment("order", order);
                setItemLocalStorage("order", order);
            }
        } catch(e) {
            console.log(e);
        }
        
    });
    
    $(document).on("click", "#save-step-payment", function() { 
        if($("#frm-store-payment").valid() == true){
            setDataOfPayment("payment", $("#frm-store-payment").serializeFormJSON());
            setItemLocalStorage("payment", bodyParsedPayment['payment']);
            console.log('Pago registrado');
            console.log(bodyParsedPayment);
        }
    });


    // TODO: Web Utils
    function generateFormOfPets(numPets) {
        for (let index = 0; index < numPets; index++) {
            var theTemplateScript = $("#store-pet-template").html();
            var theTemplate = Handlebars.compile(theTemplateScript);
            var pets = {"pets": {"index" : index }};
            $(".container-pets-add").append(theTemplate(pets));

            getFileReader("#frm-store-pet-" + index);

            
            $("#frm-store-pet-" + index).validate();
            
        }
        // Default is Agressive
        $('input:radio[name="isAgressive"][value="false"]').prop('checked', true).attr('checked', true);
    }

    function validateIsLoggin() {
        if(localStorage.getItem('accessToken') != undefined && localStorage.getItem('accessToken').value != ''){
            return true;
        } else {
            return false;
        }
    }

    function setDataOfPayment(key, element) {
        var formData = element;
        bodyParsedPayment[key] = formData;
    }
    
    function getFileReader(element) {
        $(document).on("change", element + " input:file", function(element){
            var that = $(this);
            if (this.files && this.files[0]) {  
                var FR = new FileReader();
                FR.addEventListener("load", function(e) {
                    that.parent().find("img").attr("src", e.target.result);
                    that.parent().find("#image").val(e.target.result);
                }); 
                FR.readAsDataURL( this.files[0] );
              }
        });
    }
 
    function getServices() {
        baseGet("services?size=10&page=1&usingPaginate=1", '')
        .done(function(response) {

            var theTemplateScript = $("#store-service-template").html();
            var theTemplate = Handlebars.compile(theTemplateScript);
            $(".container-services-add").html(theTemplate(response['data']));
            that.getServiceData = response['data']['rows'];
            
        })
        .fail(function(response) {

        })
        .always(function() {

        });
    }

    function getMethodsPayments() {
        baseGet("commons/data-master/payment-method", '')
        .done(function(response) {
            var theTemplateScript = $("#store-payment-method-template").html();
            var theTemplate = Handlebars.compile(theTemplateScript);
            $(".container-payment-method-add").html(theTemplate(response));            
        })
        .fail(function(response) {

        })
        .always(function() {

        });
    }
    
    function setItemLocalStorage(item, value) {
        const that = this;
        bodyParsedPayment[item] = value;
        window.localStorage.setItem('transaction', JSON.stringify(bodyParsedPayment));
    }

    



    

    

    

    /* -- REST API -- */

    // Get User 
    function getMe() {
        getValidateIsLogin(null);
        baseGet("security/me", '')
        .done(function(response) {

            me = response.data;
            
            getValidateIsLogin(me);

            /* My Pets */
            if(me.pets.length > 0) {
                if($("#hidden-template").length){
                    var theTemplateScript = $("#hidden-template").html();
                    var theTemplate = Handlebars.compile(theTemplateScript);
                    $(".ms-dogs").html(theTemplate(me));
                }
            }

            if(me.customer){
                if($("#user-template").length){
                    var userTemplate = $("#user-template").html();
                    var userTemplateTpl = Handlebars.compile(userTemplate);
                    $(".user-info-tpl").html(userTemplateTpl(me));
                }
            }
            
        })
        .fail(function(response) {
            $("#success-anonymus").show();
            $("#success-login").hide();
        })
        .always(function() {
            // alert( "finished" );
        });
    }

    // Get Pet
    function setFormPet(petId) {
        if(petId != null){
            baseGet("pets/", petId).done(function(response) {

                // Datos del usuario
                response.data['customerId'] = me.customerId;
                keys = Object.keys(response.data);
                keys.forEach(key => {
                    if(key == 'isAgressive') {
                        var boolean = (response.data[key])? 'true' : 'false';
                        $('input:radio[name="isAgressive"][value="'+ boolean +'"]').prop('checked', true).attr('checked', true);
                    } else {
                        $("#" + key).val(response.data[key]);
                    }
                });
    
                // var response = setValueBoolean(response.data);
                if(response.data.image != ''){
                    document.getElementById("preview").src = response.data.image;
                } else {
                    document.getElementById("preview").src = $("#image-defult").val();
                }
                
            })
            .fail(function(response) {
                //alertError(response);
            })
            .always(function() {
                // alert( "finished" );
            });
        } else {
            $("#customerId").val(me.customerId);   
        }
        
    }

    // Get Customer
    function setFormCustomer(id) {
        if(id != null){
            baseGet("customers/", id).done(function(response) {

                // Datos del usuario
                response.data['active'] = true;
                response.data['userId'] = me.id;
                if(response.data){
                    keys = Object.keys(response.data);
                    keys.forEach(key => {
                        $("#frm-edit-customer").find("#" + key).val(response.data[key]);
                    });
        
                    if(response.data.image != ''){
    
                        $("#frm-edit-customer").find("#preview").attr("src", response.data.image);
                        //document.getElementById("preview").src = response.data.customer.image;
                    } else {
    
                        $("#frm-edit-customer").find("#preview").attr("src", $("#image-defult").val());
                        // document.getElementById("preview").src = $("#image-defult").val();
                    }
                }
                
                
            })
            .fail(function(response) {
                //alertError(response);
            })
            .always(function() {
                // alert( "finished" );
            });
        } else {

            $("#userId").val(me.id);   
            
        }
        
    }
    /* -- REST API -- */

    /* -- Utils -- */
    function getFormData($form){
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};   
        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }

    function getValidateIsLogin(response) {
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

    function disabledButton(element, disabledBoolean) {
        $("#" + element).attr("disabled", disabledBoolean);
        $("#" + element).prop('disabled', disabledBoolean);
    }

    function resetForm(element) {
        $("#" + element).get(0).reset();
    }

    function alertError(response) {
        alert(response.responseJSON.error.message);
    }

    function assignedToken(response) {
        localStorage.setItem('accessToken', response.data.token);
    }

    function setValueBoolean(bodyParsed) {

        bodyParsed.active = (bodyParsed.active === 'true')? true : false;
        return bodyParsed;
    }



    function getLogout() {
        localStorage.removeItem('accessToken');
        localStorage.clear();
        location.href = '';
    }


    
    /* -- Base API -- */

        // Method POST
        function basePost(URL, bodyParsed) {
            var jqxhr = $.ajax({
                method: "POST",
                url: BASE_URL_API + URL,
                data: JSON.stringify(bodyParsed),
                dataType: 'json',
                beforeSend: setHeaderHttp,
            });
            return jqxhr;
        }

        // Method GET
        function baseGet(URL, id) {
            if(id != '' || id != undefined){
                URL = URL + id;
            }
            var jqxhr = $.ajax({
                method: "GET",
                url: BASE_URL_API + URL,
                beforeSend: setHeaderHttp,
            });
            return jqxhr;
        }

        // Method PUT
        function basePut(URL, bodyParsed, id) {
            if(id != '' || id != undefined){
                URL = URL + id;
            }
            var jqxhr = $.ajax({
                method: "PUT",
                url: BASE_URL_API + URL,
                data: JSON.stringify(bodyParsed),
                dataType: 'json',
                beforeSend: setHeaderHttp,
            });
            return jqxhr;
        }

        function setHeaderHttp(request){
            if(localStorage.getItem('accessToken') != undefined){
                request.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('accessToken'));
                return request;
            }
        }


    });
    


}(jQuery));



