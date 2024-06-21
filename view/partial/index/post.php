<?php
include_once '../app/controller/conexao.php';
if (!$_SESSION['nivel_acesso'] >= 1) {
    header("Location:../view/login.php");
    exit;
}

if (!isset($_SESSION['cd_produto'])) {
?>
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
        <ul class="cards">
            <li class="cards__item">
                <div class="card text-dark d-flex ">

                    <?php
                    try {
                        // Supondo que a conexão com o banco de dados já esteja estabelecida usando PDO
                        // $conn é a conexão ativa

                        // Consulta SQL para obter a URL da imagem, a descrição e o nome do produto
                        $sql = "SELECT im_produto, ds_produto, nm_produto FROM produto WHERE codigo_loja = :codigo_loja";
                        $stmt = $conn->prepare($sql);

                        if (!empty($fk_loja)) {
                            $fk_loja = $_SESSION['fk_loja'];
                        }

                        $stmt->bindParam(':id', $fk_loja, PDO::PARAM_INT);
                        $stmt->execute();


                        // Verificar se alguma linha foi retornada
                        if ($stmt->rowCount() > 0) {

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $imageUrl = $row['im_produto'];
                                $descricao = $row['ds_produto'];
                                $nomeProduto = $row['nm_produto'];

                                // Ajustar o caminho da imagem para voltar um diretório
                                $adjustedImageUrl = '../' . $imageUrl;
                                
                                if (isset($adjustedImageUrl) && $adjustedImageUrl != null) : ?>
                                    <div class="col m-2 border border-dark">
                                    <div class="center">
                                        <img src="<?php echo htmlspecialchars($adjustedImageUrl); ?>" alt="Imagem do Produto" style="max-width: 30%; height: auto;padding-top: 10%;">
                                    </div>
                                <?php else : ?>
                                    <p>Imagem não disponível.</p>
                                <?php endif; ?>



                                <!-- Código 2 -->
                                
                                    <div class="card__content" style="display: flex !important;">
                                        <div class="fw-bolder mt-3" style="display: block !important;">
                                            <h4><?php echo htmlspecialchars($nomeProduto); ?></h4>
                                        </div>
                                        <?php if (isset($descricao) && $descricao != null) : ?>
                                            <h6 class="descricao-resumida"><?php echo htmlspecialchars(substr($descricao, 0, 100)); ?></h6>
                                            <h6 class="descricao-completa"><?php echo htmlspecialchars($descricao); ?></h6>
                                            <button class="btn-saiba-mais btn btn-link">Leia mais</button>
                                        <?php else : ?>
                                            <p>Descrição não disponível.</p>
                                        <?php endif; ?>
                                        <button class="btn btn-outline-danger">Botão</button>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <h6>Nenhum produto encontrado!</h6>
                    <?php
                        }
                    } catch (PDOException $e) {
                        echo "Erro: " . $e->getMessage();
                    }
                    ?>


                </div>
            </li>
        </ul>
    </div>


<?php

}

?>