<?php
session_start();
include('../conexao/param.php');
$user_cpf =  $_POST['user_cpf'];
$user_pass = md5($_POST['user_pass']);
$query = "SELECT * FROM `tb_cliente` INNER JOIN tb_login on tb_cliente.id_user = tb_login.tb_login_id_user WHERE cpf_user = '$user_cpf' and tb_login.senha__user  ='".$user_pass."'";
$result = mysqli_query($con, $query);
$row_cli = mysqli_num_rows($result);
if ($row_cli > 0) {
	while ($value = mysqli_fetch_assoc($result)) {
	$_SESSION['user_id'] = $value['id_user'];
	$nome = explode(" ",$value['nome_user']);
	$_SESSION['user_nome'] = $nome[0]." ".$nome[1];
	$_SESSION['src_foto'] = $value['foto_user'];
	}
    header('Location: view/index.php');

}else{
	$query = "SELECT * FROM `tb_adm` INNER JOIN tb_login_admin on tb_adm.id_adm = tb_login_admin.usuario_adm WHERE cpf_adm = '$user_cpf' and senha_adm  = '$user_pass'";
	$result = mysqli_query($con, $query);
	$row_cli = mysqli_num_rows($result);
	if ($row_cli > 0) {
		while ($value = mysqli_fetch_assoc($result)) {
		$_SESSION['admin_id'] = $value['id_adm'];
		$nome = explode(" ",$value['nome_adm']);
		$_SESSION['admin_nome'] = $nome[0];
		}
		header('Location: ../admin/view/index.php');
	}else{
		header('Location: ../index.php?erro');
	}
	
}


?>