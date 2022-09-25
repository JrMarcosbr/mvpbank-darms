<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body class="" onload="erro()">
  <nav class="navbar fixed-top"  style="z-index: -20;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="img/LOGO MJ BANK WHITE.png" alt="Logo" width="60" class="d-inline-block align-text-top">
      </a>
    </div>
  </nav>
  <div class="wrapper fadeInDown">
    <div id="formConten">
    <h2>Cadastro</h2>
      <form action="cliente/cad_cliente.php" method="POST">
        <input type="text" class="fadeIn third" name="nome" placeholder="Nome Completo" required>
        <input type="text" class="fadeIn third" type="email" name="email" placeholder="Email" required>
        <input type="text" class="fadeIn third" id="cpf" class="fadeIn second" name="user_cpf" placeholder="CPF" maxlength="14" required>
        <input type="text" class="fadeIn third" id="num" name="contato" placeholder="Contato" required>
        <select class="fadeIn third text-gray" name="tipo_conta" placeholder="Tipo de Conta" required>
          <option value="Tipo de conta" selected disabled>Tipo de conta</option>
          <option value="0">Conta corrente</option>
          <option value="1">Conta poupança</option>
        </select>
        <input type="text" class="fadeIn third" name="endereco" placeholder="Endereço completo" required>
        <input class="fadeIn third" name="senha" type="password" id="senha" placeholder="Senha" required>
        <input class="fadeIn third" name="senha" type="password" id="confirm" placeholder="Repita a senha" required>
        <br><strong><span id="erro" class="" style="color:red;"></span></strong><br>
        <input type="submit" class="fadeIn fourth" value="Enviar">
      </form>

      <div id="formFooter">
        <a class="underlineHover nav-link" href="index.php">Já tem conta? Fazer Login</a>
      </div>
  
    </div>
  </div> 
  <?php 
    if(isset($_GET['erro'])){
      echo '<script type="text/javascript">
      function erro(){
        document.getElementById("erro").innerHTML = "CPF ou email já cadastrados";
      }
      </script>';
    }

  ?>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script>
  
    document.getElementById('cpf').addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
    e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '-' + x[4] + (x[5] ? '-' + x[5] : '');
  });

  document.getElementById('num').addEventListener('input', function (aux) {
    var x = aux.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,1})(\d{0,4})(\d{0,4})/);
    aux.target.value = !x[2] ?  x[1] : '('+ x[1] + ')' + x[2] + ' ' + x[3] + '-' + x[4];
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