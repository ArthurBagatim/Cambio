<?php

/* Banco de Dados */
include('conexao.php');

if($_SESSION['NivelDeAcesso'] != 1){

	header('Location: Dashboard.php');

}

if(isset($_SESSION['UltimaAcao'])){

  $UltimaAcao = $_SESSION['UltimaAcao'];
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];

  echo "<script> 
  
        alert('$UltimaAcao'); 
        
        </script>";

  unset($_SESSION['UltimaAcao']);
  unset($_SESSION['name']);
  unset($_SESSION['email']);
  unset($_SESSION['password']);
  unset($_SESSION['NivelDeAcesso']);
  
}else{

  $name = '';
  $email = '';
  $password = '';

}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="img/favicon/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="img/favicon/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="img/favicon/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="img/favicon/mstile-310x310.png" />
    <!-- Favicon Tags End -->
    <title>Registrar membro - Empresa</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="images/logo-dark.svg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/holder-background.png" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Registrar novo operador</h3>
                        <p>Registre um novo membro do time da Empresa.</p>
                        <form action="InserirUsuario.php" method="post">
                            <input class="form-control" type="text" name="name" value="<?php echo $name ?>" placeholder="Nome completo" required>
                            <input class="form-control" type="email" name="email" value="<?php echo $email ?>" placeholder="E-mail Empresa" required>
                            <input class="form-control" type="password" name="password" value="<?php echo $password ?>" placeholder="Senha" required>
                            <select class="form-control" name="NivelDeAcesso" id="NivelDeAcesso" required>
                                <option style="display: none;" value="404">Nivel de Acesso</option>
                                <option class="form-control dropdown-empresa-option" value="1">Master</option>
                                <option class="form-control dropdown-empresa-option" value="2">Mesa/Operador</option>
                                <option class="form-control dropdown-empresa-option" value="3">Lider Comercial</option>
                                <option class="form-control dropdown-empresa-option" value="4">Comercial</option>
                            </select>'
                            <div class="form-button">
                                <a class="ibtn" href="Dashboard.php">Voltar</a>
                                <button style="float: right;" id="submit" type="submit" class="ibtn">Registrar</button>
                            </div>
                        </form>
               <!--           <div class="other-links">
                        <div class="text"></div>
                           <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"><i class="fab fa-linkedin-in"></i>Linkedin</a> 
                        </div>
                        <div class="page-links">
                            <a href="register.html">Entrar na minha conta</a>
                        </div>
                    </div>  -->
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>