<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body class="">
<nav class="navbar navbar-expand-lg " style="background-color: #330000bf!important;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img  src="../../img/LOGO MJ BANK WHITE.png" alt="Logo" width="60" href="index.php" class="fadeIn second d-inline-block align-text-top">
      </a>
        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <ul class="navbar-nav fadeIn second">
                <li class="nav-item active">
                    <a class="nav-link text-white nav_font underlineHover" href="index.php">Início<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white nav_font underlineHover" href="meus_cartoes.php">Meus Cartões<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="cadastrar_cartao.php">Cadastrar Cartões</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="criar_cartao.php">Criar Cartão</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="perfil.php">Meu Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="../sair.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>
  <div class="wrapper fadeInDown">
    <div id="formContent">
    <h2>Criar cartão</h2>
      <form action="../criar_cartao.php" method="POST">
        <input type="text" class="fadeIn third" name="nome" placeholder="Nome Completo" required>
        <select name="tipo_cartao" class="fadeIn third" required>
          <option value="" selected disabled>Tipo de Bandeira</option>
          <option value="0">VISA</option>
          <option value="1">MASTERCARD</option>
          <option value="2">ELO</option>
          <option value="3">HIPERCARD</option>
          <option value="4">AMERICAN EXPRESS</option>
        </select>
        <!-- <input type="text" name="num_cartao" id="num_cartao" maxlength="20" placeholder="Número do cartão" class="fadeIn third" required> -->
        <!-- <input type="text" name="cvc"  maxlength="3" class="fadeIn third" placeholder="CVC" required> -->
        <select name="tipo_conta" class="fadeIn third" required>
          <option value="" selected disabled>Tipo de cartão </option>
          <option value="0">CRÉDITO</option>
          <option value="1">DÉBITO</option>
          <option value="2">POUPANÇA</option>
          <option value="" disabled>Multifuncional</option>
          <option value="3">CRÉDITO E DÉBITO</option>
          <option value="4">POUPANÇA E DÉBITO</option>
        </select>
        <select name="anos_validade" class="fadeIn third" required>
          <option value="" selected disabled>Anos de validade </option>
          <option value="0">2</option>
          <option value="1">4</option>
          <option value="2">5</option>
          <option value="3">6</option>
        </select>
        <input type="text" name="data" id="data_validade" maxlength="6" class="fadeIn third" placeholder="Data da Fatura" required>
        <input type="submit" class="fadeIn fourth" value="Entrar">
      </form>

      <div id="formFooter">
        <a class="underlineHover nav-link" href="index.html">Já tem conta? Fazer Login</a>
      </div>
  
    </div>
  </div> 
    
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script>
    document.getElementById('data_validade').addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,2})/);
    e.target.value = !x[2] ? x[1] : x[1] + '/' + x[2] + '';
  });


  var password = document.getElementById("senha")
  , confirm_password = document.getElementById("confirm");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Senhas diferentes!");
    } else {
      confirm_password.setCustomValidity('');
    }
  }
</script>