<?php

/* Banco de Dados */
include('conexao.php');

$Banco = $_POST['Banco'];
$BancoCNPJ = $_POST['BancoCNPJ'];
$TarifaBanco = $_POST['TarifaBanco'];
$Repasse = $_POST['Repasse'];
$TarifaBanco = preg_replace('/[R$ ]/', "", $TarifaBanco);
$Repasse = preg_replace('/[% ]/', "", $Repasse);
$TarifaBanco = preg_replace('/[,]/', ".", $TarifaBanco);
$Repasse = (preg_replace('/[,]/', ".", $Repasse))/100;

// Verificando Se Comissão Está Inserido Correto
if($Banco != "" and $BancoCNPJ != "" and $TarifaBanco != "" and $TarifaBanco > 0 and $Repasse != "" and $Repasse > 0){

    /* Inserindo Dados */
    $inserirdados = "
    INSERT INTO EmpresaBancos Values
    ('$Banco','$BancoCNPJ','$TarifaBanco','$Repasse','Ativo')";

}if(isset($inserirdados) && mysqli_query($conn, $inserirdados)){
    
    $_SESSION['UltimaAcao'] = 'Banco Registrado Com Sucesso';
    header('Location: Dashboard.php');

}else{


    $_SESSION['Banco'] = $_POST['Banco'];
    $_SESSION['BancoCNPJ'] = $_POST['BancoCNPJ'];
    $_SESSION['TarifaBanco'] = $_POST['TarifaBanco'];
    $_SESSION['Repasse'] = $_POST['Repasse'];
    $_SESSION['UltimaAcao'] = 'Falha ao Registrar Banco';
    header('Location: RegistrarBanco.php');

}

?>