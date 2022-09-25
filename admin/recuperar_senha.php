<?php
session_start();
include_once "../conexao/param.php";
if (isset($_POST['user_senha'])) {
    $id_user = $_SESSION['admin_id'];
    $senha = md5($_POST['user_senha']);
    $insert = "UPDATE `tb_login_admin` SET `senha_adm`='$senha' WHERE usuario_adm = $id_user";
    mysqli_query($con , $insert);
    header('Location:../');
}
?>