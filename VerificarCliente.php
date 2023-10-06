<?php

// Verificando se Foi Buscado um Cliente
if(isset($_POST['BuscarNomeDoCliente'])){

    $Cliente = $_POST['BuscarNomeDoCliente'];

}else if(isset($_POST['BuscarCNPJ_CPF'])){
            
    $CNPJ_CPF = $_POST['BuscarCNPJ_CPF'];
                    
    $query = "SELECT * FROM `EmpresaClientes` WHERE `CNPJ_CPF` = '$CNPJ_CPF'";

    $dados = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($dados);

    if(isset($row['Cliente'])){

        $Cliente = $row['Cliente'];

    }else{

        $_SESSION['UltimaAcao'] = 'Não Foi Possível Encontrar o Cliente';
        header('Location: Dashboard.php');

    }

}

// Verificando se Houve Erro na Ultima Operação
if(isset($_SESSION['Cliente'])){

    $Cliente = $_SESSION['Cliente'];

    unset($_SESSION['Cliente']);

    if($Cliente == ''){

        $_SESSION['UltimaAcao'] = 'Erro ao Puxar Dados';
        header('Location: Dashboard.php');
    
    }
    
}

// Redirecionando Para o Começo se Não Identificar Cliente
if(!isset($Cliente) or $Cliente == '' and $CNPJ_CPF == ''){

    $_SESSION['UltimaAcao'] = 'Não há Cliente Selecionado';
    header('Location: Dashboard.php');

}

?>