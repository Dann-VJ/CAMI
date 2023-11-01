<!DOCTYPE html>
<html>

<head>
    <title>UTEQ</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>static/img/uteq.png">
    <link rel="stylesheet" href="<?= base_url() ?>static/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/mensajes.css">
    <link rel="stylesheet" href="<?= base_url() ?>static/css/estilos.css">
    <link rel="stylesheet" href="<?= base_url() ?>static/css/card.css">
    <link rel="stylesheet" href="<?= base_url() ?>static/css/table.css">

    <script src="<?= base_url() ?>static/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>static/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>static/js/mensajes.js"></script>

    <script src="<?= base_url() ?>static/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>static/js/App.js"></script>
    <script>
        var appData = {
            // Base url inicio sesión
            base_url: '<?= base_url() ?>',
            usuario:  "<?= $this->session->userdata("matricula") ?>",
            nombre: "<?= $this->session->userdata("nombre") ?>"
        }
    </script>

</head>

<body>


    <!-- <section class="home">
        <div class="text">
            <h3 class="text-color" id="titulo">Hola</h3>
        </div>
    </section> -->

    <div class="container p-0">
        <div class="row">
            <!-- BARRA DE NAVEGACIÓN -->
            <?php require("components/navbar.php") ?>

            <!-- CARGANDO CUANDO SE UTILIZA EL WS -->
            <div id="cargando">
                <h1>
                    <i class="fas fa-spinner fa-pulse fa-3x"></i>
                    Cargando...
                </h1>
            </div>

            <!-- LISTA DE LOS MÓDULO Y PROCESOS -->
            <div class="row row-modulo col-sm-10 col-md-11 col-lg-11 pt-5" id="lista-modulos"></div>

            <!-- DATOS DE LOS PROCESOS -->
            <div class="col-sm-10 col-md-11 col-lg-11 pt-5 table-datos">
                <div class="table-wrapper">
                    <table class="table" id="tabla-datos"></table>
                </div>
            </div>

            <!-- MENSAJES -->
            <div id="mensaje" class="mx-auto" style="width:30rem;"></div>
        </div>

    </div>
</body>
</html>