<?php

// Banco de Dados
include('conexao.php');

if($_SESSION['NivelDeAcesso'] != 1){

	header('Location: Dashboard.php');

}

// Verificando Se os Dados Foram Preenchidos
if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['password']) and $_POST['NivelDeAcesso'] != "404"){

    // Puxando Dados 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $NivelDeAcesso = $_POST['NivelDeAcesso'];

    

    if(preg_match('/[^a-zA-Z@.]/', $email) || preg_match('/[^0-9a-zA-Z#!]/', $password)){

    $_SESSION['UltimaAcao'] = 'Há Caracteres Proibidos no Registro';
    header('Location: Dashboard.php');
  
  }

        
    // Inserindo Dados 
    $inserirdados = "
    INSERT INTO Login Values
    ('$name','$email','$password','$NivelDeAcesso')";

    if (mysqli_query($conn, $inserirdados)){

        $_SESSION['UltimaAcao'] = 'Novo Usuário Inserido com Sucesso';
        header('Location: Dashboard.php');

    }else{

        $_SESSION['UltimaAcao'] = 'Falha ao Inserir Novo Usuário';
        header('Location: Dashboard.php');

    }

}else{

    // Voltando Caso der Erro
    $_SESSION['UltimaAcao'] = 'Há Dados Vazios';
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['NivelDeAcesso'] = $_POST['NivelDeAcesso'];
    header('Location: RegistrarUsuario.php');

}

?>