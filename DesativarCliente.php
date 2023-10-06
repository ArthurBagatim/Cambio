<?php

include('conexao.php');

$Cliente = $_POST['BuscarNomeDoCliente'];
$CNPJ_CPF = $_POST['BuscarCNPJ_CPF'];

// Variavel Para Atualizar Status

$AtualizarDados = "UPDATE EmpresaClientes SET `Status` = 'Desativo' WHERE Cliente = '$Cliente' AND CNPJ_CPF = '$CNPJ_CPF'";

// Verifica se a Atualização foi Certo
if (mysqli_query($conn, $AtualizarDados)){

    $_SESSION['UltimaAcao'] = 'Dados Atualizados Com Sucesso';
    header('Location: Dashboard.php');

}else{

    $_SESSION['UltimaAcao'] = 'Não Foi Possível Desativar o Cliente';
    $_SESSION['Cliente'] = $Cliente;
    header('Location: PerfilCliente.php');

}

?>