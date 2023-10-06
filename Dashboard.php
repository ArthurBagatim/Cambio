<?php

/* Banco de Dados */
include('conexao.php');

// Navbar
include('Navbar.php');

// Barra de Buscar
include('BuscarBarra.php');

// Ultimas Operações
include('UltimasOperacoesDashboard.php');

if(isset($_SESSION['UltimaAcao'])){

  $UltimaAcao = $_SESSION['UltimaAcao'];

  echo "<script> 
  
        alert('$UltimaAcao'); 
        
        </script>";

  unset($_SESSION['UltimaAcao']);
  
}

// Puxando Data Atual
$Data = date("Y-m-d");

/* Selecionando Número de Operações */
$selecionar = "SELECT COUNT(*) FROM `EmpresaOperacoes` where `Data` >= '$Data'";

$query = mysqli_query($conn, $selecionar);

/* Número de Operações */
while($row = mysqli_fetch_assoc($query)){

  $OperacoesHoje = $row['COUNT(*)'];

}

/* Selecionando Dados Diarios */
$selecionar = "SELECT * FROM EmpresaOperacoes WHERE `Data` >= '$Data'";

$query = mysqli_query($conn, $selecionar);

// Variaveis Para Dados Diarios 
$ReceitaFinalDia = 0;
$ValorEmDolarDia = 0;
$SpreadDia = 0;
$TaxaFinal = 0;
$SpotMedioDiaCompra = 0;
$TaxaFinalDiaCompra = 0;
$SpotMedioDiaVenda = 0;
$TaxaFinalDiaVenda = 0;
$yVenda = 0;
$yCompra = 0;
$y = 0;

/* Dados Diarios */
while($row = mysqli_fetch_assoc($query)){

  if($OperacoesHoje != 0){

    $ValorEmDolarDia += $row['ValorEmDolar'];
    $SpreadDia += $row["Spread"] / 100 * $row["ReceitaFinal"];
    $ReceitaFinalDia += $row["ReceitaFinal"];
    $y++;
    
  }

}

/* Selecionando Dados Diarios Compra */
$selecionar = "SELECT * FROM EmpresaOperacoes WHERE `Data` >= '$Data' AND TipoDeOperacao = 'Compra'";

$query = mysqli_query($conn, $selecionar);

/* Dados Diarios Compra */
while($row = mysqli_fetch_assoc($query)){

  $SpotMedioDiaCompra += $row["Spot"];
  $TaxaFinalDiaCompra += $row["TaxaFinal"];
  $yCompra++;

}

/* Selecionando Dados Diarios Venda */
$selecionar = "SELECT * FROM EmpresaOperacoes WHERE `Data` >= '$Data' AND TipoDeOperacao = 'Venda'";

$query = mysqli_query($conn, $selecionar);

/* Dados Diarios Venda */
while($row = mysqli_fetch_assoc($query)){

  $SpotMedioDiaVenda += $row["Spot"];
  $TaxaFinalDiaVenda += $row["TaxaFinal"];
  $yVenda++;

}

// Calculo da Média
if(isset($OperacoesHoje) && $OperacoesHoje != 0){

  $SpreadDia = $SpreadDia / $ReceitaFinalDia * 10000;
  if($yCompra != 0){
  $SpotMedioDiaCompra = $SpotMedioDiaCompra / $yCompra;
  $TaxaFinalDiaCompra = $TaxaFinalDiaCompra / $yCompra;
  }if($yVenda != 0){
  $SpotMedioDiaVenda = $SpotMedioDiaVenda / $yVenda;
  $TaxaFinalDiaVenda = $TaxaFinalDiaVenda / $yVenda;
  }

}

// Formatando Casas

$ReceitaFinalDia = number_format($ReceitaFinalDia, 2, ',', '.');
$ValorEmDolarDia = number_format($ValorEmDolarDia, 2, ',', '.');
$SpreadDia = number_format($SpreadDia, 4, ',', '.');
$SpotMedioDiaCompra = number_format($SpotMedioDiaCompra, 4, ',', '.');
$TaxaFinalDiaCompra = number_format($TaxaFinalDiaCompra, 4, ',', '.');
$SpotMedioDiaVenda = number_format($SpotMedioDiaVenda, 4, ',', '.');
$TaxaFinalDiaVenda = number_format($TaxaFinalDiaVenda, 4, ',', '.');

// Puxando Mes Anterior
$MesAnterior = date("Y-m");

// Mês Anterior
/* Número de Operações */
$SelecionarCliente = "SELECT COUNT(*) FROM EmpresaOperacoes WHERE `Data` >= '$MesAnterior'";

$query = mysqli_query($conn, $SelecionarCliente);

$row = mysqli_fetch_assoc($query);

if(isset($row['COUNT(*)'])){

  $OperacoesMesAnterior = $row['COUNT(*)'];

}

// Variaveis de Valores
$VolumeEmDolarMes = 0;
$SpreadMedioMes = 0;
$SpotMedioMesCompra = 0;
$TaxaFinalMesCompra = 0;
$SpotMedioMesVenda = 0;
$TaxaFinalMesVenda = 0;
$ReceitaFinalMes = 0;
$yVenda = 0;
$yCompra = 0;
$y = 0;

$SelecionarOperacaoMes = "SELECT * FROM EmpresaOperacoes WHERE `Data` >= '$MesAnterior'";

$query = mysqli_query($conn, $SelecionarOperacaoMes);

/* Número de Operações */
while($row = mysqli_fetch_assoc($query)){

  if($OperacoesMesAnterior != 0){

    $VolumeEmDolarMes += $row['ValorEmDolar'];
    $SpreadMedioMes += $row["Spread"] / 100 * $row["ReceitaFinal"];
    $ReceitaFinalMes += $row["ReceitaFinal"];
    $y++;

  }

}

/* Selecionando Dados Diarios Compra */
$selecionar = "SELECT * FROM EmpresaOperacoes WHERE `Data` >= '$MesAnterior' AND TipoDeOperacao = 'Compra'";

$query = mysqli_query($conn, $selecionar);

/* Dados Mes Compra */
while($row = mysqli_fetch_assoc($query)){

  $SpotMedioMesCompra += $row["Spot"];
  $TaxaFinalMesCompra += $row["TaxaFinal"];
  $yCompra++;

}

/* Selecionando Dados Diarios Venda */
$selecionar = "SELECT * FROM EmpresaOperacoes WHERE `Data` >= '$MesAnterior' AND TipoDeOperacao = 'Venda'";

$query = mysqli_query($conn, $selecionar);

/* Dados Diarios Venda */
while($row = mysqli_fetch_assoc($query)){

  $SpotMedioMesVenda += $row["Spot"];
  $TaxaFinalMesVenda += $row["TaxaFinal"];
  $yVenda++;

}

