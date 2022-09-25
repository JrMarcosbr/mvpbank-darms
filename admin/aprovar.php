<?php
session_start();
if(isset($_POST['justificativa'])){
	include "../conexao/param.php";
	$justificativa = $_POST['justificativa'];
	$opcao = $_POST['options'];
	$id_cartao = $_POST['id_cartao'];
	$query = "UPDATE `tb_cartao` SET `situacao`='$opcao',`justificativa`='$justificativa' WHERE id_cartao = $id_cartao";
	mysqli_query($con, $query);
	header("Location: view/cartoes_novos.php");
}else{
	echo "erro";	
}


?>