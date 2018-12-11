/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    $.ajax({
        method: "GET",
        url: url_api + "book"
    }).done(function (resp) {
        var html = "";
        $.each(resp, function (idx, val) {
            var elements = "";
            elements = '<a href="' + url + 'book/' + val.id + '"><img src="' + url + 'img/' + val.img + '"></a>';
            elements += '<div><strong>' + val.name + '</strong></div>';
            elements += '<div><strong>Año: </strong><span>' + val.year + '</span></div>';
            html += '<div class="col-3">' + elements + '</div>';
        });
        $("#lst-books").html(html);
    });

    /**
     * Search by name
     */
    $("#search .input-text").keyup(function () {
        $("#lst-books").html('<p>Buscando.....</p>');
        $.ajax({
            method: "GET",
            url: url_api + "book-search/" + $("#search .input-text").val(),
            dataType: "json"
        }).done(function (resp) {
            var html = "";
            $.each(resp, function (idx, val) {
                var elements = "";
                elements = '<a href="' + url + 'book/' + val.id + '"><img src="' + url + 'img/' + val.img + '"></a>';
                elements += '<div><strong>' + val.name + '</strong></div>';
                elements += '<div><strong>Año: </strong><span>' + val.year + '</span></div>';
                html += '<div class="col-3">' + elements + '</div>';
            });
            $("#lst-books").html(html);
        }).fail(function (xhr) {
            $("#lst-books").html('<p>' + xhr.responseJSON.message + '</p>');
        });
    });

});