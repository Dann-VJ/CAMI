<!DOCTYPE html>
<html lang="en">

<head>
    <title>UTEQ</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>static/img/favicon.ico"/>
    <link rel="stylesheet" href="<?= base_url() ?>static/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/css/mensajes.css"/>
    <link rel="stylesheet" href="<?= base_url() ?>static/css/login.css"/>

    <script src="<?= base_url() ?>static/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>static/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>static/js/mensajes.js"></script>
    <script src="<?= base_url() ?>static/js/login.js"></script>
    <script src="<?= base_url() ?>static/js/md5.js"></script>
    <script src="<?= base_url() ?>static/js/2.5.3-crypto-sha1.js"></script>
    
    <script>
        var appData = {
            base_url : "<?= base_url() ?>",
            url_lizard : "http://lizard.uteq.edu.mx/",
            url_cidtai : "<?= base_url() ?>../web_service/"
        };
    </script>

    <script>
        function mostrarContrasena() {
            var tipo = document.getElementById("password");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
    </script>
</head>

<body>
    <div class="login-box card ">
        <div class="logo-image">
            <!-- <img src="<?= base_url() ?>/static/img/uteq.png" width="130"> -->
            <img id="logo" width="130"/>
        </div>
        <!-- <h2>UTEQ</h2>
        <p class="subhead">PLATAFORMA WEB PARA SEGUIMIENTO A VARIABLES AMBIENTALES</p> -->
        <form>
            <div class="user-box" id="group-matricula">
                <input type="text" name="matricula" id="matricula" required="" minlength="1" maxlength="10" autocomplete="off">
                <label><strong>Usuario/Matrícula:</strong></label>
            </div>
            <div class="user-box" id="group-contrasena">
                <input type="password" name="contrasena" id="contrasena" required="" minlength="1" maxlength="20" autocomplete="new-password">
                <label><strong>Contraseña/Código:</strong></label>
            </div>
            <div class="user-box" id="group-curp" hidden>
                <input type="text" name="curp" id="curp" required="" minlength="1" maxlength="18" autocomplete="off">
                <label><strong>CURP:</strong></label>
            </div>

            <div class="d-grid gap-2">
                <button class="btn button-form" type="button" id="btn-entrar">
                    Iniciar sesión
                    <i class="fas fa-sign-in-alt"></i>
                </button>
            </div>

        </form>
    </div>

    <div id="mensaje" class="mx-auto alert-mensaje">
        <?php
        if ( $this->session->flashdata( "mensaje" ) != NULL ) :
            alerta( $this->session->flashdata( "tipo" ), $this->session->flashdata( "mensaje" ) );
        endif;
        ?>
    </div> 

</body>

</html>