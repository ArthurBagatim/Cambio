<?php

/* Verificação de Login */
include('VerificacaoOn.php');

/* Selecionando Dados do Banco a Partir do Cliente Informado */
$query = "SELECT * FROM `EmpresaClientes` WHERE `Cliente` = '$Cliente'";

$dados = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($dados);

if(isset($row['CNPJ_CPF'])){

  $Cliente = $row['Cliente'];
  $PFPJ = $row['PFPJ'];
  $CNPJ_CPF = $row['CNPJ_CPF'];
  $ResponsavelPelaOperacao = $row['ResponsavelPelaOperacao'];
  $Estado = $row['Estado'];
  $Cidade = $row['Cidade'];
  $Cep = $row['Cep'];
  $Endereco = $row['Endereco'];
  $SetordeAtuacao = $row['SetordeAtuacao'];
  $Banco = $row['Banco'];
  $Banco_2 = $row['Banco_2'];
  $NumerodaConta = $row['NumerodaConta'];
  $Natureza = $row['Natureza'];
  $Comercial = $row['Comercial'];
  $ComercialDisabled = 'disabled';
  $Telefone = $row['Telefone'];
  $Whatsapp = $row['Whatsapp'];
  $Equipe = $row['Equipe'];

}

$Data = date("Y-m-d");

if(isset($_SESSION['UltimaAcao'])){

  $Data = $_SESSION['Data'];
  $OperadorResponsavel = $_SESSION['OperadorResponsavel'];
  $Moeda = $_SESSION['Moeda'];
  $Valor = $_SESSION['Valor'];
  $Spot = $_SESSION['Spot'];
  $TaxaFinal = $_SESSION['TaxaFinal'];
  $TarifaCobrada = $_SESSION['TarifaCobrada'];
  $EquivalenciaDoDolar = $_SESSION['EquivalenciaDoDolar'];
  $IDdoContrato = $_SESSION['IDdoContrato'];
  $NumerodaConta = $_SESSION['NumerodaConta'];
  $NomedoPais = $_SESSION['NomedoPais'];
  $BancoEstrangeiro = $_SESSION['BancoEstrangeiro'];
  $ContaBancoEstrangeiro = $_SESSION['ContaBancoEstrangeiro'];
  $CodigoSWIFT = $_SESSION['CodigoSWIFT'];

  $UltimaAcao = $_SESSION['UltimaAcao'];
  
  unset($_SESSION['UltimaAcao']);
  unset($_SESSION['Cliente']);
  unset($_SESSION['Data']);
  unset($_SESSION['OperadorResponsavel']);
  unset($_SESSION['ComissaoBanco']);
  unset($_SESSION['Moeda']);
  unset($_SESSION['Valor']);
  unset($_SESSION['Spot']);
  unset($_SESSION['TaxaFinal']);
  unset($_SESSION['TarifaCobrada']);
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
  
}else{

  $Moeda = 'Selecionar moeda';
  $Spot = '';
  $Valor = '';
  $TaxaFinal = '';
  $TarifaCobrada = '';
  $TipoDeOperacao = 'Compra/Venda';
  $EquivalenciaDoDolar = '';
  $IDdoContrato = '';
  $NumerodaConta = '';
  $NomedoPais = '';
  $BancoEstrangeiro = '';
  $ContaBancoEstrangeiro = '';
  $CodigoSWIFT =  '';

}

?>