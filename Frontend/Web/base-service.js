(function($) {

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

    
    getServices();
    getMethodsPayments();

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
            bodyParsed.image = $("#frm-edit-customer").find("img").attr("src");

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
        // console.log($(this).data("customer-id"));
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

        $("#success-anonymus").show();
        $("#success-login").hide();


        console.log($("#success-login").is( ":hidden" ));
        
        getValidateIsLogin(null);

        if($("#success-login").is( ":hidden" ) != true) { 
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
                        //var boolean = (response.data[key])? 'true' : 'false';
                        $("#frm-edit-pet").find('input:radio[name="isAgressive"][value="'+ response.data[key] +'"]').prop('checked', true).attr('checked', true);
                        // $('input:radio[name="isAgressive"][value="'+ boolean +'"]').prop('checked', true).attr('checked', true);
                    } else {
                        $("#frm-edit-pet").find("[name='" + key + "']").val(response.data[key]);
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

            var keys = $("#frm-edit-customer").serializeFormJSON();
            keys.forEach(key => {
                $("#frm-edit-customer").find("[name='" + key + "']").prop('disabled', true).attr('disabled', 'disabled');
            });

            baseGet("customers/", id).done(function(response) {

                // Datos del usuario
                response.data['active'] = true;
                response.data['userId'] = me.id;
                if(response.data){
                    keys = Object.keys(response.data);
                    keys.forEach(key => {
                        $("#frm-edit-customer").find("[name='" + key + "']").val(response.data[key]);
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
                // var keys = $("#frm-edit-customer").serializeFormJSON();
                // keys.forEach(key => {
                //     $("#frm-edit-customer").find("[name='" + key + "']").prop('disabled', false).attr('disabled', '');
                // });
            });
        } else {

            $("#userId").val(me.id);   
            
        }
        
    }

    // Get Services
    function getServices() {

        $("#services-errorx").hide();

        if($("#frm-store-services").length > 0) {
            baseGet("services?size=10&page=1&usingPaginate=1", '')
            .done(function(response) {
                if($(".container-services-add").length > 0){
                    var theTemplateScript = $("#store-service-template").html();
                    var theTemplate = Handlebars.compile(theTemplateScript);
                    $(".container-services-add").html(theTemplate(response['data']));
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

        $(".type-method-error").hide();
        
        if($("#frm-store-payment").length > 0) { 
            baseGet("commons/data-master/payment-method", '')
            .done(function(response) {
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
                            paymentMethod = response['data'].filter(f => f.value != '176d7072-19f1-11eb-a86b-50e549398ade4');
                        }
    
                        response['data'] = paymentMethod;    
                    }
                    
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
}(jQuery));