<?php

/* Verificação de Login */
include('VerificacaoOn.php');

/* Selecionando Cliente */
$selecionar = "SELECT * FROM EmpresaClientes WHERE Cliente = '$Cliente'";

$query = mysqli_query($conn, $selecionar);

$row = mysqli_fetch_assoc($query);

if(isset($row['CNPJ_CPF'])){

  $CNPJ_CPF = $row['CNPJ_CPF'];
  $ResponsavelPelaOperacao = $row['ResponsavelPelaOperacao'];
  $Telefone = $row['Telefone'];
  $Whatsapp = $row['Whatsapp'];
  $Banco = $row['Banco'];
  $BancoCNPJ = $row['BancoCNPJ'];
  $TarifaBanco = $row['TarifaBanco'];
  $Banco_2 = $row['Banco_2'];
  $BancoCNPJ_2 = $row['Banco_2CNPJ'];
  $TarifaBanco_2 = $row['TarifaBanco_2'];
  $NumerodaConta = $row['NumerodaConta'];
  $NumerodaContaBanco_2 = $row['NumerodaContaBanco_2'];
  $Comissao = $row['Comissao'];
  $Comercial = $row['Comercial'];
  $Observacoes = $row['Observacoes'];
  $SetordeAtuacao = $row['SetordeAtuacao'];
  $Email = $row['Email'];
  $Site = $row['Site'];

}

// Puxando Mes e Ano Anterior
$MesAnterior = date("Y-m-d", strtotime('-1 month'));
$AnoAnterior = date("Y-m-d", strtotime('-1 year'));

// Mês Anterior
/* Número de Operações */
$SelecionarCliente = "SELECT COUNT(*) FROM EmpresaOperacoes WHERE Cliente = '$Cliente' AND `Data` >= '$MesAnterior'";

$query = mysqli_query($conn, $SelecionarCliente);

$row = mysqli_fetch_assoc($query);

if(isset($row['COUNT(*)'])){

  $OperacoesMesAnterior = $row['COUNT(*)'];

}

// Variaveis de Valores
$VolumeEmDolarMes = 0;
$SpreadMedioMes = 0;
$SpotMedioMes = 0;
$TaxaFinalMes = 0;
$x = 0;
$y = 0;

$SelecionarOperacoesMes = "SELECT * FROM EmpresaOperacoes WHERE Cliente = '$Cliente' AND `Data` >= '$MesAnterior'";

$query = mysqli_query($conn, $SelecionarOperacoesMes);

/* Número de Operações */
while($row = mysqli_fetch_assoc($query)){

  $VolumeEmDolarMes += $row['ValorEmDolar'];
  $SpreadMedioMes += $row["Spread"] / 100 * $row["ReceitaBruta"];
  $SpotMedioMes += $row["Spot"];
  $TaxaFinalMes += $row["TaxaFinal"];
  $x += $row["ReceitaBruta"];
  $y++;

}

if($SpreadMedioMes != 0){

  $SpreadMedioMes = $SpreadMedioMes / $x * 10000;
  $SpotMedioMes = $SpotMedioMes / $y;
  $TaxaFinalMes = $TaxaFinalMes / $y;

}

$VolumeEmDolarMes = number_format($VolumeEmDolarMes, 2, ',', '.');
$SpreadMedioMes = number_format($SpreadMedioMes, 4, ',', '.');
$SpotMedioMes = number_format($SpotMedioMes, 4, ',', '.');
$TaxaFinalMes = number_format($TaxaFinalMes, 4, ',', '.');

// Ano Anterior
/* Número de Operações */
$selecionar = "SELECT COUNT(*) FROM EmpresaOperacoes WHERE Cliente = '$Cliente' AND `Data` >= '$AnoAnterior'";

$query = mysqli_query($conn, $selecionar);

$row = mysqli_fetch_assoc($query);

if(isset($row['COUNT(*)'])){

  $OperacoesAnoAnterior = $row['COUNT(*)'];

}

// Variaveis de Valores
$VolumeEmDolarAno = 0;
$SpreadMedioAno = 0;
$SpotMedioAno = 0;
$TaxaFinalAno = 0;
$x = 0;
$y = 0;

$selecionar = "SELECT * FROM EmpresaOperacoes WHERE Cliente = '$Cliente' AND `Data` >= '$AnoAnterior'";

$query = mysqli_query($conn, $selecionar);

while($row = mysqli_fetch_assoc($query)){

  $VolumeEmDolarAno += $row['ValorEmDolar'];
  $SpreadMedioAno += $row["Spread"] / 100 * $row["ReceitaBruta"];
  $SpotMedioAno += $row["Spot"];
  $TaxaFinalAno += $row["TaxaFinal"];
  $x += $row["ReceitaBruta"];
  $y++;

}

if($SpreadMedioAno != 0){

  $SpreadMedioAno = $SpreadMedioAno / $x * 10000;
  $SpotMedioAno = $SpotMedioAno / $y;
  $TaxaFinalAno = $TaxaFinalAno / $y;

}

$VolumeEmDolarAno = number_format($VolumeEmDolarAno, 2, ',', '.');
$SpreadMedioAno = number_format($SpreadMedioAno, 4, ',', '.');
$SpotMedioAno = number_format($SpotMedioAno, 4, ',', '.');
$TaxaFinalAno = number_format($TaxaFinalAno, 4, ',', '.');

?>