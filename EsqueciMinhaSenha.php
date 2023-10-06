<?php

session_start();

include('EsqueciMinhaSenhaConexao.php');

$Usuario = preg_replace('/[^a-zA-Z@.]/', "err'or".'err"or', $Usuario);

/* Selecionando Dados do Banco */
$query = "SELECT * FROM `Login` WHERE `Usuario_Empresa_secure` = '$Usuario'";

$dados = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($dados);

if(isset($user['Usuario_Empresa_secure'])){

  $Senha = $user['SenhaUser_Empresa_secure'];

}else{

  $_SESSION['Error'] = '1';
  header('Location: forget.php');

}

$Usuario = $_POST['Usuario'];
$titulo = 'Senha de Acesso Empresa';
$conteudo = 'Sua Senha é:' . $Senha;
$de = 'From: arthurbagatim1@gmail.com';

if(isset($Usuario) && isset($Senha)){

  mail($Usuario,$titulo,$conteudo,$de);
  $_SESSION['Recuperar'] = 'Sucesso';
  header('Location: .');

}else{

  $_SESSION['Recuperar'] = 'Erro';
  header('Location: forget.php');

}

?>