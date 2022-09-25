<?php
session_start();
include "../conexao/param.php";
$arquivo = $_FILES['picture__input'];
$arquivoNovo = explode('.',$arquivo['name']);

if ($arquivoNovo[sizeof($arquivoNovo)-1] != "jpg") {
  die('Você não pode fazer upload de arquivos png');
}else{
  move_uploaded_file($arquivo['tmp_name'],'image/'.$arquivo['name']);
  $caminho = 'image/'.$arquivo['name'];
  echo $caminho;
  $id_user = $_SESSION['user_id'];
  $query = "UPDATE `tb_cliente` SET `foto_user`='$caminho' WHERE id_user = $id_user";
  mysqli_query($con,$query);
  header("Location: view/index.php");
}




