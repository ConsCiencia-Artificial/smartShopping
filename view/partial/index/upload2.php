<?php
if ($_POST) {
    $nm_foto = $_FILES["img_post"]["name"];

    $foto_tmp = $_FILES["img_post"]["tmp_name"];
    $foto_destino = "../assets/uploads/" . basename($nm_foto);
    move_uploaded_file($foto_tmp, $foto_destino);
    

}
?>