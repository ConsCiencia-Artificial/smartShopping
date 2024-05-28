<?php
session_start();
include_once '../app/controller/conexao.php';
?>

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 container bg-c-lite-green user-profile d-flex align-content-center flex-wrap center">
                            <div class="row align-items-end card-block text-center text-white">
                                <div class="m-b-25">
                                    <?php
                                    if (!empty($_SESSION['imagem'])) {
                                    ?>
                                        <img src="<?php echo $_SESSION['imagem'];  ?>" width="128" class="img-radius" alt="User-Profile-Image">
                                    <?php } else { ?>
                                        <img src="../assets/img/default-icon.jpg" width="128" class="img-radius" alt="User-Profile-Image">
                                    <?php } ?>
                                </div>
                                <h1 class="f-w-600"><?php echo $_SESSION['nome_usuario'];  ?></h1>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block position-relative">
                                <div class="row">
                                    <div class="col-10">
                                        <h3>Configurações</h3>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-outline-dark border-dark center" ><span class="material-symbols-outlined" onclick="edicao()">edit</span></button>
                                    </div>
                                </div>
                                <h4 class="m-b-20 p-b-5 b-b-default f-w-600">Informações</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                    
                                        <h5 class="m-b-10 f-w-600">Telefone</h5>
                                        <input type="text" id="tel_usuario"  <?php if(isset($tel_usuario)){ ?> value="<?php  echo $_SESSION['tel_usuario'];} else{ ?>" value="Não cadastrado" disabled > <?php }; ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="m-b-10 f-w-600">CPF</h5>
                                        <h4 class="text-muted f-w-400">Não cadastrado</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5 class="m-b-10 f-w-600">Email</h5>
                                    <h4 class="text-muted f-w-400"><?php echo $_SESSION['email_usuario'];  ?></h4>
                                </div>
                                <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Entrega</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" id="end_usuario" <?php if(isset($end_usuario)){ ?> value="<?php  echo $_SESSION['end_usuario'];} else{ ?>" value="Não cadastrado" disabled > <?php }; ?>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Pagamento</h4>
                                <div class="row">
                                    <div class="col-sm">
                                        <input type="text" id="pagamento" disabled <?php if(isset($pagamenteo)){ ?> value="<?php  echo $_SESSION['pagamento'];} else{ ?>" value="Não cadastrado" > <?php }; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="edit.js"></script>