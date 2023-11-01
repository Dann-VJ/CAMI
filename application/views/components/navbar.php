<div class="col-sm-2 col-md-1 col-lg-1 p-0">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="<?= base_url() ?>static/img/uteq.png">
                </span>

                <div class="text logo-text">
                    <span class="name"><strong><?= "Hola ", ucfirst( mb_strtolower ($this->session->userdata("nompersona", "nombre") )) ?></strong></span>
                    <span class="profession" style="width: 200px; white-space: normal;">
                        <!-- ucfirst — Convierte el primer caracter de una cadena a mayúsculas -->
                        <!-- mb_strtolower — Convierte una cadena de caracteres a minúsculas -->
                        <?= ucfirst( mb_strtolower ($this->session->userdata("appaterno", "paterno") )), " ", ucfirst( mb_strtolower ($this->session->userdata("apmaterno", "materno") )) ?>
                    </span>
                </div>
            </div>

            <i class='fas fa-angle-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='fas fa-search icon'></i>
                    <input type="text" placeholder="Buscar...">
                </li>


                <li class="nav-item active">
                    <a href="<?= base_url() ?>welcome/portal" title="Inicio">
                        <i class='fas fa-home icon'></i>
                        <span class="text nav-text">Inicio</span>
                    </a>
                </li>

                <ul class="list-group" id="li-menu"></ul>

            </div>

            <div class="bottom-content">
                <hr>
                <li class="">
                    <a href="<?= base_url() ?>acceso/cierrasesion/<?= $this->session->idusu ?>/<?= $this->session->token ?>">
                        <i class="fas fa-sign-out-alt icon"></i>
                        <span class="text nav-text">Cerrar sesión</span>
                    </a>
                </li>

                <li class="">
                    <!-- <a href="<?= base_url() ?>welcome/administrador" onclick="click_admin"> -->
                    <a href="#" id="mod_admin">
                        <i class="fas fa-user-cog icon"></i>
                        <span class="text nav-text">Administrar</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='fas fa-moon icon moon'></i>
                        <i class='fas fa-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </nav>
</div>


<script>
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })

    searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Light mode";
        } else {
            modeText.innerText = "Dark mode";

        }
    });
</script>