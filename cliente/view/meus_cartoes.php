<?php
session_start();
include('../../conexao/param.php');
$id_user = $_SESSION['user_id'];
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
  <!-- <div class="wrapper fadeInDown">
    <div id="formContent">
      <h2>Login</h2>
      <form method="post" action="cliente/verificar_login.php">
        <input type="text" id="cpf" class="fadeIn second" name="user_cpf" placeholder="CPF">
        <input type="text" id="password" class="fadeIn third" name="user_pass" placeholder="Senha">
        <input type="submit" class="fadeIn fourth mt-3" value="Entrar">
      </form>

      <div id="formFooter">
        <a class="underlineHover nav-link" href="form.html">Ainda não tem conta?</a>
        <a class="underlineHover nav-link" href="cliente/recuperar_senha.php">Esqueceu a senha?</a>
      </div>
  
    </div>
  </div>   -->
    <div class="container-fluid">
        <div class="row">
                <?php
                  $busca_cartao ="SELECT * FROM `tb_cartao`INNER JOIN tb_cliente on tb_cliente.id_user = tb_cartao.tb_cartao_id_user WHERE tb_cartao_id_user = $id_user";
                  $sql = mysqli_query($con, $busca_cartao);
                  $rows = mysqli_num_rows($sql);
                  if ($rows > 0) {
                    while ($value = mysqli_fetch_assoc($sql)) {
                      switch ($value['tipo_card']) {
                        case '0':
                          $tipo = "CRÉDITO";
                          break;
                        case '1':
                          $tipo = "DÉBITO";
                          break;
                        case '2':
                          $tipo = "POUPANÇA";
                          break;
                        case '3':
                          $tipo = "CRÉDITO E DÉBITO";
                          break;
                        case '4':
                          $tipo = "POUPANÇA E DÉBITO";
                          break;
                        default:
                          
                          break;
                      }
                      switch ($value['bandeira_cartao']) {
                        case '0':
                          $img_bandeira = "../../img/visa.png";
                          break;
                        case '1':
                          $img_bandeira = "../../img/mastercard.png";
                          break;
                        case '2':
                          $img_bandeira = "../../img/elo.png";
                          break;
                        case '3':
                          $img_bandeira = "../../img/hipercard.png";
                          break;
                        case '4':
                          $img_bandeira = "../../img/americanexpress.png";
                          break;
                        default:
                          
                          break;
                      }
                      
                    ?>
                <div class="col-md-3 mx-auto  mt-4 cartao">
                    <span><img src="../../img/chip.png" class="chip" alt=""></span>
                    <div  class="text-center num mx-auto"> <?php echo $value['num_cartao']; ?></div >
                    <div class="text-white mt-2 mx-auto text-center">
                    <img src="<?php echo $img_bandeira; ?>" class="bandeira" alt="">  
                    <?php echo $tipo; ?></div>

                    <!-- <span class="tipo text-center" id="tipo">/span> -->
                    <span class='text-white titular'>Nome do titular</span>
                    <input class=" w-100 nome nome_titular" disabled value="<?php echo $value['nome_user']; ?>">
                    <span class="text-dark valid">VALID</span> <input class="data " value="<?php echo $value['data_validade']; ?>" id="data_cad" disabled>
                    
                </div>
                <div class="col-md-4 text-center text-white">
                  <?php
                    if ($value['situacao'] == 0) {
                      echo '<h3 class="mt-4 mb-4 bg-dark text-white p-4" style="border-radius:10px">Situação: Em Análise</h3>';
                    }
                    if ($value['situacao'] == 1) {
                      echo '<h3 class="mt-4 mb-4 bg-success text-white p-4" style="border-radius:10px">Situação: Aprovado</h3>';
                    }
                    if ($value['situacao'] == 2) {
                      echo '<h3 class="mt-4 mb-4 bg-danger text-white p-4" style="border-radius:10px">Situação: Não Aprovado</h3>';
                    }
                    echo '
                    <div class="col-md-8 mx-auto bg-light text-dark" style="font-size: 24px;border-radius:10px">
                    <br><span class="">
                        <p>Justificativa:</p>'.$value['justificativa'].'  
                  </span>
                    </div>
                    ';
                  ?>
                  
                </div>
                <div class="col-md-3 mx-auto mt-4 cartao_verso">
                    <span class="barra bg-white"></span>
                    <div class="cvc text-center"><span style="font-size:15px;">CVC</span><br><?php echo $value['cvc_cartao']; ?></div>
                </div>
                <div class="col-md-12 text-center mt-5 mx-auto ">
                <a href="../excluir_cartao.php?id_cartao=<?php echo $value['id_cartao']; ?>"><button class="w-100 btn btn-danger">EXCLUIR</button></a>
                </div>
                <hr>
                <?php
                    }
                  }
                ?>
            </div>
    </div>
    <footer class="h-50">

    </footer>
    
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