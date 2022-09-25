<?php
$servidor = "localhost";
$usuario = "root";
$senha = "darms22";
$banco = "darms";

$con = mysqli_connect($servidor, $usuario, $senha, $banco);
// $pdo = new PDO("mysql:host=localhost;dbname:darms;",'root','darms22');
//$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 mysqli_set_charset($con,"utf8");

?>