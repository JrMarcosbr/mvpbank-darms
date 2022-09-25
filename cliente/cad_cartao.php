<?php
session_start();
require_once('../conexao/param.php');
// require_once("classes_banco.php");
// require_once("functions_banco.php");
// $banco = new Banco();
$id_user = $_SESSION['user_id'];
$query = "SELECT *,count(id_cartao) as qtd_cartoes FROM tb_cartao WHERE tb_cartao_id_user = $id_user";
$sql = mysqli_query($con, $query);
$row_cli = mysqli_num_rows($sql);
if ($row_cli > 0) {
    while ($value = mysqli_fetch_assoc($sql)) {
        $qtd_cartoes = $value['qtd_cartoes'];
        if($qtd_cartoes < 7){
            $nome = $_POST['nome'];
            $num = $_POST['num_cartao'];
            $cvc = $_POST['cvc'];
            $tipo_conta = $_POST['tipo_conta'];
            $bandeira = $_POST['bandeira_cartao'];
            $anos_validade = $_POST['anos_validade'];
            $data_vencimento = $_POST['data'];
            if($value['num_cartao'] == $num){
                header('location: view/cadastrar_cartao.php?erro=1');
            }elseif($value['cvc_cartao'] == $cvc){
                header('location: view/cadastrar_cartao.php?erro=2');
            }else{
                $insert = "INSERT INTO `tb_cartao`( `tb_cartao_id_user`, `num_cartao`, `tipo_card`, `bandeira_cartao`, `cvc_cartao`, `tempo_validade`, `data_validade`, `situacao`, `card_novo`, `justificativa`) VALUES ('$id_user','$num','$tipo_conta','$bandeira','$cvc','$anos_validade','$data_vencimento','0','1',null)";
                //echo $insert;
                mysqli_query($con, $insert);
                header('location: view/meus_cartoes.php');
            }
        }else{
            header('location: view/cadastrar_cartao.php?erro=3');
        }
    }
}else{
    header('location: view/cadastrar_cartao.php?erro');
}
?>