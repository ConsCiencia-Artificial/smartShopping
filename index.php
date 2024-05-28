<?php
session_start();
include_once 'app/controller/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PG Shopping</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon" />

  <link rel="stylesheet" href="style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Piazzolla:ital,opsz,wght@0,8..30,100..900;1,8..30,100..900&display=swap" rel="stylesheet">
  <?php include 'view/partial/index/index_style.php'; ?>
</head>



<?php


if ($_POST) {
  $descricao = $_POST["descricao"];
  $postador = $_SESSION["nome_usuario"];
  $foto_postador = $_SESSION["imagem"];
  $img_post = $_FILES["img_post"]["name"];

  if (!empty($descricao) && !empty($img_post)) {
    try {
      $foto_tmp = $_FILES["img_post"]["tmp_name"];
      $foto_destino = "assets/uploads/" . basename($img_post);

      move_uploaded_file($foto_tmp, $foto_destino);
      $sql = "INSERT INTO post (descricao, postador, foto_postador, img_post) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$descricao, $postador, $foto_postador, $foto_destino]);




      $conn = null;
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    header('Location: index.php');
    exit;
  }
}
?>
<?php
if ($_POST) {
  $comentario = $_POST['comentario'];
  $comentarista = $_SESSION['nome_usuario'];
  $foto_comentarista = $_SESSION['imagem'];
  $id_post = $_POST['id_post'];


  if (!empty($comentario)) {
    try {





      $sql = "INSERT INTO comentario (comentario, comentarista, foto_comentarista, id_post) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$comentario, $comentarista, $foto_comentarista, $id_post]);


      $_SESSION['comentario'] = $comentario;
      $_SESSION['comentarista'] = $comentarista;
      $_SESSION['foto_comentarista'] = $foto_comentarista;
      $conn = null;
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    header('Location: home.php');
    exit;
  }
}
?>




<body>
  <div class="container-fluid ">
    <div class="row">
      <?php include 'view/partial/index/navbar.php'; ?>


      <main role="main" class="col-md-9 ml-sm-auto px">



        <div class="container-fluid">

          <?php



          $sql = "SELECT * FROM post ORDER BY id_post DESC";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          while ($post = $stmt->fetch()) {


          ?>
            <div class="card mb-4 shadow-lg rounded-top " style="max-width: 720px;">

              <div class="row g-0 rounded-top">
                <div class="d-flex flex-row comment-row m-t-0 align-items-center rounded-top" style="background-color: #dd163b;">
                  <div class="p-2" id="comentarioCliente1">
                    <img src="<?php echo $post['foto_postador']; ?>" alt="Vendedor" width="40" class="rounded-circle">
                  </div>
                  <div class="comment-text w-100 p-2">
                    <h6 class="font-medium text-light"><?php echo $post['postador']; ?></h6>
                  </div>
                </div>
                <div class="col-md-6 post-padd">
                  <img src="<?php echo $post['img_post']; ?>" class="img-fluid rounded-1" alt="...">
                </div>
                <div class="col-md-6">
                  <div class="card-body card-text-color">
                    <!--título-->
                    <div class="col">
                      <!-- comentário -->
                      <div class="d-flex flex-row comment-row m-t-0">
                        <span class="m-b-15 d-block"><?php echo $post['descricao']; ?></span>
                      </div>



                      <div class="row d-flex">
                        <div class="col">
                          <div class="card">
                            <div class="card-body text-center">
                              <h4 class="card-title">Últimos comentários</h4>
                            </div>


                            <?php
                            $id_post = $post['id_post'];
                            $sql_comentarios = "SELECT * FROM comentario WHERE id_post = ? ORDER BY id_comentario DESC LIMIT 2";
                            $stmt_comentarios = $conn->prepare($sql_comentarios);
                            $stmt_comentarios->execute([$id_post]);

                            while ($coment = $stmt_comentarios->fetch()) {
                            ?>

                              <div class="comment-widgets">










                                <!-- Comment Row  acoplamento-->
                                <div class="d-flex flex-row comment-row m-t-0">
                                  <div class="p-2"><img src="<?php echo $coment['foto_comentarista'];
                                                              ?>" alt="user" width="50" class="rounded-circle"></div>
                                  <div class="comment-text w-100">
                                    <h6 class="font-medium"><?php echo $coment['comentarista'];
                                                            ?></h6> <span class="m-b-15 d-block"><?php echo $coment['comentario'];
                                                                                                  ?></span>
                                    <div class="comment-footer">
                                      <span class="text-muted float-right">14 de Janeiro</span>

                                    </div>











                                  </div>

                                </div>

                              </div>


                              <!-- Card -->

                          </div>
                        <?php }  ?>
                        </div>

                      </div>
                      <!-- FEEDBACK -->


























                    </div>
                  </div>
                  <div class="col">



                    <div class="card-body" style="text-align: end; margin-right: 50px;">

                      <form action="" method="POST">

                        <input type="hidden" name="id_post" value="<?php echo $post['id_post']; ?>">
                        <input type="text" class="rounded border border-secondary p-1 border-opacity-25" id="comentario" name="comentario" size="20px">
                        <button onclick="feedback()" type="submit" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .35rem; --bs-btn-font-size: .85rem; margin-bottom: 7px;">Enviar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>

        </div>
      <?php }  ?>



      </main>


    </div>
  </div>
</body>
<script src="../script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>