/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    var __PDF_DOC,
            __CURRENT_PAGE,
            __TOTAL_PAGES,
            __PAGE_RENDERING_IN_PROGRESS = 0,
            __CANVAS = $('#pdf-canvas').get(0),
            __CANVAS_CTX = __CANVAS.getContext('2d');

    /**
     * Get book by id
     */
    $.ajax({
        method: "GET",
        url: url_api + "book/" + $("#book-info").data("bid")
    }).done(function (resp) {
        console.log(resp);
        $("#book-img").attr("src", url + 'img/' + resp.img);
        $("#book-name").html(resp.name);
        $("#book-year").html(resp.year);
        $("#book-description").html(resp.description);
        showPDF(url + "books/" + resp.file);
    });

    /**
     * Read PDF
     * @param {type} pdf_url
     * @return {undefined}
     */
    showPDF = function (pdf_url) {
        $("#pdf-loader").show();

        PDFJS.getDocument({url: pdf_url}).then(function (pdf_doc) {
            __PDF_DOC = pdf_doc;
            __TOTAL_PAGES = __PDF_DOC.numPages;

            // Hide the pdf loader and show pdf container in HTML
            $("#pdf-loader").hide();
            $("#pdf-contents").show();
            $("#pdf-total-pages").text(__TOTAL_PAGES);

            // Show the first page
            showPage(1);
        }).catch(function (error) {
            // If error re-show the upload button
            $("#pdf-loader").hide();
            $("#upload-button").show();

            alert(error.message);
        });
        ;
    };

    /**
     * Show page
     * @param {type} page_no
     * @return {undefined}
     */
    showPage = function (page_no) {
        __PAGE_RENDERING_IN_PROGRESS = 1;
        __CURRENT_PAGE = page_no;

        // Disable Prev & Next buttons while page is being loaded
        $("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

        // While page is being rendered hide the canvas and show a loading message
        $("#pdf-canvas").hide();
        $("#page-loader").show();

        // Update current page in HTML
        $("#pdf-current-page").text(page_no);

        // Fetch the page
        __PDF_DOC.getPage(page_no).then(function (page) {
            // As the canvas is of a fixed width we need to set the scale of the viewport accordingly
            var scale_required = __CANVAS.width / page.getViewport(1).width;

            // Get viewport of the page at required scale
            var viewport = page.getViewport(scale_required);

            // Set canvas height
            __CANVAS.height = viewport.height;

            var renderContext = {
                canvasContext: __CANVAS_CTX,
                viewport: viewport
            };

            // Render the page contents in the canvas
            page.render(renderContext).then(function () {
                __PAGE_RENDERING_IN_PROGRESS = 0;

                // Re-enable Prev & Next buttons
                $("#pdf-next, #pdf-prev").removeAttr('disabled');

                // Show the canvas and hide the page loader
                $("#pdf-canvas").show();
                $("#page-loader").hide();
            });
        });
    };

    // Previous page of the PDF
    $("#pdf-prev").on('click', function () {
        if (__CURRENT_PAGE != 1)
            showPage(--__CURRENT_PAGE);
    });

    // Next page of the PDF
    $("#pdf-next").on('click', function () {
        if (__CURRENT_PAGE != __TOTAL_PAGES)
            showPage(++__CURRENT_PAGE);
    });
});