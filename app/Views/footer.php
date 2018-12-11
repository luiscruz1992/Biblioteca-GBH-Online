        <footer><p>© Copyright 2018 Todos los derechos reservados. </p></footer>
        <script type="text/javascript" src="<?= $url ?>js/jquery-3.3.1.min.js"></script>
        <script src="<?= $url ?>js/pdf.js"></script>
        <script src="<?= $url ?>js/pdf.worker.js"></script>
        <script type="text/javascript" src="<?= $url ?>js/gobal.js"></script>
        <?php if ($JSName) { ?>
            <script type="text/javascript" src="<?= $url ?>js/<?= $JSName ?>.js"></script>
        <?php } ?>
    </body>
</html>
