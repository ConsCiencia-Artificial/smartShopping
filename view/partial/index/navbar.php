<nav class="col-md-2 d-none d-md-block sidebar" style="background-color: #dd163b;">
    <div class="sidebar-sticky">
        <div class="row">
            <div class="col-sm center">
                <!-- NAVBAR -->
                <img src="assets/img/logo.png" alt="logo" width="105" class="img-fluid margin-top-comm">

                <?php
                if (!empty($_SESSION['email_usuario'])) {
                ?>
                    <p class="text-light fw-bolder mt-3" style="text-transform: uppercase;"><?php echo $_SESSION['nome_usuario']; ?></p>
                <?php } else { ?>
                    <p class="text-light fw-bolder mt-3">PRAIA GRANDE SHOPPING</p>
                <?php } ?>
                <a class="nav-link d-grid gap-2 mt-2 disable" style="color: #fff;">
                    <button type="button" class="btn btn-outline-light disabled">Início</button>
                </a>
                <!-- Verificar se está logado -->
                <?php
                if (!empty($_SESSION['email_usuario'])) {
                ?>
                    <a class="nav-link d-grid gap-2 mt-2" href="view/chat.php">
                        <button type="button" class="btn btn-outline-light">Conversas</button>
                    </a>
                    <a class="nav-link d-grid gap-2 mt-2" href="view/home.php">
                        <button type="button" class="btn btn-outline-light">Publicar</button>
                    </a>
                    <a class="nav-link d-grid gap-2 mt-2" href="view/perfil.php">
                        <button type="button" class="btn btn-outline-light">Perfil</button>
                    </a>
                    <a class="nav-link d-grid gap-2 mt-2" href="app/controller/sair.php">
                        <button type="submit" class="btn btn-outline-light">Sair</button>
                    </a>
                <?php } else { ?>
                    <a class="nav-link d-grid gap-2 mt-2" href="view/login.php">
                        <button type="button" class="btn btn-outline-light">Entrar</button>
                    </a>
                <?php } ?>
                <p class="center text-light" style="padding-top: 2rem;">© Consciência Articifial, 2024</p>
            </div>
        </div>
    </div>
</nav>