<?php
if (isset($_POST['senha'])) {
    session_start();
    include "../conexao/param.php";
    $id_user = $_SESSION['user_id'];
    $senha = md5($_POST['senha']);
    $update = "UPDATE `tb_login` SET `senha__user`='$senha' WHERE tb_login_id_user = $id_user";
    mysqli_query($con, $update);
    header("location:../");
}

?>