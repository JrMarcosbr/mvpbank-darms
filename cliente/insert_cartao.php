<?php
    session_start();
    include_once "../conexao/param.php";    
    $id_user = $_SESSION['user_id'];
    $nome = $_POST['nome'];
    $tipo_conta = $_POST['tipo_conta'];
    $tipo_cartao = $_POST['tipo_cartao'];
    $anos_validade = $_POST['anos_validade'];
    $data_vencimento = $_POST['data'];
    $cvc = rand(100, 999);
    switch ($tipo_cartao) {
        case 0:
            $bandeira = rand(4000, 4999);
            $num_cartao = $bandeira.''.rand(100000000000, 999999999999);
            
            break;
        case 1:
            $num_cartao[0] = rand(5100, 5599);
            for ($i=1; $i < 4; $i++) { 
                $num_cartao[$i] = rand(1000, 9999);
            }
            break;
        case 2:
            $num_cartao[0] = rand(6000, 6999);
            for ($i=1; $i < 4; $i++) { 
                $num_cartao[$i] = rand(1000, 9999);
            }
            break;
        case 3:
            $num_cartao[0] = rand(3840, 3999);
            for ($i=1; $i < 4; $i++) { 
                $num_cartao[$i] = rand(1000, 9999);
            }
            break;
        case 4:
            $num_cartao[0] = rand(3000, 3999);
            for ($i=1; $i < 4; $i++) { 
                $num_cartao[$i] = rand(1000, 9999);
            }
            break;
      
        default:
            # code...
            break;
    }
    
    $query = 'SELECT * FROM `tb_cartao` INNER JOIN tb_cliente on tb_cliente.id_user = tb_cartao.tb_cartao_id_user WHERE cvc_cartao = "$cvc" and tb_cartao_id_user = "$id_user"';
    $query_num = 'SELECT * FROM `tb_cartao` INNER JOIN tb_cliente on tb_cliente.id_user = tb_cartao.tb_cartao_id_user WHERE num_cartao = "$num_cartao" and tb_cartao_id_user = "$id_user"';
    $sql = mysqli_query($con,$query);
    $sql_num = mysqli_query($con,$query_num);

    while (mysqli_num_rows($sql) > 0) {
        $cvc = rand(100, 999); 
        $query = 'SELECT * FROM `tb_cartao` INNER JOIN tb_cliente on tb_cliente.id_user = tb_cartao.tb_cartao_id_user WHERE cvc_cartao = "$cvc" and tb_cartao_id_user = "$id_user"';
        $sql = mysqli_query($con,$query);
    }
    while (mysqli_num_rows($sql_num) > 0) {
        switch ($tipo_cartao) {
            case 0:
                $bandeira = rand(4000, 4999);
                $num_cartao = $bandeira.''.rand(100000000000, 999999999999);
                
                break;
            case 1:
                $num_cartao[0] = rand(5100, 5599);
                for ($i=1; $i < 4; $i++) { 
                    $num_cartao[$i] = rand(1000, 9999);
                }
                break;
            case 2:
                $num_cartao[0] = rand(6000, 6999);
                for ($i=1; $i < 4; $i++) { 
                    $num_cartao[$i] = rand(1000, 9999);
                }
                break;
            case 3:
                $num_cartao[0] = rand(3840, 3999);
                for ($i=1; $i < 4; $i++) { 
                    $num_cartao[$i] = rand(1000, 9999);
                }
                break;
            case 4:
                $num_cartao[0] = rand(3000, 3999);
                for ($i=1; $i < 4; $i++) { 
                    $num_cartao[$i] = rand(1000, 9999);
                }
                break;
          
            default:
                # code...
                break;
        }
        $query_num = 'SELECT * FROM `tb_cartao` INNER JOIN tb_cliente on tb_cliente.id_user = tb_cartao.tb_cartao_id_user WHERE num_cartao = "$num_cartao" and tb_cartao_id_user = "$id_user"';
        $sql_num = mysqli_query($con,$query_num);
    }

    $insert = "INSERT INTO `tb_cartao`( `tb_cartao_id_user`, `num_cartao`, `bandeira_cartao`, `cvc_cartao`, `tempo_validade`, `data_validade`, `situacao`) VALUES ('$id_user','$num_cartao','$tipo_cartao','$cvc','$anos_validade','$data_vencimento','0')";
    mysqli_query($con, $insert);

    header("location:./view/index.php");



?>