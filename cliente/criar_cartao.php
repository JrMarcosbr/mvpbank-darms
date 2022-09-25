<?php
    session_start();
    include_once "../conexao/param.php";    
    $id_user = $_SESSION['user_id'];
    $nome = $_POST['nome'];
    $tipo_cartao = $_POST['tipo_cartao'];
    $tipo_conta = $_POST['tipo_conta'];
    $anos_validade = $_POST['anos_validade'];
    $data_vencimento = date('m/Y');
    $cvc = rand(100, 999);
    switch ($tipo_cartao) {
        case 0:
            $bandeira = rand(4000, 4999);
            $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
            
            break;
        case 1:
            $bandeira = rand(5100, 5599);
            $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
            break;
        case 2:
            $bandeira = rand(6000, 6999);
            $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
            break;
        case 3:
            $bandeira = rand(7000, 7999);
            $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
            break;
        case 4:
            $bandeira = rand(8000, 8999);
            $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
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
                $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
                
                break;
            case 1:
                $bandeira = rand(5100, 5599);
                $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
                break;
            case 2:
                $bandeira = rand(6000, 6999);
                $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
                break;
            case 3:
                $bandeira = rand(7000, 7999);
                $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
                break;
            case 4:
                $bandeira = rand(8000, 8999);
                $num_cartao = $bandeira.' '.rand(0000, 9999).' '.rand(0000, 9999).' '.rand(0000, 9999);
                break;
          
            default:
                # code...
                break;
        }
        $query_num = 'SELECT * FROM `tb_cartao` INNER JOIN tb_cliente on tb_cliente.id_user = tb_cartao.tb_cartao_id_user WHERE num_cartao = "$num_cartao" and tb_cartao_id_user = "$id_user"';
        $sql_num = mysqli_query($con,$query_num);
    }

    $insert = "INSERT INTO `tb_cartao`( `tb_cartao_id_user`, `num_cartao`, `tipo_card`, `bandeira_cartao`, `cvc_cartao`, `tempo_validade`, `data_validade`, `situacao`, `card_novo`, `justificativa`) VALUES ('$id_user','$num_cartao','$tipo_conta','$tipo_cartao','$cvc','$anos_validade','$data_vencimento','0','0', null)";
    mysqli_query($con, $insert);

    header("location:./view/meus_cartoes.php");



?>