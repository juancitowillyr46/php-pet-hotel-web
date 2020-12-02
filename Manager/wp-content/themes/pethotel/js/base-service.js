var pathname = window.location.pathname;
var that = this;

(function($) {

    // Validate URls
    if(pathname == '/user-profile/'){
        if(localStorage.getItem('accessToken') == undefined || localStorage.getItem('accessToken') == null){
            location.href = '/';
        }
    }

    /* Integration */
    
    getMe();
    getServices();
    getMethodsPayments();
    getDistricts();
    


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
                window.location.href = '';
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

            bodyParsed.image = $("#frm-edit-pet").find("[name='image']").val();
            
            bodyParsed.active = 'true';

            disabledButton("btn-edit-pet", true);

            if(bodyParsed.id != "") {
                try {

                    bodyParsed = setValueBoolean(bodyParsed);
                    
                    basePut("pets/", bodyParsed, bodyParsed.id)
                    .done(function(response) {
                        console.log(response);
                        resetForm("frm-edit-pet");
                        disabledButton("btn-edit-pet", false);
                        location.href = '';
                    })
                    .fail(function(response) {
                        alertError(response);
                        resetForm("frm-edit-pet");
                        disabledButton("btn-edit-pet", false);
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
                        location.href = '';
                    })
                    .fail(function(response) {
                        alertError(response);
                        resetForm("frm-edit-pet");
                        disabledButton("btn-edit-pet", false);
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
            //bodyParsed.image = $("#frm-edit-customer").find("input[name='image']").attr("src");

            if(bodyParsed.id != "") {
                try {
                    
                    bodyParsed = setValueBoolean(bodyParsed);
                    
                    basePut("customers/", bodyParsed, bodyParsed.id)
                    .done(function(response) {
                        console.log(response);
                        resetForm("frm-edit-customer");
                        disabledButton("btn-edit-customer", false);
                        location.href = '';
                    })
                    .fail(function(response) {
                        alertError(response);
                        resetForm("frm-edit-customer");
                        disabledButton("btn-edit-customer", false);
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
   
    /* -- REST API -- */

    // Get User 
    function getMe() {

        var userTemplateLogin = $("#store-login-tpl").html();
        var userTemplateLoginTpl = Handlebars.compile(userTemplateLogin);

        if(localStorage.getItem('accessToken') != undefined && localStorage.getItem('accessToken') != null) {
            
        } else {

            $(".ms-wrap-login").html('');
            $(".ms-wrap-login").html(userTemplateLoginTpl({
                isLogin: 'false'
            }));

            return true;
        }

        if($(".ms-wrap-login").length > 0) { 

            //$(".ms-wrap-login").html('Cargando...');

            if(localStorage.getItem('userInfo') != undefined && localStorage.getItem('userInfo') != null) {
                
                var customInfo = JSON.parse(localStorage.getItem('userInfo'));

                $(".ms-wrap-login").html('');
                customInfo['isLogin'] = 'true';

                $(".ms-wrap-login").html(userTemplateLoginTpl(customInfo));

                if($("#user-template").length){
                    var userTemplate = $("#user-template").html();
                    var userTemplateTpl = Handlebars.compile(userTemplate);
                    $(".user-info-tpl").html('');
                    $(".user-info-tpl").html(userTemplateTpl(customInfo));
                }

            }
            
            $("#modal-loading").fadeIn();

            baseGet("security/me", '')
            .done(function(response) {
    
                $("#modal-loading").fadeOut();
                me = response.data;
                me['isLogin'] = 'true';
                $(".ms-wrap-login").html('');
                $(".ms-wrap-login").html(userTemplateLoginTpl(me));

                localStorage.setItem('userInfo', JSON.stringify(me));

                var customInfo = JSON.parse(localStorage.getItem('userInfo'));

                if(me.customer && me.customer['firstName'] != '') {
                    getDataCustomer(me);
                    
                    if($("#user-template").length){
                        var userTemplate = $("#user-template").html();
                        var userTemplateTpl = Handlebars.compile(userTemplate);
                        $(".user-info-tpl").html('');
                        $(".user-info-tpl").html(userTemplateTpl(me));
                    }
                }


                /* My Pets */
                if(me.pets.length > 0) {
                    me.pets = me.pets.filter(f => f.active == true);
                    if($("#hidden-template").length){
                        var theTemplateScript = $("#hidden-template").html();
                        var theTemplate = Handlebars.compile(theTemplateScript);
                        $(".ms-dogs").html('');
                        $(".ms-dogs").html(theTemplate(me));
                    }
                }
 
            })
            .fail(function(response) {
                if(response.responseJSON.statusCode == 401) {
                    alertErrorTokenExpired(null, 'Su sesión ha expirado, vuelva a iniciar sesión');
                } else {
                    alertError(response);
                }
            })
            .always(function() {
                
            });
        }
        
    }

    // Get Pet
    function setFormPet(petId) {

        resetForm("frm-edit-pet");
        
        var keys = Object.keys($("#frm-edit-pet").serializeFormJSON());
        keys.forEach(key => {
            if(key == 'gender') { 
                $("[name='" + key + "']").trigger("change");
            }
            $("[name='" + key + "']").val('');
        });

        $("[name='customerId']").val(me.customerId);
        $('[name="isAgressive"][value="7cd24279-5dfa-45ca-8fb5-6a730359721d"]').prop('checked', true).attr('checked', true);
        $("#frm-edit-pet").find("img").attr("src", $("#frm-edit-pet").find("img").attr("data-image-defult"));

        disabledButton('btn-edit-pet', true);
        
        if(petId != null){

            baseGet("pets/", petId).done(function(response) {

                disabledButton('btn-edit-pet', false);

                // Datos del usuario
                response.data['customerId'] = me.customerId;
                keys = Object.keys(response.data);
                keys.forEach(key => {
                    if(key == 'isAgressive') {
                        $("#frm-edit-pet").find('input:radio[name="isAgressive"][value="'+ response.data[key] +'"]').prop('checked', true).attr('checked', true);
                    } else if(key == 'gender') {
                        $("[name='" + key + "']").val(response.data[key]);
                        $("[name='" + key + "']").trigger("change");
                    } else {
                        $("#frm-edit-pet").find("[name='" + key + "']").val(response.data[key]);
                    }
                    $("#frm-edit-pet").find("[name='" + key + "']").prop('disabled', false);
                });
    
                if(response.data.image != ''){
                    document.getElementById("preview").src = response.data.image;
                } else {
                    $("#frm-edit-pet").find("img").attr("src", $("#frm-edit-pet").find("img").attr("data-image-default"));
                }

            })
            .fail(function(response) {
                //alertError(response);
            })
            .always(function() {

            });
        } else {
            disabledButton('btn-edit-pet', false);
        }
        
    }

    // Get Customer
    function setFormCustomer(id) {
        
        

        $("#frm-edit-customer").find("img").attr("src", $("#frm-edit-customer").find("img").attr("data-image-default"));

        getDistricts();

        if(id != null){

            disabledButton('btn-edit-customer', true);

            baseGet("customers/", id).done(function(response) {

                disabledButton('btn-edit-customer', false);

               // Datos del usuario
                response.data['active'] = true;
                response.data['userId'] = me.id;
                if(response.data){
                    keys = Object.keys(response.data);
                    keys.forEach(key => {
                        $("#frm-edit-customer").find("[name='" + key + "']").val(response.data[key]);
                    });
        
                    if(response.data.image != ''){
                        $("#frm-edit-customer").find("img").attr("src", response.data.image);
                    } else {
                        $("#frm-edit-customer").find("img").attr("src", $("#frm-edit-customer").find("img").attr("data-image-default"));
                    }
                }
                
            })
            .fail(function(response) {
                //alertError(response);
            })
            .always(function() {

            });
        } else {

            var userInfo = JSON.parse(localStorage.getItem('userInfo'))
            $("[name='userId']").val(userInfo['id']);   
            
        }
        
    }

    // Get Services
    function getServices() {

        $("#services-errorx").hide();

        if($("#frm-store-services").length > 0) {
            baseGet("services?size=10&page=1&usingPaginate=1", '')
            .done(function(response) {

                response['data']['rows'] = response['data']['rows'].filter(f => f.visibleId == '87083fb2-c8a1-4dcd-833d-8a5a4c0ae45a');
                response['data']['rows'].sort(function(a, b) {
                    var keyA = a.order,
                      keyB = b.order;
                    // Compare the 2 dates
                    if (keyA < keyB) return -1;
                    if (keyA > keyB) return 1;
                    return 0;
                });

                if($(".container-services-add").length > 0){
                    var theTemplateScript = $("#store-service-template").html();
                    var theTemplate = Handlebars.compile(theTemplateScript);
                    $(".container-services-add").html('');
                    $(".container-services-add").html(theTemplate(response['data']));

                    
                    for ( var i = 1; i <= Number(bodyParsedPayment['booking']['numPets']); i++ ) { 
                        if(i == Number(bodyParsedPayment['booking']['numPets'])){
                            $(".cantPet").append('<option value="'+i+'" selected>'+i+'</option>');
                        } else {
                            $(".cantPet").append('<option value="'+i+'" >'+i+'</option>');
                        }
                        
                    }
                    $(".cantPet").prop('disabled', true);

                    getServiceData = response['data']['rows'];
                    if(getServiceData.length > 0) {
                        getItemLocalStorageTransaction();
                    }
                }
            })
            .fail(function(response) {

            })
            .always(function() {

            });
        }
        
    }

    // Get Payments
    function getMethodsPayments() {

        if($("#frm-store-payment").length > 0) { 

            $(".error-size").hide();
            disabledButton('save-step-payment', true);
            

            baseGet("commons/data-master/payment-method", '')
            .done(function(response) {
                disabledButton('save-step-payment', false);
                if($(".container-payment-method-add").length > 0){

                    var theTemplateScript = $("#store-payment-method-template").html();
                    var theTemplate = Handlebars.compile(theTemplateScript);

                    if(window.localStorage.getItem('transaction') != undefined && window.localStorage.getItem('transaction') != null && window.localStorage.getItem('transaction') != '') {
                        var bodyParsedTransaction = JSON.parse(window.localStorage.getItem('transaction'));

                        var selectedServiceTransport = bodyParsedTransaction['order'].find(f => f.serviceId == '7bcf5547-f268-463d-8760-e769d31fd345') !== undefined;
    
                        var paymentMethod = [];

                        if(selectedServiceTransport == true) {
                            paymentMethod = response['data'];
                        } else {

                            // Logic B
                            var existParamServiceId = getValidateUrlServiceId();
                            if(!existParamServiceId) {
                                paymentMethod = response['data'].filter(f => f.value != '176d7072-19f1-11eb-a86b-50e549398ade4');
                            } else {
                                paymentMethod = response['data'];
                            }
                            
                        }
    
                        response['data'] = paymentMethod;    
                    }
                    $(".container-payment-method-add").html('');
                    $(".container-payment-method-add").html(theTemplate(response));  
                    getItemLocalStorageTransaction();    
                }
              
            })
            .fail(function(response) {
    
            })
            .always(function() {
               
                   
                   
                
            });
        }
        
    }

    function getDistricts () {
       // Distritos
        if($("#district-id").length) {
            $("#district-id").prop('disabled', true);
            baseGet("commons/data-master/districts", '').done(function(response) {
                if(response['data']){

                    $("#district-id").prop('disabled', false);

                    response['data'].forEach(element => {
                        $("#district-id").append('<option value='+element['value']+'>'+element['text']+'</option>');
                    });

                    if(pathname == '/step2/') { 
                        if(bodyParsedPayment['customer'] && !$.isEmptyObject(bodyParsedPayment['customer'])) {
                            $("[name='districtId']").val(bodyParsedPayment['customer']['districtId']).prop('selected', true);
                        }
                    }
                }
            })
            .fail(function(response) {
                alertError(response);
            })
            .always(function() {

            });

        }
    }

    
    // Delete
    deletePet = function(petId) {
        baseDelete("pets/", petId).done(function(response) {
            if(response['data']){
                disabledButton("btn-delete-pet", true);
                $(".ms-modal").fadeOut();
                location.href = '';
            }
        })
        .fail(function(response) {
            disabledButton("btn-delete-pet", false);
            alertError(response);
        })
        .always(function() {

        });
    }

    // Send Message
    postContact = function(bodyParsed) {
        basePost("contacts", bodyParsed).done(function(response) {
            if(response['data'] && response['statusCode'] == 200){
                disabledButton("btn-send-mesasge", false);
                alert('¡Muchas Gracias! por contactarte con nosotros en breve nos comunicaremos contigo');
            }
        })
        .fail(function(response) {
            alertError(response);
        })
        .always(function() {

        });
    }

    

}(jQuery));