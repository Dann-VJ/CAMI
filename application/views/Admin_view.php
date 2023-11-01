<!DOCTYPE html>
<html>

<head>
    <title>UTEQ</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>static/images/favicon.ico">
    <link rel="stylesheet" href="<?= base_url() ?>static/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/mensajes.css">
    <link rel="stylesheet" href="<?= base_url() ?>static/css/estilos.css">
    <link rel="stylesheet" href="<?= base_url() ?>static/css/card.css">
    <link rel="stylesheet" href="<?= base_url() ?>static/css/table.css">

    <script src="<?= base_url() ?>static/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>static/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>static/js/mensajes.js"></script>
    <script src="<?= base_url() ?>static/js/Formulario.js"></script>
    <script src="<?= base_url() ?>static/js/App.js"></script>
    <script>
        var appData = {
            base_url: '<?= base_url() ?>'
        }
    </script>

</head>

<body>
    

    <div id="cargando">
        <h1>
            <i class="fas fa-spinner fa-pulse 3x"></i>
            Cargando...
        </h1>
    </div>

    <div class="container">
        <br></br>
        <div class="bar">
            <?php require("components/navbar.php") ?>
        </div>
      
        
        <!-- <a class="text-center" id="btn-agrega-modulo" data-bs-toggle="modal" data-bs-target="#modal-editar">
            <div class="card" style="display: inline-block">
                <div class="container">
                    <h4><b>Agregar Proceso</b></h4>
                    <p><i class="fas fa-plus"></i></p>
                </div>
            </div>
        </a>

        <a href="#" class="data-card" id="btn-agrega-modulo" data-bs-toggle="modal" data-bs-target="#modal-editar">
            <h5 class="text-center text-h5">Agregar Módulo</h5>
            <h6 class="text-center text-h5"><i class="fas fa-plus-circle x2"></i></h6>
        </a>

        <br></br> -->

        <div class="tabla">
            <div class="table-wrapper">
                <table class="table table-borderd table-hover" id="tabla-modulos">
                    <thead>
                        <tr class="table-dark text-white text-center">
                            <th>Módulo</th>
                            <th>Proceso</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
       

        <!-- MENSAJES -->
        <div id="mensaje" class="mx-auto" style="width:30rem;"></div>
    </div>

    <!-- Modal editar/agregar -->
    <div class="modal fade" id="modal-editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="" id="modal-title">

                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-editar-body">

                    <input type="hidden" id="idmod">
                    <input type="hidden" id="accion">
                    <!--MÓDULO-->
                    <div class="form-group" id="group-modulo">
                        <label for="modulo"><strong>Módulo:</strong></label>
                        <input class="form-control" id="modulo" type="text" autocomplete="off" />
                    </div>
                    <div class="form-group" id="group-icon">
                        <label for="idcon"><strong>Icon:</strong></label>
                        <input class="form-control" id="icon" type="text" autocomplete="off" />
                    </div>
                    <!--PROCESO-->
                    <div class="form-group" id="group-proceso">
                        <label for="proceso"><strong>Proceso:</strong></label>
                        <input class="form-control" id="proceso" type="text" />
                    </div>

                    <div class="form-group" id="group-valor1">
                        <label for="valor1"><strong>Valor 1:</strong></label>
                        <input class="form-control" id="valor1" type="number" />
                    </div>
                    <div class="form-group" id="group-valor2">
                        <label for="valor2"><strong>Valor 2:</strong></label>
                        <input class="form-control" id="valor2" type="number"/>
                    </div>
                    <div class="form-group" id="group-valor3">
                        <label for="valor3"><strong>Valor 3:</strong></label>
                        <input class="form-control" id="valor3" type="number"/>
                    </div>
                </div>
                <div class="modal-footer d-felx justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-ban"></i>
                        Cerrar
                    </button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btn-guardar">
                        <i class="fas fa-save"></i>
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL BORRAR -->
    <div class="modal fade" id="modal-borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modal-borrar-title">
                        Borrar módulo
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-editar-body">
                    <h7>¿Realmente quieres borrar el módulo de <span id="modal-borrar-modulo"></span>? </h7>
                    <b><p class="text-center">Se perderan todos los registros<p></b>
                </div>
                <div class="modal-footer d-felx justify-content-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="fas fa-ban"></i>
                        Cerrar
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" id="btn-borrar-confirmar">
                        <i class="fas fa-trash"></i>
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>