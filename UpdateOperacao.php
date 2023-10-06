<?php

include('conexao.php');

$Erro = 0;
$_SESSION['UltimaAcao'] = '';

$Data = $_POST['Data'];
$Cliente = $_POST['Cliente'];
$CNPJ_CPF = $_POST['CNPJ_CPF'];
$OperadorResponsavel = $_POST['OperadorResponsavel'];
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
$TipoDeOperacao = $_POST['TipoDeOperacao'];
$EquivalenciaDoDolar = $_POST['EquivalenciaDoDolar'];
$IDdoContrato = $_POST['IDdoContrato'];
$NumerodaConta = $_POST['NumerodaConta'];
$NomedoPais = $_POST['NomedoPais'];
$BancoEstrangeiro = $_POST['BancoEstrangeiro'];
$ContaBancoEstrangeiro = $_POST['ContaBancoEstrangeiro'];
$CodigoSWIFT = $_POST['CodigoSWIFT'];
// Selecionando E-mail do Responsavel Pela Operação
$query = "SELECT * FROM `Login` where UserName_Empresa_secure = '$OperadorResponsavel'";

$dados = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($dados);

if(isset($row['Usuario_Empresa_secure'])){

    $OperadorResponsavelEmail = $row['Usuario_Empresa_secure'];

}else{

    $_SESSION['UltimaAcao'] = 'Não Foi Possível Identificar o Usuário de Registro, Entre em Contato Com Um Administrador' 
    . '\n' . $_SESSION['UltimaAcao'];
    $Erro++;
    header('Location: EditarOperacao.php');

}

$NumeroDaOperacao = $_POST['NumeroDaOperacao'];

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
$_SESSION['TarifaBanco'] = preg_replace('/[R$]/', "", $TarifaBanco);
$_SESSION['TarifaCobrada'] = preg_replace('/[R$]/', "", $TarifaCobrada);
$_SESSION['TipoDeOperacao'] = $TipoDeOperacao;
$_SESSION['EquivalenciaDoDolar'] = $EquivalenciaDoDolar;
$_SESSION['IDdoContrato'] = $IDdoContrato;
$_SESSION['NumerodaConta'] = $NumerodaConta;
$_SESSION['NomedoPais'] = $NomedoPais;
$_SESSION['BancoEstrangeiro'] = $BancoEstrangeiro;
$_SESSION['ContaBancoEstrangeiro'] = $ContaBancoEstrangeiro;
$_SESSION['CodigoSWIFT'] = $CodigoSWIFT;

if(isset($_FILES["arquivo"])){

    $_SESSION['Arquivo'] = $_FILES["arquivo"]['tmp_name'];

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
        
    // Upload do Arquivo PDF
    move_uploaded_file($nome_arquivo['tmp_name'], $diretorio . $NomeFinal);

    if(file_exists($Local)){
            
        $_SESSION['UltimaAcao'] = 'Arquivo Inserido Com Sucesso' 
        . '\n' . $_SESSION['UltimaAcao'];

    }else{

        $_SESSION['UltimaAcao'] = 'Falha ao Inserir o Arquivo' 
        . '\n' . $_SESSION['UltimaAcao'];
        $Erro++;
        header('Location: EditarOperacao.php');

    }

}

// Limpando Dados

$Valor = preg_replace('/[^0-9]/', "", $Valor);
$TaxaFinal = preg_replace('/[^0-9]/', "", $TaxaFinal);
$Spot = preg_replace('/[^0-9]/', "", $Spot);
$TarifaCobrada = preg_replace('/[^0-9]/', "", $TarifaCobrada);
$TarifaBanco = preg_replace('/[^0-9]/', "", $TarifaBanco);
$ComissaoBanco = preg_replace('/[^0-9]/', "", $ComissaoBanco);
$EquivalenciaDoDolar = preg_replace('/[^0-9]/', "", $EquivalenciaDoDolar);

// Verificando se os Dados Foram Preenchidos

if(0 < $ComissaoBanco and 0 < $Valor and 0 < $Spot and 0 < $TaxaFinal and 0 < $TarifaBanco and 0 <= $TarifaCobrada and 0 < $EquivalenciaDoDolar){

    if($Natureza == 'Importação' or $Natureza == 'Financeiro Venda'){

        $TipoDeOperacao = 'Venda';

    }else if($Natureza == 'Exportação' or $Natureza == 'Financeiro Compra'){

        $TipoDeOperacao = 'Compra';

    }else{

        $_SESSION['UltimaAcao'] = 'Erro ao Identificar a Natureza' 
        . '\n' . $_SESSION['UltimaAcao'];
        $Erro++;
        header('Location: EditarOperacao.php');
        
    
    }
    
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

    $Valor = number_format($Valor, 2, ".", "");
    $ValorReais = number_format($ValorReais, 2, ".", "");
    $ReceitaBruta = number_format($ReceitaBruta, 2, ".", "");
    $ReceitaPIS = number_format($ReceitaPIS, 2, ".", "");
    $ReceitaPISTarifa = number_format($ReceitaPISTarifa, 2, ".", "");
    $ReceitaFinal = number_format($ReceitaFinal, 2, ".", "");
    $ValorEmDolar = number_format($ValorEmDolar, 2, ".", "");

    // Variavel Para Atualizar os Dados
    $AtualizarDados = "UPDATE EmpresaOperacoes SET Cliente = '$Cliente' , CNPJ_CPF = '$CNPJ_CPF' , Comercial = '$Comercial' , Banco = '$Banco' , 
    BancoCNPJ = '$BancoCNPJ' , NumerodaConta = '$NumerodaConta' , Valor = '$Valor' , TaxaFinal = '$TaxaFinal' , Spot = '$Spot' , 
    Spread = '$Spread' , TarifaCobrada = '$TarifaCobrada' , TarifaBanco = '$TarifaBanco' , Comissao = '$ComissaoBanco' , 
    EquivalenciaDoDolar = '$EquivalenciaDoDolar' , ReceitaPIS = '$ReceitaPIS' , ReceitaPISTarifa = '$ReceitaPISTarifa' , 
    ReceitaFinal = '$ReceitaFinal' , ValorEmDolar = '$ValorEmDolar' , TipoDeOperacao = '$TipoDeOperacao' , `Data` = '$Data' , Moeda = '$Moeda' , 
    Equipe = '$Equipe' , Natureza = '$Natureza' , OperadorResponsavel = '$OperadorResponsavel' , IDdoContrato = '$IDdoContrato' , 
    NomedoPais = '$NomedoPais' , BancoEstrangeiro = '$BancoEstrangeiro' , ContaBancoEstrangeiro = '$ContaBancoEstrangeiro' , 
    CodigoSWIFT = '$CodigoSWIFT'
    WHERE NumeroDaOperacao = '$NumeroDaOperacao'";

    // Verifica se a Atualização foi Certo
    if (mysqli_query($conn, $AtualizarDados)){
    
        $_SESSION['UltimaAcao'] = 'Operação Inserida Com Sucesso' 
        . '\n' . $_SESSION['UltimaAcao'];
        header('Location: Dashboard.php');
    
    }else{
    
        $_SESSION['UltimaAcao'] = 'Não Foi Possível Inserir a Operação' 
        . '\n' . $_SESSION['UltimaAcao'];
        $Erro++;
        header('Location: EditarOperacao.php');
    
    }

}else{

    $_SESSION['UltimaAcao'] = 'Há Campos Vazios' 
    . '\n' . $_SESSION['UltimaAcao'];
    $Erro++;
    header('Location: EditarOperacao.php');

}

?>