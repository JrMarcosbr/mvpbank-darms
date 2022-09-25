<?php
session_start();
include_once "../conexao/param.php";
if (isset($_POST['user_nome'])) {
	$nome = $_POST['user_nome'];
	$email = $_POST['user_email'];
	$cpf = $_POST['user_cpf'];
    $buscar_user = "SELECT * FROM `tb_cliente` WHERE tb_cliente.cpf_user = '$cpf' and tb_cliente.nome_user = '$nome' and tb_cliente.email_user = '$email'";
    $sql = mysqli_query($con, $buscar_user);
	$rows = mysqli_num_rows($sql);
	if($rows > 0){
        while($value = mysqli_fetch_assoc($sql)){
            $_SESSION['id_user'] = $value['id_user'];
        }
        header('Location: view/senha.php');
    }else{
        $buscar_user = "SELECT * FROM `tb_adm` WHERE tb_adm.cpf_adm = '$cpf' and tb_adm.nome_adm = '$nome'";
        $sql = mysqli_query($con, $buscar_user);
        $rows = mysqli_num_rows($sql);
        if($rows > 0){
            while($value = mysqli_fetch_assoc($sql)){
                $_SESSION['admin_id'] = $value['id_adm'];
            }
            header('Location: ../admin/view/senha.php');
        } 
    }
}
if (isset($_POST['user_senha'])) {
    $id_user = $_SESSION['user_id'];
    $senha = md5($_POST['user_senha']);
    $insert = "UPDATE `tb_login` SET `senha_user`='$senha' WHERE tb_login_id_user = $id_user";
    mysqli_query($con , $insert);
    header('Location:../');
}
?>