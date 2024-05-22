<?php
session_start();
include_once '../app/controller/conexao.php';
?>

<div class="row d-flex">
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Últimos comentários</h4>
            </div>

<?php

if(!empty($_POST)){
    $comentario = $_POST["comentario"];
    $comentarista = $_SESSION["comentarista"];
    $foto_comentarista = $_SESSION["imagem"];
    
    $sql = "INSERT INTO comentario (comentario, comentarista, foto_comentarista) VALUES (?, ?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$comentario, $comentarista, $foto_comentarista]);


while ($coment = $stmt->fetch()) {

    if()

?>

if($_POST){
    $descricao = $_POST["descricao"];
    $postador = $_SESSION["nome_usuario"];
    $foto_postador = $_SESSION["imagem"];
    $img_post = $_FILES["img_post"]["name"];

    if(!empty($descricao) && !empty($img_post)){
        try {
            $foto_tmp = $_FILES["img_post"]["tmp_name"];
            $foto_destino = "../assets/uploads/" . basename($img_post);
            
            move_uploaded_file($foto_tmp, $foto_destino);
            $sql = "INSERT INTO post (descricao, postador, foto_postador, img_post) VALUES (?, ?, ?, ?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$descricao, $postador, $foto_postador, $foto_destino]);
        
            
             
            $_SESSION['descricao'] = $descricao;
            $_SESSION['postador'] = $postador;
        
            $conn=null;

          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          } 
          header('Location: home.php');
          exit;                
    }
  
}


            <div class="comment-widgets">
                <!-- Comment Row  acoplamento-->
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2"><img src="https://i.imgur.com/Ur43esv.jpg" alt="user" width="50" class="rounded-circle"></div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Fernando Alves</h6> <span class="m-b-15 d-block">Ainda tem no estoque? </span>
                        <div class="comment-footer">
                            <span class="text-muted float-right">14 de Janeiro</span>
                        </div>
                    </div>
                </div>
            </div>
            <a onclick="vermais()" id="btnVerMais" style="text-align: center;">Carregar mais...</a>
                <!-- Card -->
        </div>
    </div>
</div>
    <!-- FEEDBACK -->


    <div class="col">
        <div class="card-body">
            <input type="text" class="rounded border border-secondary p-1 border-opacity-25" id="comentario" size="20px">
            <button onclick="feedback()" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .35rem; --bs-btn-font-size: .85rem; margin-bottom: 7px;">Enviar</button>
        </div>
    </div>