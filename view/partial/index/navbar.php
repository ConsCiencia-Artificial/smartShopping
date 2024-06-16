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
                <?php } elseif (!empty($_SESSION['email_loja'])) { ?>
                    <p class="text-light fw-bolder mt-3" style="text-transform: uppercase;"><?php echo $_SESSION['nome_loja']; ?></p>
                    <?php } else {?>
                    <p class="text-light fw-bolder mt-3">PRAIA GRANDE SHOPPING</p>
                <?php } ?>
                <a class="nav-link d-grid gap-2 mt-2 disable" style="color: #fff;">
                    <button type="button" class="btn btn-outline-light disabled">Início</button>
                </a>
                <!-- Verificar se está logado -->
                <?php
                if (!empty($_SESSION['email_usuario']) || !empty($_SESSION['email_loja'])) {
                ?>
                    <a class="nav-link d-grid gap-2 mt-2" href="view/chat.php">
                        <button type="button" class="btn btn-outline-light">Conversas</button>
                    </a>
                    <div class="nav-link d-grid gap-2 mt-2 dropdown">
                        <button class="btn btn-outline-light dropdown-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Postagens
                        </button>
                        <ul class="dropdown-menu center" style="--bs-dropdown-min-width: 100% !important;">
                            <li><a class="dropdown-item" href="view/home.php">Nova Postagem</a></li>
                            <li><a class="dropdown-item" href="view/produto.php">Novo Produto</a></li>
                        </ul>
                    </div>
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
                <p class="center text-light" style="padding-top: 2rem;">© Consciência Artificial, 2024</p>
            </div>
        </div>
    </div>
</nav>