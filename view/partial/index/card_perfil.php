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
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="<?php echo $_SESSION['imagem'];  ?>" width="105"  class="img-radius" alt="User-Profile-Image">
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
                                    <button class="btn btn-outline-dark border-dark center"><span class="material-symbols-outlined">edit</span></button>
                                    </div>

                                </div>
                                <h4 class="m-b-20 p-b-5 b-b-default f-w-600">Informações</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="m-b-10 f-w-600">Email</h5>
                                        <h4 class="text-muted f-w-400"><?php echo $_SESSION['email_usuario'];  ?></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="m-b-10 f-w-600">Telefone</h5>
                                        <h4 class="text-muted f-w-400">13 XXXX-XXXXX</h4>
                                    </div>
                                </div>
                                <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Entrega</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="m-b-10 f-w-600">Endereço para entrega</h5>
                                        <h4 class="text-muted f-w-400">Rua. X, nº 0</h4>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>