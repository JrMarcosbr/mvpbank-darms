<?php
include_once "../conexao/param.php";
if (isset($_POST)) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$cpf = $_POST['user_cpf'];
	$contato = $_POST['contato'];
	$tipo_conta = $_POST['tipo_conta'];
    $endereco = $_POST['endereco'];
    $senha = md5($_POST['senha']);
	if(isset($_POST['foto'])){
		$foto = $_POST['foto'];
	}else{
		$foto = " ";
	}
	$buscar_user = "SELECT * FROM `tb_cliente` WHERE tb_cliente.cpf_user = '$cpf' or tb_cliente.email_user = '$email'";
	$sql = mysqli_query($con, $buscar_user);
	$rows = mysqli_num_rows($sql);
	if($rows == 0){
		$query = "INSERT INTO `tb_cliente`(`nome_user`, `email_user`, `cpf_user`, `contato_user`, `tipo_conta`, `foto_user`) VALUES ('$nome','$email','$cpf','$contato','$tipo_conta','$foto')";
		mysqli_query($con, $query);
		$buscar_user = "SELECT * FROM `tb_cliente` WHERE tb_cliente.cpf_user = '$cpf'";
		$resultado = mysqli_query($con, $buscar_user);
		$row_cli = mysqli_num_rows($resultado);
		if($row_cli > 0){
			while ($value = mysqli_fetch_assoc($resultado)) {
				$_SESSION['user_id'] = $value['id_user'];
				$nome = explode(" ",$value['nome_user']);
				$_SESSION['user_nome'] = $nome[0]." ".$nome[1];
				$id_user = $_SESSION['user_id'];
			}
			$inserir_end = "INSERT INTO `tb_endereco`(`tb_end_id_user`, `endereco_user`) VALUES ('$id_user','$endereco')";
			mysqli_query($con, $inserir_end);
			$inserir_login = "INSERT INTO `tb_login`(`tb_login_id_user`, `senha__user`) VALUES ('$id_user','$senha')";
			mysqli_query($con, $inserir_login);
			header('Location:view/index.php');
		}
	}else{
		header('Location:../form.php?erro');
	}
 }else{
	header('Location:../index.html');
 }

?>