<?php

include('conexao.php');

$NumeroDaOperacaoBusca = $_POST['NumeroDaOperacaoBusca'];
$IDdoContrato = $_POST['IDdoContrato'];

$excluir = "DELETE FROM EmpresaOperacoes WHERE NumeroDaOperacao = '$NumeroDaOperacaoBusca'";

if (mysqli_query($conn, $excluir)){

    $_SESSION['UltimaAcao'] = 'Operação Excluida Com Sucesso!';
    header('Location: Dashboard.php');

}else{

    $_SESSION['UltimaAcao'] = 'Falha na Exclusão!';
    header('Location: Dashboard.php');

}

?>