<?php

if(isset($_POST['Usuario'])){

  $Usuario = $_POST['Usuario'];

}else{

  header('Location: forget.php');

}

  // Dados do Banco de Dados

$servername = "IP Server";
$usernameBD = "Username";
$password = "Senha";
$dbname = "Nome Banco de Dados";

  // Criando Conexao

$conn = mysqli_connect($servername, $usernameBD, $password, $dbname);

  /* Verificando Conexão Com Banco de Dados */
if (!$conn) {

  header('Location: forget.php');

}

?>