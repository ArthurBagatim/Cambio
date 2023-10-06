<?php

/* Banco de Dados */
include('conexao.php');

$Erro = 0;
$_SESSION['UltimaAcao'] = '';

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
$BancoCNPJ_2 = $_POST['BancoCNPJ_2'];
$TarifaBanco_2 = $_POST['TarifaBanco_2'];
$NumerodaContaBanco_2 = $_POST['NumerodaContaBanco_2'];
$Natureza = $_POST['Natureza'];
$TipoDeOperacao = $_POST['TipoDeOperacao'];
$ComissaoBanco = preg_replace('/[^0-9]/', "", $_POST['ComissaoBanco']);
$Comercial = $_POST['Comercial'];
$Telefone = $_POST['Telefone'];
$Whatsapp = $_POST['Whatsapp'];
$Equipe = $_POST['Equipe'];
$Observacoes = $_POST['Observacoes'];
$Email = $_POST['Email'];
$Site = $_POST['Site'];

if($Natureza == 'Importação' or $Natureza == 'Financeiro Venda'){

    $TipoDeOperacao = 'Venda';

}else if($Natureza == 'Exportação' or $Natureza == 'Financeiro Compra'){

    $TipoDeOperacao = 'Compra';

}else{

    $_SESSION['UltimaAcao'] = 'Erro na Natureza' . '\n' . $_SESSION['UltimaAcao'];
    $Erro++;

}

// Verificando Se Comissão Está Inserido Correto
if(isset($ComissaoBanco) && $ComissaoBanco > 0){

    /* Inserindo Dados */
    $inserirdados = "
    INSERT INTO EmpresaClientes Values
    ('$Cliente','$PFPJ','$CNPJ_CPF','$ResponsavelPelaOperacao','$Estado','$Cidade','$Cep','$Endereco','$SetordeAtuacao','$Banco','$BancoCNPJ',
    '$TarifaBanco','$Banco_2','$BancoCNPJ_2','$TarifaBanco_2','$NumerodaConta','$NumerodaContaBanco_2','$Natureza','$TipoDeOperacao','$ComissaoBanco','$Comercial',
    '$Telefone','$Whatsapp','$Equipe','$Observacoes','$Email','$Site','Ativo')";

}else{

    $_SESSION['UltimaAcao'] = 'Erro nos Dados do Banco' . '\n' . $_SESSION['UltimaAcao'];
    $Erro++;

}

if(isset($inserirdados) && $Erro === 0){

    mysqli_query($conn, $inserirdados);
    $_SESSION['UltimaAcao'] = 'Cliente Registrado Com Sucesso';
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
    $_SESSION['ComissaoBanco'] = $_POST['ComissaoBanco'];
    $_SESSION['Comercial'] = $_POST['Comercial'];
    $_SESSION['Telefone'] = $_POST['Telefone'];
    $_SESSION['Whatsapp'] = $_POST['Whatsapp'];
    $_SESSION['Equipe'] = $_POST['Equipe'];
    $_SESSION['Observacoes'] = $_POST['Observacoes'];
    $_SESSION['Email'] = $_POST['Email'];
    $_SESSION['Site'] = $_POST['Site'];
    $_SESSION['UltimaAcao'] = 'Falha ao Registrar Cliente' 
    . '\n' . $_SESSION['UltimaAcao'] . '\n' . 'Número de Erros: ' . $Erro;
    header('Location: RegistrarCliente.php');

}

?>