<?php

/* Banco de Dados */
include('conexao.php');

$Erro = 0;
$_SESSION['UltimaAcao'] = '';

$UserNameRegistro = $_SESSION['UserName'];
$UsuarioRegistro = $_SESSION['UserEmail'];
$DataRegistro = date("Y-m-d");

$Data = $_POST['Data'];
$Cliente = $_POST['Cliente'];
$CNPJ_CPF = $_POST['CNPJ_CPF'];
$OperadorResponsavel = $_POST['OperadorResponsavel'];

// Selecionando E-mail do Responsavel Pela Operação
$query = "SELECT * FROM `Login` where UserName_Empresa_secure = '$OperadorResponsavel'";

$dados = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($dados);

if(isset($row['Usuario_Empresa_secure'])){

    $OperadorResponsavelEmail = $row['Usuario_Empresa_secure'];

}else{

    $Erro++;
    $_SESSION['UltimaAcao'] = 'Não Foi Possível Identificar o Usuário' 
    . '\n' . $_SESSION['UltimaAcao'] . '\n' . 'Número de Erros: ' . $Erro;

}

// Dados Recebidos
$Banco = $_POST['Banco'];
$BancoCNPJ = $_POST['BancoCNPJ'];
$Natureza = $_POST['Natureza'];
$ComissaoBanco = $_POST['ComissaoBanco'];
$Comercial = $_POST['Comercial'];
$Equipe = $_POST['Equipe'];
$Moeda = $_POST['Moeda'];
$Valor = $_POST['Valor'];
$Spot = $_POST['Spot'];
$TaxaFinal = $_POST['TaxaFinal'];
$TarifaBanco = $_POST['TarifaBanco'];
$TarifaCobrada = $_POST['TarifaCobrada'];
$EquivalenciaDoDolar = $_POST['EquivalenciaDoDolar'];
$IDdoContrato = $_POST['IDdoContrato'];
$NumerodaConta = $_POST['NumerodaConta'];
$NomedoPais = $_POST['NomedoPais'];
$BancoEstrangeiro = $_POST['BancoEstrangeiro'];
$ContaBancoEstrangeiro = $_POST['ContaBancoEstrangeiro'];
$CodigoSWIFT = $_POST['CodigoSWIFT'];

// Dados Salvos Para Caso de Erro
$_SESSION['Cliente'] = $Cliente;
$_SESSION['CNPJ_CPF'] = $CNPJ_CPF;
$_SESSION['Data'] = $Data;
$_SESSION['OperadorResponsavel'] = $OperadorResponsavel;
$_SESSION['Banco'] = $Banco;
$_SESSION['BancoCNPJ'] = $BancoCNPJ;
$_SESSION['Natureza'] = $Natureza;
$_SESSION['ComissaoBanco'] = $ComissaoBanco;
$_SESSION['Moeda'] = $Moeda;
$_SESSION['Valor'] = $Valor;
$_SESSION['Spot'] = $Spot;
$_SESSION['TaxaFinal'] = $TaxaFinal;
$_SESSION['TarifaBanco'] = $TarifaBanco;
$_SESSION['TarifaCobrada'] = $TarifaCobrada;
$_SESSION['EquivalenciaDoDolar'] = $EquivalenciaDoDolar;
$_SESSION['IDdoContrato'] = $IDdoContrato;
$_SESSION['NumerodaConta'] = $NumerodaConta;
$_SESSION['NomedoPais'] = $NomedoPais;
$_SESSION['BancoEstrangeiro'] = $BancoEstrangeiro;
$_SESSION['ContaBancoEstrangeiro'] = $ContaBancoEstrangeiro;
$_SESSION['CodigoSWIFT'] = $CodigoSWIFT;


if(isset($_FILES["arquivo"])){

    $_SESSION['Arquivo'] = $_FILES["arquivo"];

    $IDdoContrato = $_POST['IDdoContrato'];

    $nome_arquivo = $_FILES['arquivo'];

    // Diretorio Onde Sera Salvo
    $diretorio = 'ContratoCambioPDF/';

    // Nome do Arquivo no Servidor
    $NomeFinal = $IDdoContrato . '.pdf';

    // Local do Arquivo
    $Local = $diretorio . $NomeFinal;

    // Verificando se o Diretorio Existe
    if(!file_exists($diretorio)){

        // Criando Diretorio
        mkdir($diretorio, 0755);

    }

}

// Limpeza de Dados
$ComissaoBanco = preg_replace('/[^0-9]/', "", $ComissaoBanco);
$Valor = preg_replace('/[^0-9]/', "", $Valor);
$Spot = preg_replace('/[^0-9]/', "", $Spot);
$TaxaFinal = preg_replace('/[^0-9]/', "", $TaxaFinal);
$TarifaBanco = preg_replace('/[^0-9]/', "", $TarifaBanco);
$TarifaCobrada = preg_replace('/[^0-9]/', "", $TarifaCobrada);
$EquivalenciaDoDolar = preg_replace('/[^0-9]/', "", $EquivalenciaDoDolar);

