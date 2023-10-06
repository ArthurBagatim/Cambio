<?php

/* Verificação de Login */
include('VerificacaoOn.php');

if(isset($_POST['NumeroDaOperacaoBusca'])){

  $NumeroDaOperacao = $_POST['NumeroDaOperacaoBusca'];

}else{

  header('Location: SelecionarOperacao.php');

}

  /* Selecionando Dados da Operação */
$selecionar = "SELECT * FROM `EmpresaOperacoes` where NumeroDaOperacao = $NumeroDaOperacao";

$dados = mysqli_query($conn, $selecionar);

  /* Dados */
while($row = mysqli_fetch_assoc($dados)){

  if(isset($row['CNPJ_CPF'])){

    $Data = $row['Data'];
    $Cliente = $row['Cliente'];
    $CNPJ_CPF = $row['CNPJ_CPF'];
    $OperadorResponsavel = $row['OperadorResponsavel'];
    $Banco = $row['Banco'];
    $Natureza = $row['Natureza'];
    $Comercial = $row['Comercial'];
    $Equipe = $row['Equipe'];
    $Moeda = $row['Moeda'];
    $Valor = $Moeda . ' ' . number_format($row['Valor'], 2, ',', '.');
    $Spot = 'R$ ' . number_format($row['Spot'], 4, ',', '.');
    $TaxaFinal = 'R$ ' . number_format($row['TaxaFinal'], 4, ',', '.');
    $TarifaCobrada = number_format($row['TarifaCobrada'], 2, ',', '.');
    $EquivalenciaDoDolar = $Moeda . ' ' . number_format($row['EquivalenciaDoDolar'], 2, ',', '.');
    $IDdoContrato = $row['IDdoContrato'];
    $NumerodaConta = $row['NumerodaConta'];
    $NomedoPais = $row['NomedoPais'];
    $BancoEstrangeiro = $row['BancoEstrangeiro'];
    $ContaBancoEstrangeiro = $row['ContaBancoEstrangeiro'];
    $CodigoSWIFT = $row['CodigoSWIFT'];

  }else{

    $_SESSION['UltimaAcao'] = 'Não Foi Possível Selecionar os Dados';
    header('Location: Dashboard.php');

  }

}

    
  /* Selecionando Dados do Cliente */
$selecionar = "SELECT * FROM `EmpresaClientes` where Cliente = '$Cliente'";

$dados = mysqli_query($conn, $selecionar);

  /* Dados */
while($row = mysqli_fetch_assoc($dados)){

  if(isset($row['Telefone'])){

    $PFPJ = $row['PFPJ'];
    $Telefone = $row['Telefone'];
    $Whatsapp = $row['Whatsapp'];
    $Estado = $row['Estado'];
    $Cidade = $row['Cidade'];
    $Endereco = $row['Endereco'];
    $Cep = $row['Cep'];
    $SetordeAtuacao = $row['SetordeAtuacao'];
    $ResponsavelPelaOperacao = $row['ResponsavelPelaOperacao'];

  }else{

  $_SESSION['Erro'] = 1;
  header('Location: Dashboard.php');

  }

}


  // Puxando Ultimas Operações do Cliente
$query = "SELECT * FROM `EmpresaOperacoes` WHERE `CNPJ_CPF` = '$CNPJ_CPF' ORDER BY `NumeroDaOperacao` DESC limit 6";

$dados = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($dados);

$Data = date("Y-m-d");

if(isset($_SESSION['UltimaAcao'])){

  $Arquivo = $_SESSION['Arquivo'];
  $Data = $_SESSION['Data'];
  $OperadorResponsavel = $_SESSION['OperadorResponsavel'];
  $Natureza = $_SESSION['Natureza'];
  $Comissao = $_SESSION['Comissao'];
  $Moeda = $_SESSION['Moeda'];
  $Valor = $_SESSION['Valor'];
  $Spot = $_SESSION['Spot'];
  $TaxaFinal = $_SESSION['TaxaFinal'];
  $TarifaBanco = $_SESSION['TarifaBanco'];
  $TarifaCobrada = $_SESSION['TarifaCobrada'];
  $TipoDeOperacao = $_SESSION['TipoDeOperacao'];
  $EquivalenciaDoDolar = $_SESSION['EquivalenciaDoDolar'];
  $IDdoContrato = $_SESSION['IDdoContrato'];
  $NumerodaConta = $_SESSION['NumerodaConta'];
  $NomedoPais = $_SESSION['NomedoPais'];
  $BancoEstrangeiro = $_SESSION['BancoEstrangeiro'];
  $ContaBancoEstrangeiro = $_SESSION['ContaBancoEstrangeiro'];
  $CodigoSWIFT = $_SESSION['CodigoSWIFT'];

  $UltimaAcao = $_SESSION['UltimaAcao'];
  
  unset($_SESSION['UltimaAcao']);
  unset($_SESSION['Arquivo']);
  unset($_SESSION['Cliente']);
  unset($_SESSION['Data']);
  unset($_SESSION['OperadorResponsavel']);
  unset($_SESSION['Banco']);
  unset($_SESSION['BancoCNPJ']);
  unset($_SESSION['Natureza']);
  unset($_SESSION['Comissao']);
  unset($_SESSION['Moeda']);
  unset($_SESSION['Valor']);
  unset($_SESSION['Spot']);
  unset($_SESSION['TaxaFinal']);
  unset($_SESSION['TarifaBanco']);
  unset($_SESSION['TarifaCobrada']);
  unset($_SESSION['TipoDeOperacao']);
  unset($_SESSION['EquivalenciaDoDolar']);
  unset($_SESSION['IDdoContrato']);
  unset($_SESSION['NumerodaConta']);
  unset($_SESSION['NomedoPais']);
  unset($_SESSION['BancoEstrangeiro']);
  unset($_SESSION['ContaBancoEstrangeiro']);
  unset($_SESSION['CodigoSWIFT']);

  echo "

  <script> 
  
    alert('$UltimaAcao');
        
  </script>";
  
}

if($Natureza == ''){

  $Natureza = 'Natureza operação';

}


?>