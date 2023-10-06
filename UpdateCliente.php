<?php

/* Banco de Dados */
include('conexao.php');

$Cliente = $_POST['Cliente'];
$PFPJ = $_POST['PFPJ'];
$CNPJ_CPF = $_POST['CNPJ_CPF'];
$ResponsavelPelaOperacao = $_POST['ResponsavelPelaOperacao'];
$Estado = $_POST['Estado'];
$Cidade = $_POST['Cidade'];
$Cep = $_POST['Cep'];
$Endereco = $_POST['Endereco'];
$SetordeAtuacao = $_POST['SetordeAtuacao'];
$Banco = $_POST['Banco'];
$BancoCNPJ = $_POST['BancoCNPJ'];
$TarifaBanco = $_POST['TarifaBanco'];
$NumerodaConta = $_POST['NumerodaConta'];
$Banco_2 = $_POST['Banco_2'];
$BancoCNPJ_2 = $_POST['Banco_2CNPJ'];
$TarifaBanco_2 = $_POST['TarifaBanco_2'];
$NumerodaContaBanco_2 = $_POST['NumerodaContaBanco_2'];
$Natureza = $_POST['Natureza'];
$TipoDeOperacao = $_POST['TipoDeOperacao'];
if(preg_match('/[^a-zA-Z@.]/', $_POST['Comissao'])){

    $Comissao = $_POST['Comissao']/100;

}
$Comercial = $_POST['Comercial'];
$Telefone = $_POST['Telefone'];
$Whatsapp = $_POST['Whatsapp'];
$Equipe = $_POST['Equipe'];
$Observacoes = $_POST['Observacoes'];
$Email = $_POST['Email'];
$Site = $_POST['Site'];

// Verificando Se Comissão Está Inserido Correto
if(isset($Comissao) && $Comissao > 0 && $Natureza != 'Natureza operação'){

    /* Atualizando Dados */
    $atualizandodados = "UPDATE EmpresaClientes SET PFPJ = '$PFPJ' , CNPJ_CPF = '$CNPJ_CPF' , 
    ResponsavelPelaOperacao = '$ResponsavelPelaOperacao' , Estado = '$Estado' , Cidade = '$Cidade' , Cep = '$Cep' , Endereco = '$Endereco' ,
    SetordeAtuacao = '$SetordeAtuacao' , Banco = '$Banco' , BancoCNPJ = '$BancoCNPJ' , TarifaBanco = '$TarifaBanco' , 
    NumerodaConta = '$NumerodaConta' , Banco_2 = '$Banco_2' , Banco_2CNPJ = '$BancoCNPJ_2' , TarifaBanco_2 = '$TarifaBanco_2' , NumerodaContaBanco_2 = '$NumerodaContaBanco_2' ,
    Natureza = '$Natureza' , TipoDeOperacao = '$TipoDeOperacao' , Comissao = '$Comissao' , Comercial = '$Comercial' , Telefone = '$Telefone' ,
    Whatsapp = '$Whatsapp' , Equipe = '$Equipe' , Observacoes = '$Observacoes' , Email = '$Email' , `Site` = '$Site'
    WHERE Cliente = '$Cliente'";

}

if(isset($atualizandodados) && mysqli_query($conn, $atualizandodados)){

    $_SESSION['UltimaAcao'] = 'Cliente Atualizado Com Sucesso';
    header('Location: Dashboard.php');

}else{

    $_SESSION['Cliente'] = $_POST['Cliente'];
    $_SESSION['PFPJ'] = $_POST['PFPJ'];
    $_SESSION['CNPJ_CPF'] = $_POST['CNPJ_CPF'];
    $_SESSION['ResponsavelPelaOperacao'] = $_POST['ResponsavelPelaOperacao'];
    $_SESSION['Estado'] = $_POST['Estado'];
    $_SESSION['Cidade'] = $_POST['Cidade'];
    $_SESSION['Cep'] = $_POST['Cep'];
    $_SESSION['Endereco'] = $_POST['Endereco'];
    $_SESSION['SetordeAtuacao'] = $_POST['SetordeAtuacao'];
    $_SESSION['Banco'] = $_POST['Banco'];
    $_SESSION['BancoCNPJ'] = $_POST['BancoCNPJ'];
    $_SESSION['TarifaBanco'] = $_POST['TarifaBanco'];
    $_SESSION['NumerodaConta'] = $_POST['NumerodaConta'];
    $_SESSION['Banco_2'] = $_POST['Banco_2'];;
    $_SESSION['BancoCNPJ_2'] = $_POST['BancoCNPJ_2'];
    $_SESSION['TarifaBanco_2'] = $_POST['TarifaBanco_2'];
    $_SESSION['NumerodaContaBanco_2'] = $_POST['NumerodaContaBanco_2'];
    $_SESSION['Natureza'] = $_POST['Natureza'];
    $_SESSION['TipoDeOperacao'] = $_POST['TipoDeOperacao'];
    $_SESSION['Comissao'] = $_POST['Comissao'];
    $_SESSION['Comercial'] = $_POST['Comercial'];
    $_SESSION['Telefone'] = $_POST['Telefone'];
    $_SESSION['Whatsapp'] = $_POST['Whatsapp'];
    $_SESSION['Equipe'] = $_POST['Equipe'];
    $_SESSION['Observacoes'] = $_POST['Observacoes'];
    $_SESSION['Email'] = $_POST['Email'];
    $_SESSION['Site'] = $_POST['Site'];
    $_SESSION['UltimaAcao'] = 'Falha ao Registrar Cliente';
    header('Location: EditarCliente.php');

}

?>