// Calculo da Média
if(isset($OperacoesHoje) && $OperacoesHoje != 0){

  $SpreadMedioMes = $SpreadMedioMes / $ReceitaFinalMes * 10000;
  if($yCompra != 0){
  $SpotMedioMesCompra = $SpotMedioMesCompra / $yCompra;
  $TaxaFinalMesCompra = $TaxaFinalMesCompra / $yCompra;
  }if($yVenda != 0){
  $SpotMedioMesVenda = $SpotMedioMesVenda / $yVenda;
  $TaxaFinalMesVenda = $TaxaFinalMesVenda / $yVenda;
  }

}

$ReceitaFinalMes = number_format($ReceitaFinalMes, 2, ',', '.');
$VolumeEmDolarMes = number_format($VolumeEmDolarMes, 2, ',', '.');
$SpreadMedioMes = number_format($SpreadMedioMes, 4, ',', '.');
$SpotMedioMesCompra = number_format($SpotMedioMesCompra, 4, ',', '.');
$TaxaFinalMesCompra = number_format($TaxaFinalMesCompra, 4, ',', '.');
$SpotMedioMesVenda = number_format($SpotMedioMesVenda, 4, ',', '.');
$TaxaFinalMesVenda = number_format($TaxaFinalMesVenda, 4, ',', '.');

?>

<!DOCTYPE html>
<html lang="pt-BR" data-footer="true">
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Dashboard - Empresa</title>
    <meta name="title" content="Dashboard - Empresa">
    <meta name="description" content="Dashboard com a visão geral da operação e ferramentas de registro de operações.">
    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="img/favicon/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/favicon/favicon-128.png" sizes="128x128">
    <meta name="application-name" content="&nbsp;">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
    <meta name="msapplication-square70x70logo" content="img/favicon/mstile-70x70.png">
    <meta name="msapplication-square150x150logo" content="img/favicon/mstile-150x150.png">
    <meta name="msapplication-wide310x150logo" content="img/favicon/mstile-310x150.png">
    <meta name="msapplication-square310x310logo" content="img/favicon/mstile-310x310.png">
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font/CS-Interface/style.css">
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="css/vendor/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="css/vendor/glide.core.min.css">

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="css/main.css">
    <script src="js/base/loader.js"></script>
    </head>


<html data-override='{"attributes": {"color": "dark-green" }}'>
  <body class="" data-bs-padding="22px"><div id="paddingModal" class="modal" aria-hidden="true" style="display: none;"> <div class="modal-dialog d-none"><div class="modal-content"></div></div> </div>
    <div id="root">
      <div id="nav" class="nav-container d-flex">
        <div class="nav-content d-flex" style="padding-right: 0px;">
          <!-- Logo Start -->
          <div class="logo position-relative">
            <a href="Dashboard.php">
              <!-- Logo can be added directly -->
              <!-- <img src="img/logo/logo-white.svg" alt="logo" /> -->

              <!-- Or added via css to provide different ones for different color themes -->
              <div class="img"></div>
            </a>
          </div>
          <!-- Logo End -->

          <!-- Language Switch Start 
          <div class="language-switch-container">
            <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</button>
            <div class="dropdown-menu">
              <a href="#" class="dropdown-item">DE</a>
              <a href="#" class="dropdown-item active">EN</a>
              <a href="#" class="dropdown-item">ES</a>
            </div>
          </div>
           Language Switch End -->

          <!-- User Menu Start -->
          <?php echo $UserMenuPHP ?>
          <!-- User Menu End -->
          <!-- Icons Menu Start -->
          <?php echo $IconesPHP ?>
          <!-- Icons Menu End -->
          <!-- Menu Start -->
          <?php echo $MenuPHP ?>
          <!-- Menu End -->

          <!-- Mobile Buttons Start -->
          <div class="mobile-buttons-container">
            <!-- Scrollspy Mobile Button Start -->
            <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
              <i data-acorn-icon="menu-dropdown"></i>
            </a>
            <!-- Scrollspy Mobile Button End -->

            <!-- Scrollspy Mobile Dropdown Start -->
            <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
            <!-- Scrollspy Mobile Dropdown End -->

            <!-- Menu Button Start -->
            <a href="#" id="mobileMenuButton" class="menu-button">
              <i data-acorn-icon="menu"></i>
            </a>
            <!-- Menu Button End -->
          </div>
          <!-- Mobile Buttons End -->
        </div>
        <div class="nav-shadow"></div>
      </div>

      <main>
        <div class="container">
          <!-- Title and Top Buttons Start -->
          <div class="page-title-container">
            <div class="row">
              <!-- Title Start -->
              <div class="col-12 col-md-7">
                <h1 class="mb-0 pb-0 display-4" id="title">Seja bem vindo, <?php echo $_SESSION['UserName']; ?></h1>
                <nav style="margin-top:10px;" class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                  <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item">Versão 1.1 - 08/02/2023</li>
                  </ul>
                </nav>
              </div>
              <!-- Title End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <!-- Content Start -->

          <div class="row">


