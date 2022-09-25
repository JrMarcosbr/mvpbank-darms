<?php
if (isset($_GET['id_cartao'])) {
    include_once "../conexao/param.php";   
    $id_cartao = $_GET['id_cartao'];
    $excluir = "DELETE FROM `tb_cartao` WHERE id_cartao = $id_cartao";
    mysqli_query($con, $excluir);
    header('Location:view/meus_cartoes.php');
}



?>