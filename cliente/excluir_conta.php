<?php
if (isset($_POST)) {
    session_start();
    include "../conexao/param.php";
    $id_user = $_SESSION['user_id'];
    $excluir = "DELETE FROM `tb_cliente` WHERE tb_cliente.id_user = $id_user";
    mysqli_query($con, $excluir);
    header("location:../");
}

?>