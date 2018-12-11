<div class="container" id="book-info" data-bid="<?= $id ?>">
    <a style="float: left;" href="/" class="back"><i class="fas fa-arrow-left"></i>&nbsp;Atras</a>
    <h2 id="book-name"></h2>
    <div class="row">
        <div class="col-4">
            <img src="" id="book-img">
            <div><strong>Año: </strong><span id="book-year"></span></div>
            <div>
                <strong style="display: block; text-align: left;">Descripcion: </strong>
                <p id="book-description"></p>
            </div>
        </div>
        <div class="col-8">

            <div id="pdf-main-container">
                <div id="pdf-loader">Cargando documento...</div>
                <div id="pdf-contents">
                    <div id="pdf-meta">
                        <div id="pdf-buttons">
                            <button id="pdf-prev"><i class="fas fa-angle-double-left"></i>&nbsp;Anterior</button>
                            <div id="page-count-container">P&aacute;gina <div id="pdf-current-page"></div> de <div id="pdf-total-pages"></div></div>
                            <button id="pdf-next">Siguiente&nbsp;<i class="fas fa-angle-double-right"></i></button>
                        </div>
                    </div>
                    <canvas id="pdf-canvas" width="500"></canvas>
                    <div id="page-loader">Cargando p&aacute;gina ...</div>
                </div>
            </div>

        </div>
    </div>
</div>