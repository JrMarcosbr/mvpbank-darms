  <?php session_start();?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
      <link rel="stylesheet" href="../../css/style.css">
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  </head>
  <body class="" style="overflow: hidden !important;">
  <nav class="navbar navbar-expand-lg " style="background-color: #330000bf!important;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img  src="../../img/LOGO MJ BANK WHITE.png" alt="Logo" width="60" href="index.php" class="fadeIn second d-inline-block align-text-top">
      </a>
        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <ul class="navbar-nav fadeIn second">
                <li class="nav-item active">
                    <a class="nav-link text-white nav_font underlineHover" href="index.php">Início</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white nav_font underlineHover" href="meus_cartoes.php">Meus Cartões</a>
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
    <div class="conteiner-fluid">
    <div class="row">
    <div class="col-md-6 mx-auto fadeInDown">
      <div id="formContent" class="mx-auto mt-5">
      <h2>Cadastrar Cartão</h2>
        <form action="../cad_cartao.php" method="POST">
          <input type="text" class="fadeIn third" onkeyup="select_nome()" name="nome" id="input_nome" placeholder="Nome impresso no cartão" required>
          <input type="text" name="num_cartao" id="num_cartao"  maxlength="20" placeholder="Número do cartão" class="fadeIn third" required>
          <input type="text" name="cvc" id="input_cvc" onkeyup="select_cvc()"  maxlength="3" class="fadeIn third" placeholder="CVC" required>
          <select name="tipo_conta" id="tipo_conta" onchange="select_tipo()" class="fadeIn third" required>
            <option value="" selected disabled>Tipo de cartão </option>
            <option value="0">CRÉDITO</option>
            <option value="1">DÉBITO</option>
            <option value="2">POUPANÇA</option>
            <option value="" disabled>Multifuncional</option>
            <option value="3">CRÉDITO <br> E DÉBITO</option>
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
          <input type="hidden" name="bandeira_cartao" id="enviar_bandeira">
          <input type="submit" class="fadeIn fourth" value="Cadastrar">
        </form>
      </div>
    </div> 
      <div class="col-md-4 mt-3 mx-auto">
        <div class="mt-4 cartao mx-auto">
            <div><img src="../../img/chip.png" class="chip_cad" alt=""></div>
            <input class="num_cad" id="num_cart" disabled></input>
            <div class='text-white titular_cad'>Nome do titular</div>
            <input class="w-100 nome_cad" id="nome" disabled></input>
            <div class="text-dark valid_cad">VALID</div> <input class="data_cad " id="data_cad" disabled>
            <input class="tipo_cad" id="tipo_conta_view" disabeld>
            <div class="bandeira_cad" id="bandeira"></div>
        </div>
        <div class="mt-4  cartao mx-auto">
            <span class="barra_cad bg-white"></span>
            <div class="cvc_cad text-center"><span style="font-size:15px;">CVC</span><br><input class="text-center" id="cvc" disabled ></div>
        </div>
      </div>
    </div>
    </div>
      
  </body>
  </html>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script>
    function select_nome(){
      var nome = document. getElementById('input_nome').value;
    document.getElementById('nome').value = nome;
    }
    function select_tipo(){
      var select = document.getElementById('tipo_conta');
			var option = select.options[select.selectedIndex];
      document.getElementById('tipo_conta_view').value = option.text;
    }
    function select_cvc(){
      var nome = document. getElementById('input_cvc').value;
    document.getElementById('cvc').value = nome;
    }
    document.getElementById('num_cartao').addEventListener('input', function (aux) {
    var x = aux.target.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,4})(\d{0,4})(\d{0,4})/);
    aux.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + ' ' + x[3] + ' ' + x[4] + (x[5] ? ' ' + x[5] : '');
    var num = document. getElementById('num_cartao').value;
    document.getElementById('num_cart').value = num;
    var indicador = num[0];
    let bandeira = document.getElementById('bandeira');
    if(indicador == 4){
      bandeira.classList.remove("master","hiper","american","elo");
      bandeira.classList.add("visa");
      document.getElementById('enviar_bandeira').value = 0;
    }
    if(indicador == 5){
      bandeira.classList.remove("visa","hiper","american","elo");
      bandeira.classList.add("master");
      document.getElementById('enviar_bandeira').value = 1;
    }
    if(indicador == 6){
      bandeira.classList.remove("visa","hiper","american","master");
      bandeira.classList.add("elo");
      document.getElementById('enviar_bandeira').value = 2;
    }
    if(indicador == 7){
      bandeira.classList.remove("visa","elo","american","master");
      bandeira.classList.add("hiper");
      document.getElementById('enviar_bandeira').value = 3;
    }
    if(indicador == 8){
      bandeira.classList.remove("visa","hiper","elo","master");
      bandeira.classList.add("american");
      document.getElementById('enviar_bandeira').value = 4;
    }
  });
      document.getElementById('data_validade').addEventListener('input', function (e) {
      var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,2})/);
      e.target.value = !x[2] ? x[1] : x[1] + '/' + x[2] + '';
      var data = document. getElementById('data_validade').value;
      document.getElementById('data_cad').value = data;
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