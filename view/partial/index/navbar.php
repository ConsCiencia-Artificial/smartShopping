<nav class="col-md-2 d-none d-md-block sidebar" style="background-color: #dd163b;">
    <div class="sidebar-sticky">
        <div class="row">
            <div class="col-sm center">
                <!-- NAVBAR -->
                <img src="assets/img/logo.png" alt="logo" width="105" class="img-fluid margin-top-comm">
                <p class="text-light fw-bolder mt-3">PRAIA GRANDE SHOPPING</p>


                <a class="nav-link d-grid gap-2 mt-2" href="#">
                    <button type="button" class="btn btn-outline-light">Pesquisar</button>
                </a>
                <a class="nav-link d-grid gap-2 mt-2" href="#">
                    <button type="button" class="btn btn-outline-light">Sobre</button>
                </a>
                <a class="nav-link d-grid gap-2 mt-2" href="#">
                    <button type="button" class="btn btn-outline-light">Contatos</button>
                </a>

                <!-- Verificar se está logado -->
                <?php
                // var_dump($_SESSION); die;
                if (!empty($_SESSION['email_usuario'])) {
                ?>
                    <a class="nav-link d-grid gap-2 mt-2" href="view/home.php">
                        <button type="button" class="btn btn-outline-light">Publicar</button>
                    </a>
                    <a class="nav-link d-grid gap-2 mt-2" href="perfil.php">
                        <button type="button" class="btn btn-outline-light">Perfil</button>
                    </a>
                    <a class="nav-link d-grid gap-2 mt-2" href="/..app/controller/sair.php">
                        <button type="submit" class="btn btn-outline-light">Sair</button>
                    </a>
                <?php } else { ?>
                    <a class="nav-link d-grid gap-2 mt-2" href="view/login.php">
                        <button type="button" class="btn btn-outline-light">Entrar</button>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>