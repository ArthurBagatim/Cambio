<?php

/* Verificação de Login */
include('VerificacaoOn.php');

if(isset($_POST['NumeroDaOperacaoBusca'])){

  $NumeroDaOperacao = $_POST['NumeroDaOperacaoBusca'];

}else{

  $_SESSION['UltimaAcao'] = 'Não Foi Possível Encontrar a Operação';
  header('Location: SelecionarOperacao.php');

}

  /* Selecionando Dados da Operação */
$selecionar = "SELECT * FROM `MauaOperacoes` where NumeroDaOperacao = $NumeroDaOperacao";

$dados = mysqli_query($conn, $selecionar);

  /* Dados */
while($row = mysqli_fetch_assoc($dados)){

  $Data = $row['Data'];
  $Cliente = $row['Cliente'];
  $CNPJ_CPF = $row['CNPJ_CPF'];
  $OperadorResponsavel = $row['OperadorResponsavel'];
  $Banco = $row['Banco'];
  $BancoCNPJ = $row['BancoCNPJ'];
  $Natureza = $row['Natureza'];
  $Comissao = $row['Comissao']*100 . ' %';
  $Comercial = $row['Comercial'];
  $Equipe = $row['Equipe'];
  $Moeda = $row['Moeda'];
  $Valor = $Moeda . ' ' . number_format($row['Valor'], 2, ',', '.');
  $Spot = number_format($row['Spot'], 4, ',', '.');
  $Spread = number_format(($row['Spread']*100), 4, ',', '.');
  $TaxaFinal = number_format($row['TaxaFinal'], 4, ',', '.');
  $TarifaBanco = 'R$ ' . number_format($row['TarifaBanco'], 2, ',', '.') . '/Banco';
  $TarifaCobrada = 'R$ ' . number_format($row['TarifaCobrada'], 2, ',', '.') . '/Cobrado';
  $ValorEmDolar = 'USD ' . number_format($row['ValorEmDolar'], 2, ',', '.');
  $IDdoContrato = $row['IDdoContrato'];
  $NumerodaConta = $row['NumerodaConta'];
  $OperadorResponsavelEmail = $row['OperadorResponsavelEmail'];
  $TipoDeOperacao = $row['TipoDeOperacao'];
  $UserNameRegistro = $row['UserNameRegistro'];
  $DataRegistro = $row['DataRegistro'];
  $UsuarioRegistro = $row['UsuarioRegistro'];
  $NomedoPais = $row['NomedoPais'];
  $BancoEstrangeiro = $row['BancoEstrangeiro'];
  $ContaBancoEstrangeiro = $row['ContaBancoEstrangeiro'];
  $CodigoSWIFT = $row['CodigoSWIFT'];

}

  /* Selecionando Dados do Cliente */
$selecionar = "SELECT * FROM `MauaClientes` where Cliente = '$Cliente'";

$dados = mysqli_query($conn, $selecionar);

  /* Dados */
while($row = mysqli_fetch_assoc($dados)){

  if(isset($row['PFPJ'])){

  $Telefone = $row['Telefone'];
  $Whatsapp = $row['Whatsapp'];
  $ResponsavelPelaOperacao = $row['ResponsavelPelaOperacao'];
  $Email = $row['Email'];
  $Site = $row['Site'];

  }else{

  $_SESSION['UltimaAcao'] = 'Erro ao Encontrar Cliente';
  header('Location: Dashboard.php');

  }

}


?>