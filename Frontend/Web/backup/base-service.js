(function($) {

    /* Environment */
    var BASE_URL_API = 'http://api.pethotelshangrila.pe/api/';
    var me = null;
    var pathname = window.location.pathname;
    var that = this;

    // Validate URls
    if(pathname == '/user-profile/'){
        if(localStorage.getItem('acccessToken') == undefined || localStorage.getItem('acccessToken') == null){
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
        if($(this).data("pet-id") != undefined){
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

            if(bodyParsed.id != "") {
                try {

                    bodyParsed.image = $("#frm-edit-customer").find("#preview").attr("src");
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
               
            }
           
        }
    });
    
    $(document).on('click','#btn-edit-customer', function() {
        $("#frm-edit-customer").submit();
    });


    
    $(document).on('click','.btn-get-customer',function(){
        if($(this).data("customer-id") != undefined){
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
            $("#customerId").val(me.customerId);   
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
        if(localStorage.getItem('acccessToken') != undefined && localStorage.getItem('acccessToken').value != ''){
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
        localStorage.setItem('acccessToken', response.data.token);
    }

    function setValueBoolean(bodyParsed) {

        bodyParsed.active = (bodyParsed.active === 'true')? true : false;
        return bodyParsed;
    }

    // if($(".image-control").length){
    //     document.getElementById("image-control").addEventListener("change", readFile);
    // }
    function readFile() {
        if (this.files && this.files[0]) {  
          var FR = new FileReader();
          FR.addEventListener("load", function(e) {
            document.getElementById("preview").src = e.target.result;
            $("#image").val(e.target.result);
          }); 
          FR.readAsDataURL( this.files[0] );
        }
    }

    function getLogout() {
        localStorage.removeItem('acccessToken');
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
        if(localStorage.getItem('acccessToken') != undefined){
            request.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('acccessToken'));
            return request;
        }
    }



}(jQuery));





