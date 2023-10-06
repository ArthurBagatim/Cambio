<?php

/* Banco de Dados */
include('conexao.php');

$Nome = $_POST['Nome'];
$CNPJBanco = $_POST['CNPJBanco'];
$Tarifa = $_POST['Tarifa'];
$ComissaoBanco = $_POST['ComissaoBanco'];
$Status = $_POST['Status'];
$Tarifa = preg_replace('/[R$ ]/', "", $Tarifa);
$ComissaoBanco = preg_replace('/[% ]/', "", $ComissaoBanco);
$Tarifa = preg_replace('/[,]/', ".", $Tarifa);
$ComissaoBanco = (preg_replace('/[,]/', ".", $ComissaoBanco))/100;

// Verificando Se Comissão Está Inserido Correto
if($Nome != "" and $CNPJBanco != "" and $Tarifa != "" and $Tarifa > 0 and $ComissaoBanco != "" and $ComissaoBanco > 0){

    /* Atualizando Dados */
    $atualizandodados = "UPDATE EmpresaBancos SET Tarifa = '$Tarifa' , ComissaoBanco = '$ComissaoBanco' , `Status` = '$Status'
    WHERE Nome = '$Nome' AND CNPJBanco = '$CNPJBanco'";


}if(isset($atualizandodados) && mysqli_query($conn, $atualizandodados)){

    $_SESSION['UltimaAcao'] = 'Banco Atualizado Com Sucesso';
    header('Location: Dashboard.php');

}else{

    $_SESSION['Nome'] = $_POST['Nome'];
    $_SESSION['CNPJBanco'] = $_POST['CNPJBanco'];
    $_SESSION['Tarifa'] = $_POST['Tarifa'];
    $_SESSION['ComissaoBanco'] = $_POST['ComissaoBanco'];
    $_SESSION['Status'] = $_POST['Status'];

    $_SESSION['UltimaAcao'] = 'Falha ao Atualizar Banco';
    header('Location: EditarBanco.php');

}

?>