// Verificando Campo de Valores
if(0 < $ComissaoBanco and 0 < $Valor and 0 < $Spot and 0 < $TaxaFinal and 0 < $TarifaBanco and 0 <= $TarifaCobrada and 0 < $EquivalenciaDoDolar){

    $Valor = $Valor/100;
    $TaxaFinal = $TaxaFinal / 10000;
    $TaxaFinal = number_format($TaxaFinal, 4);
    $Spot = $Spot / 10000;
    $Spot = number_format($Spot, 4);
    $TarifaCobrada = $TarifaCobrada / 100;
    $TarifaCobrada = number_format($TarifaCobrada, 2, ".", "");
    $TarifaBanco = $TarifaBanco / 100;
    $TarifaBanco = number_format($TarifaBanco, 2, ".", "");
    $ComissaoBanco = $ComissaoBanco / 100;
    $ComissaoBanco = number_format($ComissaoBanco, 2);
    $EquivalenciaDoDolar = $EquivalenciaDoDolar / 100;
    $EquivalenciaDoDolar = number_format($EquivalenciaDoDolar, 2, ".", "");

    // Calculos
    $ValorReais = $Valor*$TaxaFinal;

    if($Spot < $TaxaFinal){

        $Spread = ($TaxaFinal-$Spot)/$Spot;

    }else{

        $Spread = ($Spot-$TaxaFinal)/$TaxaFinal;

    }

    $Spread = number_format($Spread, 4);

    if($Spot < $TaxaFinal){

        $ReceitaBruta = (($TaxaFinal-$Spot)*$Valor)+$TarifaCobrada;

    }else{

        $ReceitaBruta = (($Spot-$TaxaFinal)*$Valor)+$TarifaCobrada;

    }

    $ReceitaPIS = $ReceitaBruta-($ReceitaBruta*0.0465);
    $ReceitaPISTarifa = $ReceitaPIS-$TarifaBanco;
    $ReceitaFinal = ($ReceitaPISTarifa*($ComissaoBanco));
    $ValorEmDolar = $Valor*$EquivalenciaDoDolar;
    $SpotEmDolar = $Spot*$EquivalenciaDoDolar;
    $TaxaFinalEmDolar = $TaxaFinal*$EquivalenciaDoDolar;

    $Valor = number_format($Valor, 2, ".", "");
    $ValorReais = number_format($ValorReais, 2, ".", "");
    $ReceitaBruta = number_format($ReceitaBruta, 2, ".", "");
    $ReceitaPIS = number_format($ReceitaPIS, 2, ".", "");
    $ReceitaPISTarifa = number_format($ReceitaPISTarifa, 2, ".", "");
    $ReceitaFinal = number_format($ReceitaFinal, 2, ".", "");
    $ValorEmDolar = number_format($ValorEmDolar, 2, ".", "");

}else{

    $Erro++;
    $_SESSION['UltimaAcao'] = 'Há Campos de Valores Vazios' 
    . '\n' . $_SESSION['UltimaAcao'] . '\n' . 'Número de Erros: ' . $Erro;

}

// Verificando Natureza
if($Natureza == 'Importação' or $Natureza == 'Financeiro Venda'){

    $TipoDeOperacao = 'Venda';

}else if($Natureza == 'Exportação' or $Natureza == 'Financeiro Compra'){

    $TipoDeOperacao = 'Compra';

}else{

    $Erro++;
    $_SESSION['UltimaAcao'] = 'Erro na Natureza' 
    . '\n' . $_SESSION['UltimaAcao'] . '\n' . 'Número de Erros: ' . $Erro;

}

// Verificando se os Dados Estão Corretos Para Inserir
if($Erro === 0){

    $inserirdados = "
    INSERT INTO EmpresaOperacoes Values
    (NOT NULL,'$Data','$Cliente','$CNPJ_CPF','$OperadorResponsavel','$Banco','$BancoCNPJ','$Natureza','$ComissaoBanco',
    '$Comercial','$Equipe','$Moeda','$Valor','$ValorReais','$Spot','$TaxaFinal','$Spread','$TarifaBanco','$TarifaCobrada','$ReceitaBruta',
    '$ReceitaPIS','$ReceitaPISTarifa','$ReceitaFinal','$TipoDeOperacao','$EquivalenciaDoDolar','$ValorEmDolar','$IDdoContrato','$NumerodaConta',
    '$OperadorResponsavelEmail','$SpotEmDolar','$TaxaFinalEmDolar','$UserNameRegistro','$DataRegistro','$UsuarioRegistro','$NomedoPais',
    '$BancoEstrangeiro','$ContaBancoEstrangeiro','$CodigoSWIFT')";

}

// Inserindo Dados se Estiverem Corretos
if(isset($inserirdados)){

    mysqli_query($conn, $inserirdados);
    
    // Upload do Arquivo PDF
    move_uploaded_file($nome_arquivo['tmp_name'], $diretorio . $NomeFinal);

    // Inserindo Dados
    if(file_exists($Local)){
            
        $_SESSION['UltimaAcao'] = 'Arquivo Inserido Com Sucesso' 
        . '\n' . $_SESSION['UltimaAcao'];

    }

    // Mensagem de Sucesso
    $_SESSION['UltimaAcao'] = 'Dados Inserido Com Sucesso' 
    . '\n' . $_SESSION['UltimaAcao'];
    header('Location: Dashboard.php');

}else{

    $_SESSION['UltimaAcao'] = 'Não Foi Possível Inserir os Dados' 
    . '\n' . $_SESSION['Arquivo'] . '\n' . $_SESSION['UltimaAcao'] . '\n';
    header('Location: RegistrarOperacao.php');

}

?>