<?php
include_once '../app/controller/conexao.php';
if (!$_SESSION['email_loja']) {
    header("Location:../view/login_empresa.php");
    exit;
}
$cod = $_SESSION['email_loja'];

// Use placeholders na sua consulta SQL
$sql_loja = "SELECT * FROM tb_cadastro_loja WHERE email_loja = :email_loja";
$select = $conn->prepare($sql_loja);

// Passe os valores como um array no método execute()
$select->execute([':email_loja' => $cod]);

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
          <?php
          if (!empty($_SESSION['img_loja'])) {
          ?>
           <img src="<?php echo '../' . $_SESSION['img_loja'];  ?>" width="128" class="img-radius" alt="User-Profile-Image">
          <?php } else { ?><label for="img_post" class="custom-file-upload">
           <img class="center rounded" src="../assets/img/default-icon.jpg" width="128" class="img-radius" alt="User-Profile-Image">
           <input id="img_post" type="file" name="img_post" accept="image/*" disabled />
         </label>
          <?php } ?>
         </div>


         


         <h1 class="f-w-600"><?php echo $_SESSION['nome_loja'];  ?></h1>
        </div>
       </div>
       <div class="col-sm-8">
        <div class="card-block position-relative">
         <div class="row">
          <div class="col-10">
           <h3>Configurações</h3>
          </div>
          <div class="col-2">
           <!-- <button class="btn  btn-outline-dark border-dark center" type="checkbox" name="ed">
           Editar
           <span class="material-symbols-outlined">edit</span>
          </button>
         </div>
         !-->
           <div>
            <input class="form-check-input" type="checkbox" name="editar" id="editar">
           </div>

           
          </div>
          <h4 class="m-b-20 p-b-5 b-b-default f-w-600">Informações</h4>
          <div class="row">
           <div class="col-sm-6">
            <h5 class="m-b-10 f-w-600">Telefone</h5>
            <input type="text" id="tel_usuario" <?php
                                                if (isset($tel_usuario)) { ?> value="<?php echo $_SESSION['tel_loja'];
                                                                                   } else { ?>" value="Não cadastrado" disabled> <?php };
                                                                                                                                 ?>
           </div>
           <div class="col-sm-6">
            <h5 class="m-b-10 f-w-600">CNPJ</h5>
            <input type="number" name="codigo_cnpj" id="cpf_usuario" <?php
                                                                     if (isset($codigo_cnpj)) { ?> value="<?php echo $_SESSION['codigo_cnpj'];
                                                                                   } else { ?>" value="Não cadastrado" disabled> <?php };
                                                                                                                                 ?>

           </div>
          </div>
          <div class="row">
           <h5 class="m-b-10 f-w-600">Email</h5>
           <h4 class="text-muted f-w-400"><?php echo $_SESSION['email_loja'];  ?></h4>
          </div>
          <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Localização</h4>
          <div class="row">
           <div class="col-sm-6">
            <input type="text" id="end_usuario" <?php
                                                if (isset($end_loja)) { ?> value="<?php echo $_SESSION['end_loja'];
                                                                                   } else { ?>" value="Não cadastrado" disabled> <?php };
                                                                                                                                 ?>
           </div>
           <div class="col-sm-6">

           </div>
          </div>
         
           <div class="col-sm">
              <input type="submit" value="Gravar">
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
</form>
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