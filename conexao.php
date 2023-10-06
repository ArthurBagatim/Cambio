<?php

session_start();

  // Dados do Banco de Dados

$servername = "162.241.63.50";
$usernameBD = "jaqueb99";
$password = "lmm.080812";
$dbname = "jaqueb99_Dados";

  // Criando Conexao

$conn = mysqli_connect($servername, $usernameBD, $password, $dbname);

  /* Verificando Conexão Com Banco de Dados */
if (!$conn) {

  echo "<br>Conexao Falhou<br>";

}

if(isset($_SESSION['Usuario']) && isset($_SESSION['Senha'])){

  $Usuario = $_SESSION['Usuario'];
  $Senha = $_SESSION['Senha'];

}else{

  header('Location: .');

}

if(preg_match('/[^a-zA-Z@.]/', $Usuario) || preg_match('/[^0-9a-zA-Z#!]/', $Senha)){

  echo 'Usuario Proibido<br><br>';
  $_SESSION['Error'] = '1';
  unset($_SESSION['Usuario']);
  unset($_SESSION['Senha']);
  header('Location: .');

}

$Usuario = preg_replace('/[^a-zA-Z@.]/', "err'or".'err"or', $Usuario);
$Senha = preg_replace('/[^0-9a-zA-Z#!]/', "err'or".'err"or', $Senha);

/* Selecionando Dados do Banco */
$query = "SELECT * FROM `Login` WHERE `Usuario_Empresa_secure` = '$Usuario'";

$login = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($login);

/* Verificando se Usuario e Senha São Iguais Para Mover Para os Dados */
if ($user['Usuario_Empresa_secure'] == $Usuario && $user['SenhaUser_Empresa_secure'] == $Senha){

  $_SESSION['NivelDeAcesso'] = $user['Nivel_De_Acessos_Empresa_secure'];
  $_SESSION['UserName'] = $user['UserName_Empresa_secure'];
  $_SESSION['UserEmail'] = $user['Usuario_Empresa_secure'];
  $Login = 'OK';

}else{

  unset($_SESSION['Usuario']);
  unset($_SESSION['Senha']);
  header('Location: .');

}

?>