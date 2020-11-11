/* Environment */
var BASE_URL_API = 'http://localhost:8089/api/';
var me = null;

/* Methods */
function basePost(URL, bodyParsed) {
    var jqxhr = $.post(BASE_URL_API + URL, JSON.stringify(bodyParsed)
    ,function(response) {
        console.log(response);
        // alert( "success");
    }, "json")
    return jqxhr;
}

function baseGet(URL, id) {
    if(id != '' || id != undefined){
        URL = URL + id;
    }
    var jqxhr = $.ajax({
        method: "GET",
        url: BASE_URL_API + URL,
        beforeSend: function(request) {
            if(localStorage.getItem('acccessToken') != undefined){
                request.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('acccessToken'));
            }
        },
    });
    return jqxhr;
}

function basePut(URL, bodyParsed, id) {
    if(id != '' || id != undefined){
        URL = URL + id;
    }
    var jqxhr = $.ajax({
        method: "PUT",
        url: BASE_URL_API + URL,
        data: JSON.stringify(bodyParsed),
        dataType: 'json',
        beforeSend: function(request) {
            if(localStorage.getItem('acccessToken') != undefined){
                request.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('acccessToken'));
            }
        },
    });
    return jqxhr;
}


$(function() {
    
    getMe();

    /* 
        Form Login 
        ----------    
        Params Name: username, password
    */
    $("#frm-login").validate({
        beforeSubmit: function(arr, $form, options) {
            disabledButton("btn-login", true);
        },
        submitHandler: function(form) {
            var bodyParsed = getFormData($("#frm-login"));
            
            basePost("security/web/login", bodyParsed)
            .done(function(response) {
                $("#login").html(response.data.token);
                assignedToken(response);
                disabledButton("btn-login", false);
                resetForm("frm-login");
                getMe();
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

    /* 
        Form Register 
        ----------    
        Params Name: username, password
    */
    $("#frm-register").validate({
        beforeSubmit: function(arr, $form, options) {
            disabledButton("btn-register", true);
        },
        submitHandler: function(form) {
            var bodyParsed = getFormData($("#frm-register"));
            disabledButton("btn-register", true);
            basePost("security/web/register", bodyParsed)
            .done(function(response) {
                $("#register").html(response.data.token);
                assignedToken(response);
                disabledButton("btn-register", false);
                resetForm("frm-register");
                getMe();
            })
            .fail(function(response) {
                alertError(response);
                resetForm("frm-login");
                disabledButton("btn-register", false);
            })
            .always(function() {
                // alert( "finished" );
            });
        }
    });

    /*
        Form Edit Pet
        -------------
    */
    
    $("#frm-edit-pet").validate({
        beforeSubmit: function(arr, $form, options) {
            disabledButton("btn-edit-pet", true);
        },
        submitHandler: function(form) {
            var bodyParsed = getFormData($("#frm-edit-pet"));
            disabledButton("btn-edit-pet", true);
            try {

                setValueBoolean(bodyParsed);
                
                basePut("pets/", bodyParsed, bodyParsed.id)
                .done(function(response) {
                    console.log(response);
                    resetForm("frm-edit-pet");
                    disabledButton("btn-edit-pet", false);
                    //getMe();
                })
                .fail(function(response) {
                    alertError(response);
                    resetForm("frm-edit-pet");
                    disabledButton("btn-login", false);
                })
                .always(function() {
                    // alert( "finished" );
                });

            } catch (e) {
                // alert(e);
                console.log(e);
                disabledButton("btn-edit-pet", false);
            }
           
        },
        success: function(label) {
            // disabledButton("btn-edit-pet", !validate.valid());
            //console.log(validate.valid());
            // alert($(label).attr("for") + ' Success');
        },
        // "onfocusout": function(e) { disabledButton("btn-edit-pet", !$(e).valid()); },
        // "onkeyup": function(e) { disabledButton("btn-edit-pet", !$(e).valid()); },
    });

    /* Logout */
    $("#btn-logout").click(function() {
        getLogout();
    });
   
    /* Get Pet */
    $(".btn-get-pet").click(function(){
        getPetId($(this).data("id"));
    });

    document.getElementById("image-control").addEventListener("change", readFile);

    /* REST API */

    /* Security */
    function getMe() {

        $("#btn-logout").hide();

        baseGet("security/me", '').done(function(response) {

            me = response.data;
            $("#me").html('Bienvenido:' + me.username + '<br>' +  me.customer.firstName);

            if(localStorage.getItem('acccessToken') != undefined && localStorage.getItem('acccessToken').value != ''){
                $("#btn-logout").show();
                $("#info-logout").hide();
            } else {
                location.href = '';
                $("#btn-logout").hide();
                $("#info-logout").show();
            }

        })
        .fail(function(response) {
            //alertError(response);
            $("#btn-logout").hide();
        })
        .always(function() {
            // alert( "finished" );
        });
    }

    function getLogout() {
        localStorage.removeItem('acccessToken');
        localStorage.clear();
        location.href = '';
    }

    /* Pet */
    function getPetId(petId) {
        
        baseGet("pets/", petId).done(function(response) {

            // Datos del usuario
            response.data['customerId'] = me.customerId;
            keys = Object.keys(response.data);
            keys.forEach(key => {
                if(key == 'isAgressive') {
                    console.log(response.data[key]);
                    var boolean = (response.data[key])? 'true' : 'false';
                    $('input:radio[name="isAgressive"][value="'+ boolean +'"]').prop('checked', true).attr('checked', true);
                } else {
                    $("#" + key).val(response.data[key]);
                }
            });

            // var response = setValueBoolean(response.data);

            document.getElementById("preview").src = response.data.image;

            // console.log(response.data.isAgressive);
            // $("#isAgressive").attr('checked', 'checked');
            // if(response.data.isAgressive){
            //     $("input[name=isAgressive]").val('true').prop('checked', true);
            // } else {
            //     $("input[name=isAgressive]").val('false').prop('checked', true);
            // }

            //$('input:radio[name="isAgressive"][value="1"]').prop('checked', 'checked').attr('checked', 'checked');
            // $("input[name=isAgressive]").val((response.data.isAgressive)? 'true' : 'false');
            //$("input[name=isAgressive][value='false']").prop('checked', (!response.data.isAgressive)? true : false);
            //$("#isAgressive").prop('checked', (response.data.isAgressive == 0)? 'true' : 'false');
        })
        .fail(function(response) {
            //alertError(response);
            
        })
        .always(function() {
            // alert( "finished" );
        });
    }


    /* Utils */
    function getFormData($form){
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};   
        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }

    function disabledButton(element, disabledBoolean) {
        $("#" + element).attr("disabled", disabledBoolean);
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
        bodyParsed.isAgressive = (bodyParsed.isAgressive === 'true')? true : false;
        return bodyParsed;
    }

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
});




