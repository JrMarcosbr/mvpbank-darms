<?php
include_once "../conexao/param.php";
if (isset($_POST)) {
	$nome = $_POST['nome'];
	$cpf = $_POST['user_cpf'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $senha = md5($_POST['senha']);
	$buscar_adm = "SELECT * FROM `tb_adm` WHERE tb_adm.cpf_adm = '$cpf'";
	$sql = mysqli_query($con, $buscar_adm);
	$rows = mysqli_num_rows($sql);
	if($rows == 0){
		$query = "INSERT INTO `tb_adm`(`nome_adm`, `cpf_adm`, `estado`, `endereco`) VALUES ('$nome','$cpf','$estado','$endereco')";
		mysqli_query($con, $query);
		$buscar_adm = "SELECT * FROM `tb_adm` WHERE tb_adm.cpf_adm = '$cpf'";
		$resultado = mysqli_query($con, $buscar_adm);
		$row_cli = mysqli_num_rows($resultado);
		if($row_cli > 0){
			while ($value = mysqli_fetch_assoc($resultado)) {
				$_SESSION['user_id'] = $value['id_adm'];
				$nome = explode(" ",$value['nome_adm']);
				$_SESSION['user_nome'] = $nome[0]." ".$nome[1];
				$id_adm = $_SESSION['user_id'];
			}
			$inserir_login = "INSERT INTO `tb_login_admin`(`usuario_adm`, `senha_adm`) VALUES ('$id_adm','$senha')";
			mysqli_query($con, $inserir_login);
			header('Location:view/index.php');
		}
	}else{
		header('Location:../cadastrar_admin.php?erro');
	}
 }else{
	header('Location:../../index.php');
 }

?>