<?php

/* Banco de Dados */
include('conexao.php');

$Data = $_POST['Data'];
$Cliente = $_POST['Cliente'];
$PFPJ = $_POST['PFPJ'];
$CNPJdaEmpresa = $_POST['CNPJdaEmpresa'];
$ResponsavelPelaOperacao = $_POST['ResponsavelPelaOperacao'];
$Estado = $_POST['Estado'];
$Cidade = $_POST['Cidade'];
$Cep = $_POST['Cep'];
$Endereco = $_POST['Endereco'];
$SetordeAtuacao = $_POST['SetordeAtuacao'];
$Banco = $_POST['Banco'];
$Natureza = $_POST['Natureza'];
$Comissao = $_POST['Comissao'];
$Comercial = $_POST['Comercial'];
$Equipe = $_POST['Equipe'];
$Moeda = $_POST['Moeda'];
$Valor = $_POST['Valor'];
$Spot = $_POST['Spot'];
$TaxaFinal = $_POST['TaxaFinal'];
$TarifaBanco = $_POST['TarifaBanco'];
$TarifaCobrada = $_POST['TarifaCobrada'];
$TipoDeOperação = $_POST['TipoDeOperação'];
$EquivalenciaDoDolar = $_POST['EquivalenciaDoDolar'];

// Calculos
$ValorReais = $Valor*$TaxaFinal;

if($Spot < $TaxaFinal){

    $Spread = ($TaxaFinal-$Spot)/$Spot;

}else{

    $Spread = ($Spot-$TaxaFinal)/$TaxaFinal;

}

$ReceitaBruta = (($TaxaFinal-$Spot)*$Valor)+$TarifaCobrada;
$ReceitaPIS = $ReceitaBruta-($ReceitaBruta*4.65/100);
$ReceitaPISTarifa = $ReceitaPIS-$TarifaBanco;
$ReceitaFinal = ($ReceitaPISTarifa*$Comissao);
$ValorEmDolar = $Valor/$EquivalenciaDoDolar;

/* Inserindo Dados */
$inserirdados = "
INSERT INTO EmpresaOperacoes Values
(NOT NULL,'$Data','$Cliente','$PFPJ','$CNPJdaEmpresa','$ResponsavelPelaOperacao','$Estado','$Cidade','$Cep',
'$Endereco','$SetordeAtuacao','$Banco','$Natureza','$Comissao','$Comercial','$Equipe','$Moeda','$Valor',
'$ValorReais','$Spot','$TaxaFinal','$Spread','$TarifaBanco','$TarifaCobrada','$ReceitaBruta',
'$ReceitaPIS','$ReceitaPISTarifa','$ReceitaFinal','$TipoDeOperação','$EquivalenciaDoDolar','$ValorEmDolar')";

if (mysqli_query($conn, $inserirdados)){

    $_SESSION['inserirBD'] = 'Dados Inserido Com Sucesso<br>';
    header('Location: Dados.php');

}else{

    $_SESSION['inserirBD'] = 'Falhou<br>';
    header('Location: Dados.php');

}

?>