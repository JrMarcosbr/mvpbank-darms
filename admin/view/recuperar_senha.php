<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
      <link rel="stylesheet" href="../../css/style.css">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></head>
<body >
  <nav class="navbar  ">
  <nav class="navbar navbar-expand-lg " style="background-color: #330000bf!important;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img  src="../../img/LOGO MJ BANK WHITE.png" alt="Logo" width="60" href="index.php" class="fadeIn second d-inline-block align-text-top">
      </a>
    </div>
  </nav>

    <div class="container-fluid">
        <div class="row">
              <div class="wrapper fadeInDown">
    <div id="formContent">
      <h2>Recuperar senha</h2>
      <form method="post" action="../recuperar_senha.php">
        <input type="text" id="nome" class="fadeIn second" name="user_nome" placeholder="Nome Completo" required>
        <input type="text" id="cpf" class="fadeIn second" name="user_cpf" placeholder="CPF" required>
        <input type="text" id="email" class="fadeIn third" name="user_email" placeholder="Email">
        <input type="submit" class="fadeIn fourth mt-3" value="Enviar">
      </form>

      <div id="formFooter">
        <a class="underlineHover nav-link" href="../../form.html">Ainda não tem conta?</a>
        <a class="underlineHover nav-link" href="../../index.html">Já tem conta? Fazer Login</a>
      </div>
      </div>
  
    </div>
  </div>  
        </div>
    </div>
    
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script><script>
    document.getElementById('cpf').addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
    e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '-' + x[4] + (x[5] ? '-' + x[5] : '');
  });;

  var password = document.getElementById("senha")
  , confirm_password = document.getElementById("confirm");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Senhas diferentes!");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>