<!-- Registros e cadastros Start -->

          <h2 class="small-title">Registros e cadastros</h2>
          <div class="row gx-2">
            <div class="col-12 p-0">
              <div class="glide glide--ltr glide--slider glide--swipeable" id="glideAchievements">
                <div class="glide__track" data-glide-el="track">
                  <div class="glide__slides" style="transition: transform 0ms cubic-bezier(0.165, 0.84, 0.44, 1) 0s; width: 1532px; transform: translate3d(0px, 0px, 0px);">
                    
                    
                    <?php 
                    
                    if($_SESSION['NivelDeAcesso'] <= '3'){

                        echo '  
                        <div class="glide__slide hover-scale-up glide__slide--active" style="margin-top: 5px; width: 306.4px; margin-right: 0px;">
                          <div class="card mb-5 sh-25">
                          <a style="text-decoration: none; color: var(--body);" draggable="true" href="#" data-bs-toggle="modal" data-bs-target="#RegistrarOperacao">
                            <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                              <div class="d-flex sw-6 sh-6 bg-gradient-light mb-4 align-items-center justify-content-center rounded-xl position-relative mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-sync-horizontal text-white"><path d="M3 5 16 5.00001C17.1046 5.00001 18 5.89544 18 7.00001V8M17 15 4.00001 15C2.89544 15 2.00001 14.1046 2.00001 13V12"></path><path d="M5 8 2 5 5 2M15 12 18 15 15 18"></path></svg>
                                <div class="achievement bg position-absolute">
                                  <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4518 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333ZM65.0942 15.1001C66.006 14.4592 67.2717 14.6688 67.9213 15.5684C72.3763 21.7377 75 29.3164 75 37.5C75 45.6836 72.3763 53.2623 67.9213 59.4316C67.2717 60.3311 66.006 60.5408 65.0942 59.8999C64.1825 59.2589 63.97 58.0101 64.6196 57.1105C68.599 51.5998 70.9459 44.8284 70.9459 37.5C70.9459 30.1716 68.599 23.4002 64.6196 17.8895C63.97 16.9899 64.1825 15.7411 65.0942 15.1001ZM9.90579 15.1001C10.8175 15.7411 11.03 16.9899 10.3804 17.8895C6.40105 23.4002 4.05405 30.1716 4.05405 37.5C4.05405 44.8284 6.40105 51.5998 10.3804 57.1105C11.03 58.0101 10.8175 59.2589 9.90579 59.8999C8.99405 60.5408 7.72832 60.3312 7.07871 59.4316C2.62373 53.2623 0 45.6836 0 37.5C0 29.3164 2.62373 21.7377 7.07871 15.5684C7.72832 14.6689 8.99404 14.4592 9.90579 15.1001ZM14.9248 64.9584C15.5927 64.0719 16.8625 63.8876 17.7609 64.5466C23.2952 68.606 30.1167 71 37.5 71C44.8833 71 51.7048 68.606 57.2391 64.5465C58.1375 63.8876 59.4073 64.0719 60.0752 64.9584C60.7431 65.8448 60.5562 67.0977 59.6578 67.7567C53.4518 72.3088 45.7883 75 37.5 75C29.2117 75 21.5483 72.3088 15.3422 67.7567C14.4438 67.0977 14.2569 65.8448 14.9248 64.9584Z"></path>
                                  </svg>
                                </div>
                                <div class="achievement level position-absolute">
                                  <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4517 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333Z"></path>
                                  </svg>
                                </div>
                              </div>
                              <h4 class="card-text mb-0 d-flex text-primary">Registrar Operação</h4>
                              <p class="text-center mb-0 d-flex ">Registre uma operação de um cliente já cadastrado no sistema.</p>
                            </div>
                          </a></div><a style="text-decoration: none; color: var(--body);" draggable="true" data-href="#" href="#">
                        </a></div>';
                    
                    }

                    ?>
                    <div class="glide__slide hover-scale-up" style="margin-top: 5px; width: 306.4px; margin-left: 0px; margin-right: 0px;">
                      <div class="card mb-5 sh-25">
                        <a style="text-decoration: none; color: var(--body);" draggable="true" data-href="SelecionarOperacao.php" href="SelecionarOperacao.php">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                          <div class="d-flex sw-6 sh-6 bg-gradient-light mb-4 align-items-center justify-content-center rounded-xl position-relative mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-edit text-white"><path d="M14.6264 2.54528C15.0872 2.08442 15.6782 1.79143 16.2693 1.73077C16.8604 1.67011 17.4032 1.84674 17.7783 2.22181C18.1533 2.59689 18.33 3.13967 18.2693 3.73077C18.2087 4.32186 17.9157 4.91284 17.4548 5.3737L6.53226 16.2962L2.22192 17.7782L3.70384 13.4678L14.6264 2.54528Z"></path></svg>
                            <div class="achievement bg position-absolute">
                              <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4518 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333ZM65.0942 15.1001C66.006 14.4592 67.2717 14.6688 67.9213 15.5684C72.3763 21.7377 75 29.3164 75 37.5C75 45.6836 72.3763 53.2623 67.9213 59.4316C67.2717 60.3311 66.006 60.5408 65.0942 59.8999C64.1825 59.2589 63.97 58.0101 64.6196 57.1105C68.599 51.5998 70.9459 44.8284 70.9459 37.5C70.9459 30.1716 68.599 23.4002 64.6196 17.8895C63.97 16.9899 64.1825 15.7411 65.0942 15.1001ZM9.90579 15.1001C10.8175 15.7411 11.03 16.9899 10.3804 17.8895C6.40105 23.4002 4.05405 30.1716 4.05405 37.5C4.05405 44.8284 6.40105 51.5998 10.3804 57.1105C11.03 58.0101 10.8175 59.2589 9.90579 59.8999C8.99405 60.5408 7.72832 60.3312 7.07871 59.4316C2.62373 53.2623 0 45.6836 0 37.5C0 29.3164 2.62373 21.7377 7.07871 15.5684C7.72832 14.6689 8.99404 14.4592 9.90579 15.1001ZM14.9248 64.9584C15.5927 64.0719 16.8625 63.8876 17.7609 64.5466C23.2952 68.606 30.1167 71 37.5 71C44.8833 71 51.7048 68.606 57.2391 64.5465C58.1375 63.8876 59.4073 64.0719 60.0752 64.9584C60.7431 65.8448 60.5562 67.0977 59.6578 67.7567C53.4518 72.3088 45.7883 75 37.5 75C29.2117 75 21.5483 72.3088 15.3422 67.7567C14.4438 67.0977 14.2569 65.8448 14.9248 64.9584Z"></path>
                              </svg>
                            </div>
                            <div class="achievement level position-absolute">
                              <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4517 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333ZM65.0942 15.1001C66.006 14.4592 67.2717 14.6688 67.9213 15.5684C72.3763 21.7377 75 29.3164 75 37.5C75 45.6836 72.3763 53.2623 67.9213 59.4316C67.2717 60.3311 66.006 60.5408 65.0942 59.8999C64.1825 59.2589 63.97 58.0101 64.6196 57.1105C68.599 51.5998 70.9459 44.8284 70.9459 37.5C70.9459 30.1716 68.5989 23.4002 64.6196 17.8895C63.97 16.9899 64.1825 15.7411 65.0942 15.1001Z"></path>
                              </svg>
                            </div>
                          </div>
                          <h4 class="card-text mb-0 d-flex text-primary">Selecionar Operação</h4>
                          <p class="text-center mb-0 d-flex ">Busque uma operação já registrada.</p>
                        </div>
                      </a></div><a style="text-decoration: none; color: var(--body);" draggable="true" data-href="#" href="#">
                    </a></div>
                    <div class="glide__slide hover-scale-up" style="margin-top: 5px; width: 306.4px; margin-left: 0px; margin-right: 0px;">
                      <div class="card mb-5 sh-25">
                        <a style="text-decoration: none; color: var(--body);" draggable="true" data-href="RegistrarCliente.php" href="RegistrarCliente.php">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                          <div class="d-flex sw-6 sh-6 bg-gradient-light mb-4 align-items-center justify-content-center rounded-xl position-relative mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-user text-white"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                            <div class="achievement bg position-absolute">
                              <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4518 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333ZM65.0942 15.1001C66.006 14.4592 67.2717 14.6688 67.9213 15.5684C72.3763 21.7377 75 29.3164 75 37.5C75 45.6836 72.3763 53.2623 67.9213 59.4316C67.2717 60.3311 66.006 60.5408 65.0942 59.8999C64.1825 59.2589 63.97 58.0101 64.6196 57.1105C68.599 51.5998 70.9459 44.8284 70.9459 37.5C70.9459 30.1716 68.599 23.4002 64.6196 17.8895C63.97 16.9899 64.1825 15.7411 65.0942 15.1001ZM9.90579 15.1001C10.8175 15.7411 11.03 16.9899 10.3804 17.8895C6.40105 23.4002 4.05405 30.1716 4.05405 37.5C4.05405 44.8284 6.40105 51.5998 10.3804 57.1105C11.03 58.0101 10.8175 59.2589 9.90579 59.8999C8.99405 60.5408 7.72832 60.3312 7.07871 59.4316C2.62373 53.2623 0 45.6836 0 37.5C0 29.3164 2.62373 21.7377 7.07871 15.5684C7.72832 14.6689 8.99404 14.4592 9.90579 15.1001ZM14.9248 64.9584C15.5927 64.0719 16.8625 63.8876 17.7609 64.5466C23.2952 68.606 30.1167 71 37.5 71C44.8833 71 51.7048 68.606 57.2391 64.5465C58.1375 63.8876 59.4073 64.0719 60.0752 64.9584C60.7431 65.8448 60.5562 67.0977 59.6578 67.7567C53.4518 72.3088 45.7883 75 37.5 75C29.2117 75 21.5483 72.3088 15.3422 67.7567C14.4438 67.0977 14.2569 65.8448 14.9248 64.9584Z"></path>
                              </svg>
                            </div>
                            <div class="achievement level position-absolute">
                              <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4517 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333Z"></path>
                              </svg>
                            </div>
                          </div>
                           <h4 class="card-text mb-0 d-flex text-primary">Cadastrar Cliente</h4>
                          <p class="text-center mb-0 d-flex ">Cadastre um novo cliente e insira as condições especiais do cliente.</p>
                        </div>
                      </a></div><a style="text-decoration: none; color: var(--body);" draggable="true" data-href="#" href="#">
                    </a></div>

                    <div style="display: none;" class="glide__slide hover-scale-up" style="margin-top: 5px; width: 306.4px; margin-left: 0px; margin-right: 0px;">
                      <div class="card mb-5 sh-25">
                        <a style="text-decoration: none; color: var(--body);" draggable="true" data-href="EditarClientes.php" href="EditarClientes.php">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                          <div class="d-flex sw-6 sh-6 bg-gradient-light mb-4 align-items-center justify-content-center rounded-xl position-relative mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-edit-square text-white"><path d="M11 2L5.5 2C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5L2 14.5C2 15.9045 2 16.6067 2.33706 17.1111C2.48298 17.3295 2.67048 17.517 2.88886 17.6629C3.39331 18 4.09554 18 5.5 18L14.5 18C15.9045 18 16.6067 18 17.1111 17.6629C17.3295 17.517 17.517 17.3295 17.6629 17.1111C18 16.6067 18 15.9045 18 14.5L18 11"></path><path d="M15.4978 3.06224C15.7795 2.78052 16.1616 2.62225 16.56 2.62225C16.9585 2.62225 17.3405 2.78052 17.6223 3.06224C17.904 3.34396 18.0623 3.72605 18.0623 4.12446C18.0623 4.52288 17.904 4.90497 17.6223 5.18669L10.8949 11.9141L8.06226 12.6223L8.7704 9.78966L15.4978 3.06224Z"></path></svg>
                            <div class="achievement bg position-absolute">
                              <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4518 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333ZM65.0942 15.1001C66.006 14.4592 67.2717 14.6688 67.9213 15.5684C72.3763 21.7377 75 29.3164 75 37.5C75 45.6836 72.3763 53.2623 67.9213 59.4316C67.2717 60.3311 66.006 60.5408 65.0942 59.8999C64.1825 59.2589 63.97 58.0101 64.6196 57.1105C68.599 51.5998 70.9459 44.8284 70.9459 37.5C70.9459 30.1716 68.599 23.4002 64.6196 17.8895C63.97 16.9899 64.1825 15.7411 65.0942 15.1001ZM9.90579 15.1001C10.8175 15.7411 11.03 16.9899 10.3804 17.8895C6.40105 23.4002 4.05405 30.1716 4.05405 37.5C4.05405 44.8284 6.40105 51.5998 10.3804 57.1105C11.03 58.0101 10.8175 59.2589 9.90579 59.8999C8.99405 60.5408 7.72832 60.3312 7.07871 59.4316C2.62373 53.2623 0 45.6836 0 37.5C0 29.3164 2.62373 21.7377 7.07871 15.5684C7.72832 14.6689 8.99404 14.4592 9.90579 15.1001ZM14.9248 64.9584C15.5927 64.0719 16.8625 63.8876 17.7609 64.5466C23.2952 68.606 30.1167 71 37.5 71C44.8833 71 51.7048 68.606 57.2391 64.5465C58.1375 63.8876 59.4073 64.0719 60.0752 64.9584C60.7431 65.8448 60.5562 67.0977 59.6578 67.7567C53.4518 72.3088 45.7883 75 37.5 75C29.2117 75 21.5483 72.3088 15.3422 67.7567C14.4438 67.0977 14.2569 65.8448 14.9248 64.9584Z"></path>
                              </svg>
                            </div>
                            <div class="achievement level position-absolute">
                              <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4517 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333ZM65.0942 15.1001C66.006 14.4592 67.2717 14.6688 67.9213 15.5684C72.3763 21.7377 75 29.3164 75 37.5C75 45.6836 72.3763 53.2623 67.9213 59.4316C67.2717 60.3311 66.006 60.5408 65.0942 59.8999C64.1825 59.2589 63.97 58.0101 64.6196 57.1105C68.599 51.5998 70.9459 44.8284 70.9459 37.5C70.9459 30.1716 68.5989 23.4002 64.6196 17.8895C63.97 16.9899 64.1825 15.7411 65.0942 15.1001Z"></path>
                              </svg>
                            </div>
                          </div>
                          <h4 class="card-text mb-0 d-flex text-primary">Atualizar Cliente</h4>
                          <p class="text-center mb-0 d-flex ">Atualize os dados ou condições comerciais de um cliente existente.</p>
                        </div>
                      </a></div><a style="text-decoration: none; color: var(--body);" draggable="true" data-href="#" href="#">
                    </a></div>
                    

                    
                    <div style="display: none;" class="glide__slide hover-scale-up" style="margin-top: 5px; width: 306.4px; margin-left: 0px;">
                      <div class="card mb-5 sh-25">
                    <a style="text-decoration: none; color: var(--body);" draggable="true" data-href="#" href="#">
                        <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                          <div class="d-flex sw-6 sh-6 bg-gradient-light mb-4 align-items-center justify-content-center rounded-xl position-relative mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-activity text-white"><path d="M2 10H4.82798C5.04879 10 5.24345 10.1448 5.3069 10.3563L7.10654 16.3551C7.25028 16.8343 7.93071 16.8287 8.06664 16.3473L11.905 2.75299C12.0432 2.26379 12.7384 2.26886 12.8693 2.76003L14.701 9.62883C14.7594 9.84771 14.9576 10 15.1841 10H18"></path></svg>
                            <div class="achievement bg position-absolute">
                              <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4518 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333ZM65.0942 15.1001C66.006 14.4592 67.2717 14.6688 67.9213 15.5684C72.3763 21.7377 75 29.3164 75 37.5C75 45.6836 72.3763 53.2623 67.9213 59.4316C67.2717 60.3311 66.006 60.5408 65.0942 59.8999C64.1825 59.2589 63.97 58.0101 64.6196 57.1105C68.599 51.5998 70.9459 44.8284 70.9459 37.5C70.9459 30.1716 68.599 23.4002 64.6196 17.8895C63.97 16.9899 64.1825 15.7411 65.0942 15.1001ZM9.90579 15.1001C10.8175 15.7411 11.03 16.9899 10.3804 17.8895C6.40105 23.4002 4.05405 30.1716 4.05405 37.5C4.05405 44.8284 6.40105 51.5998 10.3804 57.1105C11.03 58.0101 10.8175 59.2589 9.90579 59.8999C8.99405 60.5408 7.72832 60.3312 7.07871 59.4316C2.62373 53.2623 0 45.6836 0 37.5C0 29.3164 2.62373 21.7377 7.07871 15.5684C7.72832 14.6689 8.99404 14.4592 9.90579 15.1001ZM14.9248 64.9584C15.5927 64.0719 16.8625 63.8876 17.7609 64.5466C23.2952 68.606 30.1167 71 37.5 71C44.8833 71 51.7048 68.606 57.2391 64.5465C58.1375 63.8876 59.4073 64.0719 60.0752 64.9584C60.7431 65.8448 60.5562 67.0977 59.6578 67.7567C53.4518 72.3088 45.7883 75 37.5 75C29.2117 75 21.5483 72.3088 15.3422 67.7567C14.4438 67.0977 14.2569 65.8448 14.9248 64.9584Z"></path>
                              </svg>
                            </div>
                            <div class="achievement level position-absolute">
                              <svg width="75" height="75" viewBox="0 0 75 75" fill="black" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.3422 7.24333C21.5482 2.69119 29.2117 0 37.5 0C45.7883 0 53.4518 2.69119 59.6578 7.24333C60.5562 7.90233 60.7431 9.15516 60.0752 10.0416C59.4073 10.9281 58.1375 11.1124 57.2391 10.4534C51.7048 6.39402 44.8833 4 37.5 4C30.1167 4 23.2952 6.39403 17.7609 10.4535C16.8625 11.1124 15.5927 10.9281 14.9248 10.0416C14.2569 9.15516 14.4438 7.90233 15.3422 7.24333ZM65.0942 15.1001C66.006 14.4592 67.2717 14.6688 67.9213 15.5684C72.3763 21.7377 75 29.3164 75 37.5C75 45.6836 72.3763 53.2623 67.9213 59.4316C67.2717 60.3311 66.006 60.5408 65.0942 59.8999C64.1825 59.2589 63.97 58.0101 64.6196 57.1105C68.599 51.5998 70.9459 44.8284 70.9459 37.5C70.9459 30.1716 68.599 23.4002 64.6196 17.8895C63.97 16.9899 64.1825 15.7411 65.0942 15.1001ZM9.90579 15.1001C10.8175 15.7411 11.03 16.9899 10.3804 17.8895C6.40105 23.4002 4.05405 30.1716 4.05405 37.5C4.05405 44.8284 6.40105 51.5998 10.3804 57.1105C11.03 58.0101 10.8175 59.2589 9.90579 59.8999C8.99405 60.5408 7.72832 60.3312 7.07871 59.4316C2.62373 53.2623 0 45.6836 0 37.5C0 29.3164 2.62373 21.7377 7.07871 15.5684C7.72832 14.6689 8.99404 14.4592 9.90579 15.1001ZM14.9248 64.9584C15.5927 64.0719 16.8625 63.8876 17.7609 64.5466C23.2952 68.606 30.1167 71 37.5 71C44.8833 71 51.7048 68.606 57.2391 64.5465C58.1375 63.8876 59.4073 64.0719 60.0752 64.9584C60.7431 65.8448 60.5562 67.0977 59.6578 67.7567C53.4518 72.3088 45.7883 75 37.5 75C29.2117 75 21.5483 72.3088 15.3422 67.7567C14.4438 67.0977 14.2569 65.8448 14.9248 64.9584Z"></path>
                              </svg>
                            </div>
                          </div>
                          <h4 class="card-text mb-0 d-flex text-primary">Relatório de operações</h4>
                          <p class="text-center mb-0 d-flex ">Em breve aqui terá o acesso ao relatório de operações.</p>
                        </div>
                      </a></div><a style="text-decoration: none; color: var(--body);" draggable="true" data-href="#" href="#">
                    </a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Registros e Cadastros End -->


            <!-- Últimas operações Start -->
            <div class="col-lg-6 mb-5">
              <div class="d-flex justify-content-between">
                <h2 class="small-title">Últimas operações</h2>
                <a href="SelecionarOperacao.php" class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small">
                  <span class="align-bottom">Ver todas</span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right align-middle"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                </a>
              </div>
              <div class="scroll-out">
                <div class="scroll-by-count os-host os-theme-dark os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition" data-count="5" style="height: 359.891px; margin-bottom: -8px;"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -15px; width: 805px; height: 367px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 15px; height: 100%; width: 100%;">

                  <!-- Ultimas Operações Dashboard Começo -->
                  
                  <?php echo $UltimasOperacoesDashboard ?>

                  <!-- Ultimas Operacoes Dashboard Fim -->
                
                </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden" style="height: calc(100% - 8px);"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="height: 50.5618%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
              </div>
            </div>
            <!-- Últimas operações End -->

          

            <!-- Resumo do dia Start -->
            <div class="col-xl-6">
              <h2 class="small-title">Resumo do dia</h2>
              <div class="row g-2">
                <div class="col-6 col-xl-6 sh-19">
                  <div class="card h-100">
                    <a class="card-body text-center" href="#">
                      <i data-acorn-icon="sync-horizontal" class="text-primary"></i>                      
                      <h2 class=" mt-3 text-body"><?php echo $OperacoesHoje; ?></h2>
                      
                      <div class="text-extra-small fw-medium text-muted"><h2>OPERAÇÕES</h2></div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $OperacoesMesAnterior ?>/Mês</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-6 col-xl-6 sh-19">
                  <div class="card h-100">
                    <a class="card-body text-center" href="#">
                      <i data-acorn-icon="dollar" class="text-primary"></i>
                      <h3 class=" mt-3 text-body"><?php echo 'US$ ' . $ValorEmDolarDia ?></h3>
                      <div class="text-extra-small fw-medium text-muted"><h2>DÓLARES</h2></div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $VolumeEmDolarMes ?>/Mês</span>
                      </div>
                    </a>                    
                  </div>
                </div>
                <div class="col-6 col-xl-6 sh-19">
                  <div class="card h-100">
                    <a class="card-body text-center" href="#">
                      <i data-acorn-icon="sale-tag" class="text-primary"></i>
                      <h2 class=" mt-3 text-body"><?php echo $SpreadDia ?>%</h2>
                      <div class="text-extra-small fw-medium text-muted"><h2>Spread Médio</h2></div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $SpreadMedioMes ?>/Mês</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-6 col-xl-6 sh-19">
                  <div class="card h-100">
                    <a class="card-body text-center" href="#">
                      <i data-acorn-icon="sale-tag" class="text-primary"></i>
                      <h2 class=" mt-3 text-body">R$ <?php echo $ReceitaFinalDia ?></h2>
                      <div class="text-extra-small fw-medium text-muted"><h2>Receita Final</h2></div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text">R$ <?php echo $ReceitaFinalMes ?>/Mês</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-6 col-xl-6 sh-19">
                  <div class="card h-100">
                    <a class="card-body text-center" href="#">
                      <i data-acorn-icon="sale-tag" class="text-primary"></i>
                      <h2 class=" mt-3 text-body"><?php echo $SpotMedioDiaCompra . ' / ' . $TaxaFinalDiaCompra ?></h2>
                      <div class="text-extra-small fw-medium text-muted"><h2>Spot Médio / Taxa Final Média (Compra)</h2></div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $SpotMedioMesCompra . ' / ' . $TaxaFinalMesCompra ?>/Mês</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-6 col-xl-6 sh-19">
                  <div class="card h-100">
                    <a class="card-body text-center" href="#">
                      <i data-acorn-icon="chart-2" class="text-primary"></i>
                      <h2 class=" mt-3 text-body">R$ <?php echo $SpotMedioDiaVenda . ' / ' . $TaxaFinalDiaVenda ?></h2>
                      <div class="text-extra-small fw-medium text-muted"><h2>Spot Médio / Taxa Final Média (Venda)</h2></div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text">R$ <?php echo $SpotMedioMesCompra . ' / ' . $TaxaFinalMesVenda ?>/Mês</span>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Resumo do dia End -->

            
 <!-- Your Time Start
            <div class="col-xl-2 mb-5">
              <h2 class="small-title">Your Time</h2>
              <div class="card sh-45">
                <div class="card-body h-100">
                  <div class="h-100">
                    <canvas id="timeChart"></canvas>
                    <div
                      class="custom-tooltip position-absolute bg-foreground rounded-md border border-separator pe-none p-3 d-flex flex-column z-index-1 align-items-center opacity-0 basic-transform-transition"
                    >
                      <div
                        class="icon-container border d-flex align-items-center justify-content-center align-self-center rounded-xl sh-5 sw-5 rounded-xl mb-3"
                      >
                        <span class="icon"></span>
                      </div>
                      <span class="text d-flex align-middle text-alternate align-items-center text-small">Bread</span>
                      <span class="value d-flex align-middle text-body align-items-center cta-4">300</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             Your Time End -->
      
            <!-- Data relevantes Start -->
            <div class="col-xl-6 mb-5" style="height:350px;">
              <h2 class="small-title">Data relevantes 2023</h2>
              <div class="card sh-40 h-xl-100-card">
                <div class="card-body scroll-out h-100">
                  <div class="scroll h-100 os-host os-theme-dark os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -15px; width: 741px; height: 253px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 15px; height: 100%; width: 100%;">
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-warning align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Ano Novo</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">01 de janeiro</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-danger align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Dia de Martin Luther King</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">16 de janeiro</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-danger align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Dia do Presidente</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">14 de maio</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-danger align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Dia das Mães</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">14 de maio</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-danger align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Dia dos Pais</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">18 de junho</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-danger align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Dia da Independência</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">4 de julho</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-danger align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Dia do Trabalho</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">4 de setembro</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-danger align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Dia do Colombo</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">9 de outubro</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-danger align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Dia dos Veteranos de Guerra</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">10 de novembro</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-danger align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Ação de Graças</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">10 de novembro</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-warning align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Black Friday</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">10 de novembro</div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 mb-2">
                      <div class="col-auto">
                        <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                          <div class="sh-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-close-circle text-warning align-top"><path d="M7 7 13 13M13 7 7 13"></path><circle cx="10" cy="10" r="8"></circle></svg>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                          <div class="text-alternate mt-n1 lh-1-25">Natal</div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                          <div class="text-muted ms-2 mt-n1 lh-1-25">25 de dezembro</div>
                        </div>
                      </div>
                    </div>
                  </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="height: 67.5532%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
                </div>
              </div>
            </div>
            <!-- Notifications End -->

            <!-- Banner de atualização Start -->
            <div class="col-xl-6 mb-5">
              <h2 class="small-title">Últimas atualizações</h2>
              <div class="card w-100 sh-50 sh-md-40 h-xl-100-card hover-img-scale-up position-relative">
                <img src="img/banner/cta-standard-3.webp" class="card-img h-100 scale position-absolute" alt="card image">
                <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                  <div>
                    <div class="cta-1 mb-3 text-white w-75 w-sm-50 opacity-75">Seja bem-vindo à versão 1.1</div>
                    <div class="w-50 text-white mb-3 opacity-75">
                      Nesta terceira versão foi incluido a edição, desativamento e visualização de clientes, visualização de operações e exclusão de operações, incluído botões de abertura, edição de operações e redirecionamento para perfil do cliente sobre o nome nos registros de últimas operações, níveis de acessos, novos campos de dados, retorno após erro no registro/edição com os dados já preenchidos mantidos e corrigido bugs.
                    </div>
                    <div class="mb-2">
                      <div class="br-wrapper br-theme-cs-icon d-inline-block">
                       <!-- <select class="rating" name="rating" autocomplete="on" data-readonly="true" data-initial-rating="5">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                      <div class="text-muted d-inline-block text-small align-text-top">(572)</div>-->
                    </div>
                    <div>Última atualização 08/02/2023</div>
                  </div>
                  <div>
                    <a style="display:none;" href="#" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-chevron-right undefined"><path d="M7 4L12.6464 9.64645C12.8417 9.84171 12.8417 10.1583 12.6464 10.3536L7 16"></path></svg>
                      <span style="display:none;">Conhecer atualizações</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Banner de atualização End -->
          </div>

          <div class="row">
            

           

           
          </div>

          <!-- Time Empresa Start -->
          <h2 class="small-title">Time de Operações</h2>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-6 g-2">
            <div class="col">
              <div class="card h-100">
                <div class="card-body text-center">
                  <div class="sw-13 position-relative mb-3 mx-auto">
                    <img src="img/profile/Leandro Marchioretto.jpg" class="img-fluid rounded-xl" alt="thumb">
                  </div>
                  <a class="mb-3 stretched-link body-link">Funcionario</a>
                  <div class="text-muted text-medium mb-2">Cargo</div>
                  <a class="text-muted text-medium mb-2">Telefone</a><br>
                  <a class="text-muted text-medium mb-2">E-mail</a>
                 <!-- <div class="br-wrapper br-theme-cs-icon d-inline-block">
                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="text-muted d-inline-block text-small align-text-top">(572)</div>-->
                </div> 
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-body text-center">
                  <div class="sw-13 position-relative mb-3 mx-auto">
                    <img src="img/profile/Leandro Marchioretto.jpg" class="img-fluid rounded-xl" alt="thumb">
                  </div>
                  <a class="mb-3 stretched-link body-link">Funcionario</a>
                  <div class="text-muted text-medium mb-2">Cargo</div>
                  <a class="text-muted text-medium mb-2">Telefone</a><br>
                  <a class="text-muted text-medium mb-2">E-mail</a>
                 <!-- <div class="br-wrapper br-theme-cs-icon d-inline-block">
                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="text-muted d-inline-block text-small align-text-top">(572)</div>-->
                </div> 
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-body text-center">
                  <div class="sw-13 position-relative mb-3 mx-auto">
                    <img src="img/profile/Leandro Marchioretto.jpg" class="img-fluid rounded-xl" alt="thumb">
                  </div>
                  <a class="mb-3 stretched-link body-link">Funcionario</a>
                  <div class="text-muted text-medium mb-2">Cargo</div>
                  <a class="text-muted text-medium mb-2">Telefone</a><br>
                  <a class="text-muted text-medium mb-2">E-mail</a>
                 <!-- <div class="br-wrapper br-theme-cs-icon d-inline-block">
                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="text-muted d-inline-block text-small align-text-top">(572)</div>-->
                </div> 
              </div>
            </div>

            <div class="col">
              <div class="card h-100">
                <div class="card-body text-center">
                  <div class="sw-13 position-relative mb-3 mx-auto">
                    <img src="img/profile/Leandro Marchioretto.jpg" class="img-fluid rounded-xl" alt="thumb">
                  </div>
                  <a class="mb-3 stretched-link body-link">Funcionario</a>
                  <div class="text-muted text-medium mb-2">Cargo</div>
                  <a class="text-muted text-medium mb-2">Telefone</a><br>
                  <a class="text-muted text-medium mb-2">E-mail</a>
                 <!-- <div class="br-wrapper br-theme-cs-icon d-inline-block">
                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="text-muted d-inline-block text-small align-text-top">(572)</div>-->
                </div> 
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-body text-center">
                  <div class="sw-13 position-relative mb-3 mx-auto">
                    <img src="img/profile/Leandro Marchioretto.jpg" class="img-fluid rounded-xl" alt="thumb">
                  </div>
                  <a class="mb-3 stretched-link body-link">Funcionario</a>
                  <div class="text-muted text-medium mb-2">Cargo</div>
                  <a class="text-muted text-medium mb-2">Telefone</a><br>
                  <a class="text-muted text-medium mb-2">E-mail</a>
                 <!-- <div class="br-wrapper br-theme-cs-icon d-inline-block">
                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="text-muted d-inline-block text-small align-text-top">(572)</div>-->
                </div> 
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <div class="card-body text-center">
                  <div class="sw-13 position-relative mb-3 mx-auto">
                    <img src="img/profile/Leandro Marchioretto.jpg" class="img-fluid rounded-xl" alt="thumb">
                  </div>
                  <a class="mb-3 stretched-link body-link">Funcionario</a>
                  <div class="text-muted text-medium mb-2">Cargo</div>
                  <a class="text-muted text-medium mb-2">Telefone</a><br>
                  <a class="text-muted text-medium mb-2">E-mail</a>
                 <!-- <div class="br-wrapper br-theme-cs-icon d-inline-block">
                    <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="text-muted d-inline-block text-small align-text-top">(572)</div>-->
                </div> 
              </div>
            </div>
          </div>
          <!-- Time Empresa End -->

          <!-- Content End -->
        </div>
      </div></main>
      <!-- Layout Footer Start -->
      <footer>
        <div class="footer-content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-sm-6">
                <p class="mb-0 text-muted text-medium">Empresa - 2023</p>
              </div>
              <div class="col-sm-6 d-none d-sm-block">
                <ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="#" target="_blank" class="btn-link">Link 1</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="#" target="_blank" class="btn-link">Link 2</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="3" target="_blank" class="btn-link">Link 3</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Layout Footer End -->
    </div>

    <!-- Niches Modal Start -->
    <div class="modal fade modal-right scroll-out-negative" id="niches" data-bs-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="niches" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable full" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Niches</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="scroll-track-visible os-host os-theme-dark os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px; width: 14px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible"><div class="os-content" style="padding: 0px; height: 100%; width: 100%;">
              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Classic Dashboard</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img src="https://acorn.coloredstrategies.com/img/page/classic-dashboard.webp" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a target="_blank" href="https://acorn-html-classic-dashboard.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Html
                      </a>
                      <a target="_blank" href="https://acorn-laravel-classic-dashboard.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Laravel
                      </a>
                      <a target="_blank" href="https://acorn-dotnet-classic-dashboard.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Medical Assistant</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img src="https://acorn.coloredstrategies.com/img/page/medical-assistant.webp" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a target="_blank" href="https://acorn-html-medical-assistant.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Html
                      </a>
                      <a target="_blank" href="https://acorn-laravel-medical-assistant.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Laravel
                      </a>
                      <a target="_blank" href="https://acorn-dotnet-medical-assistant.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Service Provider</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img src="https://acorn.coloredstrategies.com/img/page/service-provider.webp" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a target="_blank" href="https://acorn-html-service-provider.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Html
                      </a>
                      <a target="_blank" href="https://acorn-laravel-service-provider.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Laravel
                      </a>
                      <a target="_blank" href="https://acorn-dotnet-service-provider.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Elearning Portal</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img src="https://acorn.coloredstrategies.com/img/page/elearning-portal.webp" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a target="_blank" href="https://acorn-html-elearning-portal.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Html
                      </a>
                      <a target="_blank" href="https://acorn-laravel-elearning-portal.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Laravel
                      </a>
                      <a target="_blank" href="https://acorn-dotnet-elearning-portal.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Ecommerce Platform</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img src="https://acorn.coloredstrategies.com/img/page/ecommerce-platform.webp" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a target="_blank" href="https://acorn-html-ecommerce-platform.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Html
                      </a>
                      <a target="_blank" href="https://acorn-laravel-ecommerce-platform.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Laravel
                      </a>
                      <a target="_blank" href="https://acorn-dotnet-ecommerce-platform.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Starter Project</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img src="https://acorn.coloredstrategies.com/img/page/starter-project.webp" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image">
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a target="_blank" href="https://acorn-html-starter-project.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Html
                      </a>
                      <a target="_blank" href="https://acorn-laravel-starter-project.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        Laravel
                      </a>
                      <a target="_blank" href="https://acorn-dotnet-starter-project.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Niches Modal End -->

    <!-- Theme Settings & Niches Buttons Start -->
    <div class="settings-buttons-container">
      <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#settings" id="settingsButton">
        <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Settings">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-paint-roller position-relative"><path d="M16 4.5V4.5C16 4.03534 16 3.80302 15.9616 3.60982C15.8038 2.81644 15.1836 2.19624 14.3902 2.03843C14.197 2 13.9647 2 13.5 2L4.5 2C4.03534 2 3.80302 2 3.60982 2.03843C2.81644 2.19624 2.19624 2.81644 2.03843 3.60982C2 3.80302 2 4.03534 2 4.5V4.5C2 4.96466 2 5.19698 2.03843 5.39018C2.19624 6.18356 2.81644 6.80376 3.60982 6.96157C3.80302 7 4.03534 7 4.5 7L13.5 7C13.9647 7 14.197 7 14.3902 6.96157C15.1836 6.80376 15.8038 6.18356 15.9616 5.39018C16 5.19698 16 4.96466 16 4.5V4.5ZM16 4.5V4.5C16.4659 4.5 16.6989 4.5 16.8827 4.57612C17.1277 4.67761 17.3224 4.87229 17.4239 5.11732C17.5 5.30109 17.5 5.53406 17.5 6V8.25C17.5 8.95223 17.5 9.30335 17.3315 9.55557C17.2585 9.66476 17.1648 9.75851 17.0556 9.83147C16.8033 10 16.4522 10 15.75 10H11.75C11.0478 10 10.6967 10 10.4444 10.1685C10.3352 10.2415 10.2415 10.3352 10.1685 10.4444C10 10.6967 10 11.0478 10 11.75V13.5"></path><path d="M10.125 13C10.4761 13 10.6517 13 10.7778 13.0843C10.8324 13.1207 10.8793 13.1676 10.9157 13.2222C11 13.3483 11 13.5239 11 13.875L11 17.125C11 17.4761 11 17.6517 10.9157 17.7778C10.8793 17.8324 10.8324 17.8793 10.7778 17.9157C10.6517 18 10.4761 18 10.125 18L9.875 18C9.52388 18 9.34833 18 9.22221 17.9157C9.16762 17.8793 9.12074 17.8324 9.08427 17.7778C9 17.6517 9 17.4761 9 17.125L9 13.875C9 13.5239 9 13.3483 9.08427 13.2222C9.12074 13.1676 9.16762 13.1207 9.22222 13.0843C9.34833 13 9.52388 13 9.875 13L10.125 13Z"></path></svg>
        </span>
      </button>
      <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#niches" id="nichesButton">
        <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Niches">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-toy position-relative"><path d="M10 9 10 2M16 13V10C16 7.79086 14.2091 6 12 6L8 6C5.79086 6 4 7.79086 4 10V13M6 2H14"></path><path d="M5.26256 14.2626C5.75912 14.7591 6.00739 15.0074 6.06657 15.3049 6.09219 15.4337 6.09219 15.5663 6.06657 15.6951 6.00739 15.9926 5.75912 16.2409 5.26256 16.7374L5.23744 16.7626C4.74088 17.2591 4.49261 17.5074 4.19509 17.5666 4.06629 17.5922 3.93371 17.5922 3.80491 17.5666 3.50739 17.5074 3.25912 17.2591 2.76256 16.7626L2.73744 16.7374C2.24088 16.2409 1.99261 15.9926 1.93343 15.6951 1.90781 15.5663 1.90781 15.4337 1.93343 15.3049 1.99261 15.0074 2.24088 14.7591 2.73744 14.2626L2.76256 14.2374C3.25912 13.7409 3.50739 13.4926 3.80491 13.4334 3.93371 13.4078 4.06629 13.4078 4.19509 13.4334 4.49261 13.4926 4.74088 13.7409 5.23744 14.2374L5.26256 14.2626zM17.2626 14.2626C17.7591 14.7591 18.0074 15.0074 18.0666 15.3049 18.0922 15.4337 18.0922 15.5663 18.0666 15.6951 18.0074 15.9926 17.7591 16.2409 17.2626 16.7374L17.2374 16.7626C16.7409 17.2591 16.4926 17.5074 16.1951 17.5666 16.0663 17.5922 15.9337 17.5922 15.8049 17.5666 15.5074 17.5074 15.2591 17.2591 14.7626 16.7626L14.7374 16.7374C14.2409 16.2409 13.9926 15.9926 13.9334 15.6951 13.9078 15.5663 13.9078 15.4337 13.9334 15.3049 13.9926 15.0074 14.2409 14.7591 14.7374 14.2626L14.7626 14.2374C15.2591 13.7409 15.5074 13.4926 15.8049 13.4334 15.9337 13.4078 16.0663 13.4078 16.1951 13.4334 16.4926 13.4926 16.7409 13.7409 17.2374 14.2374L17.2626 14.2626zM11.2626 10.2626C11.7591 10.7591 12.0074 11.0074 12.0666 11.3049 12.0922 11.4337 12.0922 11.5663 12.0666 11.6951 12.0074 11.9926 11.7591 12.2409 11.2626 12.7374L11.2374 12.7626C10.7409 13.2591 10.4926 13.5074 10.1951 13.5666 10.0663 13.5922 9.93371 13.5922 9.80491 13.5666 9.50739 13.5074 9.25912 13.2591 8.76256 12.7626L8.73744 12.7374C8.24088 12.2409 7.99261 11.9926 7.93343 11.6951 7.90781 11.5663 7.90781 11.4337 7.93343 11.3049 7.99261 11.0074 8.24088 10.7591 8.73744 10.2626L8.76256 10.2374C9.25912 9.74088 9.50739 9.49261 9.80491 9.43343 9.93371 9.40781 10.0663 9.40781 10.1951 9.43343 10.4926 9.49261 10.7409 9.74088 11.2374 10.2374L11.2626 10.2626z"></path></svg>
        </span>
      </button>
    </div>
    <!-- Theme Settings & Niches Buttons End -->

    <!-- Search Modal Start -->
    <?php echo $BuscarBarra_php ?>
    <!-- Search Modal End -->

    <!-- Vendor Scripts Start -->
    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/cs/autocomplete.custom.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="icon/acorn-icons-learning.js"></script>
    <script src="icon/acorn-icons-commerce.js"></script>


    <script src="js/vendor/glide.min.js"></script>

    <script src="js/vendor/Chart.bundle.min.js"></script>

    <script src="js/vendor/jquery.barrating.min.js"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <!-- Template Base Scripts End -->
    <!-- Meu JS -->
    <script src="Busca.js"></script>
    <!-- Fim Meu JS -->
    <!-- Meu CSS -->
    <link rel="stylesheet" href="Busca.css">
    <!-- Fim Meu CSS -->
    <!-- Page Specific Scripts Start -->

    <script src="js/cs/glide.custom.js"></script>

    <script src="js/cs/charts.extend.js"></script>

    <script src="js/pages/dashboard.elearning.js"></script>

    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Page Specific Scripts End -->
  

</body></html>