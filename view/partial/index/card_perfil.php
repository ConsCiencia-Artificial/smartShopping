<?php
include_once '../app/controller/conexao.php';
if (!$_SESSION['email_usuario']) {
  header("Location:../view/login.php");
  exit;
}
$cod = $_SESSION['email_usuario'];

// Use placeholders na sua consulta SQL
$sql_usuario = "SELECT * FROM tb_cadastro_usuario WHERE email_usuario = :email_usuario";
$select = $conn->prepare($sql_usuario);

// Passe os valores como um array no método execute()
$select->execute([':email_usuario' => $cod]);

$row = $select->fetch();
?>
<form class="d-flex justify-content-between" enctype="multipart/form-data" method="POST">
  <div class="page-content page-container" id="page-content">
    <div class="padding">
      <div class="row container d-flex justify-content-center">
        <div class="col-xl-6 col-md-12">
          <div class="card user-card-full">
            <div class="row m-l-0 m-r-0">
              <div class="col-sm-4 container bg-c-lite-green user-profile d-flex align-content-center flex-wrap center">
                <div class="row align-items-end card-block text-center text-white">
                  <div class="m-b-25">
                    <?php if (!empty($_SESSION['imagem'])) { ?>
                      <img src="<?php echo '../' . $_SESSION['imagem']; ?>" width="128" class="img-radius" alt="User-Profile-Image">
                    <?php } else { ?>
                      <label for="img_post">
                        <img class="center rounded" src="../assets/img/default-icon.jpg" width="128" class="img-radius" alt="User-Profile-Image">
                        <!-- <input id="img_post" type="file" name="img_post" accept="image/*" disabled /> -->
                      </label>
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
                      <button class="btn btn-outline-dark border-dark center" id="editar">
                        Editar
                        <span class="material-symbols-outlined">edit</span>
                      </button>
                    </div>
                    <h4 class="m-b-20 p-b-5 b-b-default f-w-600">Informações</h4>
                    <div class="row">
                      <div class="col-sm-6">
                        <h5 class="m-b-10 f-w-600">Telefone</h5>
                        <input type="number" id="tel_usuario" <?php if (isset($tel_usuario)) { ?> value="<?php echo $_SESSION['tel_usuario']; ?>" <?php } else { ?> placeholder="DDD+Número" disabled <?php } ?>>
                      </div>
                      <div class="col-sm-6">
                        <h5 class="m-b-10 f-w-600">CPF</h5>
                        <input type="number" id="cpf_usuario" nome="cpf_usuario" <?php if (isset($_SESSION['cpf_usuario'])) { ?> value="<?php echo $_SESSION['cpf_usuario']; ?>" <?php } else { ?> placeholder="Não cadastrado" disabled <?php } ?>>
                      </div>
                    </div>
                    <div class="row">
                      <h5 class="m-b-10 f-w-600">Email</h5>
                      <h4 class="text-muted f-w-400"><?php echo $_SESSION['email_usuario'];  ?></h4>
                    </div>
                    <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Entrega</h4>
                    <div class="row">
                      <div class="col-sm-6">
                        <input type="number" id="end_usuario" <?php if (isset($end_usuario)) { ?> value="<?php echo $_SESSION['end_usuario']; ?>" <?php } else { ?> placeholder="Informe seu CEP" disabled <?php } ?>>
                      </div>
                      <div class="col-sm-6">

                      </div>
                    </div>
                    <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Pagamento</h4>
                    <div class="row">
                      <div class="col-sm">
                        <input type="text" id="pagamento" disabled <?php if (isset($pagamenteo)) { ?> value="<?php echo $_SESSION['pagamento']; ?>" <?php } else { ?> placeholder="Não cadastrado" disabled <?php } ?>>
                      </div>
                    </div>
                    <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Foto de Perfil</h4>
                    <div class="row">
                      <div class="col-sm-12">
                        <label for="img_post" class="custom-file-upload center">
                          <span class="material-symbols-outlined">
                            add_photo_alternate
                          </span>
                          <span>Adicionar nova foto de perfil</span>
                          <input id="img_post" type="file" name="img_post" accept="image/*" style="display: none;" disabled>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm mt-4">
                    <button type="submit" class="btn btn-danger">Salvar alterações</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
<script>
  document.getElementById('editar').addEventListener('click', function(event) {
    event.preventDefault(); // Previne o comportamento padrão do botão
    var cpfInput = document.getElementById('cpf_usuario');
    if (cpfInput.disabled) {
      cpfInput.disabled = false;
      cpfInput.focus();
    } else {
      cpfInput.disabled = true;
    }
    event.preventDefault(); // Previne o comportamento padrão do botão
    var telInput = document.getElementById('tel_usuario');
    if (telInput.disabled) {
      telInput.disabled = false;
      telInput.focus();
    } else {
      telInput.disabled = true;
    }
    event.preventDefault(); // Previne o comportamento padrão do botão
    var endInput = document.getElementById('end_usuario');
    if (endInput.disabled) {
      endInput.disabled = false;
      endInput.focus();
    } else {
      endInput.disabled = true;
    }
    event.preventDefault(); // Previne o comportamento padrão do botão
    var pagInput = document.getElementById('pagamento');
    if (pagInput.disabled) {
      pagInput.disabled = false;
      pagInput.focus();
    } else {
      pagInput.disabled = true;
    }
    event.preventDefault(); // Previne o comportamento padrão do botão
    var imgInput = document.getElementById('img_post');
    if (imgInput.disabled) {
      imgInput.disabled = false;
      imgInput.focus();
    } else {
      imgInput.disabled = true;
    }
  });
</script>

<!-- Thiago -->
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const checkbox = document.querySelector('#editar');
    const inputs = document.querySelectorAll('input');
    const cpf_usuario = document.querySelector('#cpf_usuario');

    checkbox.addEventListener('change', (event) => {
      inputs.forEach(input => {
        input.disabled = !checkbox.checked;
        if (cpf_usuario.value.trim() === '') {
          cpf_usuario.disabled = !checkbox.checked;
        }
      });
    });
  });
</script>


<?php


if ($_POST) {
    $tel_usuario = $_POST["tel_usuario"];
    $cpf_usuario = $_POST["cpf_usuario"];
    $cep_usuario = $_POST["cep_usuario"];
    $pagamento = $_POST["pagamento"];
    $imagem = $_FILES["imagem"]["name"];

    if (!empty($tel_usuario) && !empty($imagem)) {
        try {
            $foto_tmp = $_FILES["imagem"]["tmp_name"];
            $foto_destino = "../assets/img/" . basename($imagem);
            $foto_caminho = "assets/img/" . basename($imagem);

            move_uploaded_file($foto_tmp, $foto_destino);
            $sql = " UPDATE tb_cadastro_usuario (tel_usuario, cpf_usuario, cep_usuario, imagem) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$tel_usuario, $cpf_usuario, $cep_usuario, $foto_caminho]);

            $_SESSION['imagem'] = $imagem;

            $conn = null;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        header('Location: home.php');
        exit;
    }
}
?>