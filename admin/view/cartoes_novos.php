<?php
session_start();
include "../../conexao/param.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
     <link rel="stylesheet" href="../../css/style.css">
     <title>Document</title>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="icon" type="image/png" href="../../img/LOGO MJ BANK WHITE.png">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="src/jquery.quicksearch.js"></script>
</head>
    <script>
    (function (w, doc,co) {
      // http://stackoverflow.com/questions/901115/get-query-string-values-in-javascript
      var u = {},
        e,
        a = /\+/g,  // Regex for replacing addition symbol with a space
        r = /([^&=]+)=?([^&]*)/g,
        d = function (s) { return decodeURIComponent(s.replace(a, " ")); },
        q = w.location.search.substring(1),
        v = '2.0.3';

      while (e = r.exec(q)) {
        u[d(e[1])] = d(e[2]);
      }
      
      if (!!u.jquery) {
        v = u.jquery;
      } 

      doc.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/'+v+'/jquery.min.js">' + "<" + '/' + 'script>');
      co.log('\nLoading jQuery v' + v + '\n');
    })(window, document, console);
    </script>
    <script>
      $(function () {
        /*
        Example 1
        */
        $('input#id_search').quicksearch('table#table_example tbody tr');
        
        /*
        Example 2 
        */
        $('input#id_search2').quicksearch('table#table_example2 tbody tr', {
          'delay': 300,
          'selector': 'th',
          'stripeRows': ['odd', 'even'],
          'loader': 'span.loading',
          'bind': 'keyup click input',
          'show': function () {
            this.style.color = '';
          },
          'hide': function () {
            this.style.color = '#ccc';
          },
          'prepareQuery': function (val) {
            return new RegExp(val, "i");
          },
          'testQuery': function (query, txt, _row) {
            return query.test(txt);
          }
        });
        
        /*
        Example 3
        */
        var qs = $('input#id_search_list').quicksearch('ul#list_example li');
        
        $.ajax({
          'url': 'example.json',
          'type': 'GET',
          'dataType': 'json',
          'success': function (data) {
            for (i in data['list_items']) {
              $('ul#list_example').append('<li>' + data['list_items'][i] + '</li>');
            }
            qs.cache();
          }
        });
        
        $('input#add_to_list').click(function () {
          $('ul#list_example').append('<li>Added on click</li>');
          qs.cache();
        });
        
      });
    </script>
<body style="overflow-x: hidden;" >
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <a class="nav-link text-white nav_font underlineHover" href="cartoes_novos.php">Cartões Novos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white nav_font underlineHover" href="cartoes_cadas.php">Cartões Cadastrados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="cadastrar_admin.php">Cadastrar de Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="index.php">Gerenciar clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav_font underlineHover" href="../sair.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>
<div class="conteiner">
  <div class="row">
    <div class="col-md-10 fadeIn mx-auto mt-3">
        <div class="card my-4">
          <div class="p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary  pt-4 pb-3">
              <h2 class="text-white text-capitalize text-center ps-3">Aprovação de Novos Cartões</h2>
            </div>
          </div>
          <div class="table-responsive col-md-12 mt-4  mx-auto">
            <table id="exampla"  class="table text-center">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Número do Cartão</th>
                  <th>CVC</th>
                  <th>Tipo de Conta</th>
                  <th>Tipo de Cartão</th>
                  <th>Bandeira</th>
                  <th>Dia e Anos de Validade</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                $query = "SELECT * FROM `tb_cartao` LEFT JOIN tb_cliente on tb_cartao.tb_cartao_id_user = tb_cliente.id_user  WHERE card_novo = 0 and tb_cartao.situacao = 0 GROUP BY tb_cliente.id_user";
                $sql = mysqli_query($con, $query);
                $row_cli = mysqli_num_rows($sql);
                if ($row_cli > 0) {
                  while ($value = mysqli_fetch_assoc($sql)) {
                    // echo "<tr>";
                    // echo "<th colspan='12'>Dados Cliente</th>";
                    // echo "</tr>";
                    echo "<tr>";
                    echo "<td>".$value['nome_user'] ."</td>";
                    echo "<td>".$value['cpf_user'] ."</td>";
                    echo "<td>".$value['num_cartao'] ."</td>";
                    echo "<td>".$value['cvc_cartao'] ."</td>";

                    switch ($value['tipo_conta']) {
                      case 0:
                        echo "<td>Conta Corrente</td>";
                        break;
                      case 1:
                        echo "<td>Conta Poupança</td>";
                        break;                    
                      default:
                        // code...
                        break;
                    }
                    switch ($value['tipo_card']) {
                      case 0:
                        echo "<td>Cartão de Crédito</td>";
                        break;
                      case 1:
                        echo "<td>Cartão de Débito</td>";
                        break;
                      case 2:
                        echo "<td>Cartão de Poupança</td>";
                        break;  
                      case 3:
                        echo "<td>Cartão de Crédito e Débito</td>";
                        break;  
                      case 4:
                        echo "<td>Cartão de Poupança e Débito</td>";
                        break;              
                      default:
                        // code...
                        break;
                    }
                    switch ($value['bandeira_cartao']) {
                      case 0:
                        echo "<td>Visa</td>";
                        break;
                      case 1:
                        echo "<td>Mastercard</td>";
                        break;
                      case 2:
                        echo "<td>Elo</td>";
                        break;  
                      case 3:
                        echo "<td>Hipercard</td>";
                        break;  
                      case 4:
                        echo "<td>American Express</td>";
                        break;              
                      default:
                        // code...
                        break;
                    }
                    echo "<td>".$value['data_validade']." - ".$value['tempo_validade']." anos</td>";
                     echo '<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal_novo-'.$value["id_cartao"].'">☰</button></td>';
                  }
                }else{
                  echo"<tr><td colspan='12' class='text-center'> Nenhum dado foi encontrado...</td></tr>";
                }
                ?>
              </tbody>
            </table>
              </div>
            </div>
          </div>
  </div>
</div>
<?php include "modal_acao.php"; ?>

<script type="text/javascript">
  $(document).ready(function () {
    $('#exampla').DataTable({
      scrollY: 600,
        scrollX: false,
      "language": {
        "lengthMenu": "Mostrando _MENU_ registros por página",
        "zeroRecords": "Nada encontrado",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "Nenhum registro disponível",
        "infoFiltered": "(filtrado de _MAX_ registros no total)"
      }});
  });
</script>
</body>
</html>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script type="text/javascript">
      function excluirItemSelecionado(id_user) {
        swal({
          title: "Deseja realmente excluir?",
          text: "Ao deletar esse produto, todas as informações relacionadas a ele irão ser deletas também.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = "crud/exc_prod.php?id_user="+id_user+"";
            swal("Poof! Produto deletado com sucesso!", {
              icon: "success",
            });
          } else {
            swal("Todos os dados permanecem salvos!");
          }
        });
      }
    </script>