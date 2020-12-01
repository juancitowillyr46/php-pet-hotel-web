/* Environment */
// var BASE_URL_API = 'http://localhost:8089/api/';
var BASE_URL_API = 'http://api.pethotelshangrila.pe/api/';

(function ($) {

    // Method POST
    basePost = function(URL, bodyParsed) {
        var jqxhr = $.ajax({
            method: "POST",
            url: BASE_URL_API + URL,
            data: JSON.stringify(bodyParsed),
            dataType: 'json',
            beforeSend: setHeaderHttp,
        });
        return jqxhr;
    };

    // Method GET
    baseGet = function(URL, id) {
        if(id != '' || id != undefined){
            URL = URL + id;
        }
        var jqxhr = $.ajax({
            method: "GET",
            url: BASE_URL_API + URL,
            beforeSend: setHeaderHttp,
        });
        return jqxhr;
    };

    // Method PUT
    basePut = function(URL, bodyParsed, id) {
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

    // Method setHeaderHttp
    setHeaderHttp = function(request){
        if(localStorage.getItem('accessToken') != undefined){
            request.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('accessToken'));
            return request;
        }
    }


})(jQuery);
