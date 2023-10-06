<?php

/* Banco de Dados */
include('conexao.php');

// Navbar
include('Navbar.php');

// Barra de Buscar
include('BuscarBarra.php');

// Dados
include('DadosContratoCambio.php');

$Local = "ContratoCambioPDF/" . $IDdoContrato . '.pdf';

?>

<!DOCTYPE html>
<html lang="pt-BR" data-footer="true">
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Contrato - Empresa</title>
    <meta name="title" content="Contrato - Empresa">
    <meta name="description" content="Visão resumida do Contrato e o arquivo do contrato anexo.">
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
              <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-40">
                  <a href="Dashboard.php" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-medium align-middle">Voltar ao dashboard</span>
                  </a>
                  <h1 class="mb-0 pb-0 display-5" id="title">Contrato Nº <?php echo $IDdoContrato ?></h1>
                  <a href="SelecionarOperacao.php" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-medium align-middle">Voltar Para Edição</span>
                  </a>
                </div>
              </div>
              <!-- Title End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <!-- Content Start -->

          <div class="row">


 <!-- Customer Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
              <h2 class="small-title">Visão geral</h2>
              <div class="card">
                <div class="card-body mb-n5">
                  <div class="d-flex align-items-center flex-column">
                    <div class="mb-5 d-flex align-items-center flex-column">
                      <div style="display:none !important;" class="sw-6 sh-6 mb-3 d-inline-block bg-primary d-flex justify-content-center align-items-center rounded-xl">
                        <div class="text-white">BC</div>
                      </div>
                      <div class="h5 mb-0"><?php echo $Cliente ?></div>
                      <div class="text-muted mb-2"><?php echo $CNPJ_CPF ?></div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div class="d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100 mb-5">
                      <?php 
                        // Verificando Nivel de Acesso
                        if($_SESSION['NivelDeAcesso'] <= '3'){

                          echo "
                        <form action='EditarOperacao.php' method='post'>
                          <input style='display: none;' name='NumeroDaOperacaoBusca' value='".$NumeroDaOperacao."'>
                          <input style='display: none;' name='IDdoContrato' value='".$IDdoContrato."'>
                          <input type='submit' class='btn btn-primary w-90 me-2' value='Editar'>
                        </form>
                        <button style='display: none;' type='button' class='btn btn-outline-primary w-90 me-2'>Baixar PDF</button>
                        <button data-bs-toggle='modal' data-bs-target='#ExcluirOperacao' class='btn btn-icon btn-icon-only btn-outline-primary' type='button'>"
                        ;

                        }

                      ?>
                        <i data-acorn-icon="more-horizontal"></i>
                      </button>
                    </div>
                  </div>
                  <div class="mb-5">
                    <div class="row g-0 align-items-center mb-2">
                      <div class="col-auto">
                        <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="calendar" class="text-primary"></i>
                        </div>
                      </div>
                      <div class="col ps-3">
                        <div class="row g-0">
                          <div class="col">
                            <div class="sh-5 d-flex align-items-center lh-1-25">Data</div>
                          </div>
                          <div class="col-auto">
                            <div class="sh-5 d-flex align-items-center"><?php echo $Data ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center mb-2">
                      <div class="col-auto">
                        <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="barcode" class="text-primary"></i>
                        </div>
                      </div>
                      <div class="col ps-3">
                        <div class="row g-0">
                          <div class="col">
                            <div class="sh-5 d-flex align-items-center lh-1-25">Nº contrato</div>
                          </div>
                          <div class="col-auto">
                            <div class="sh-5 d-flex align-items-center"><?php echo $IDdoContrato ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row g-0 align-items-center mb-2">
                      <div class="col-auto">
                        <div class="border border-primary sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="tag" class="text-primary"></i>
                        </div>
                      </div>
                      <div class="col ps-3">
                        <div class="row g-0">
                          <div class="col">
                            <div class="sh-5 d-flex align-items-center lh-1-25">Natureza</div>
                          </div>
                          <div class="col-auto">
                            <div class="sh-5 d-flex align-items-center"><?php echo $Natureza ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-5">
                    <div>
                      <p class="text-small text-muted mb-2">SOLICITANTE DA OPERAÇÃO</p>
                      <div class="row g-0 mb-2">
                        <div class="col-auto">
                          <div class="sw-3 me-1">
                            <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                          </div>
                        </div>
                        <div class="col text-alternate align-middle"><?php echo $ResponsavelPelaOperacao ?></div>
                      </div>
                      <div class="row g-0 mb-2">
                        <div class="col-auto">
                          <div class="sw-3 me-1">
                            <i data-acorn-icon="phone" class="text-primary" data-acorn-size="17"></i>
                          </div>
                        </div>
                        <div class="col text-alternate"><?php echo $Telefone ?></div>
                      </div>
                      <div class="row g-0 mb-2">
                        <div class="col-auto">
                          <div class="sw-3 me-1">
                            <i data-acorn-icon="message" class="text-primary" data-acorn-size="17"></i>
                          </div>
                        </div>
                        <div class="col text-alternate">+<?php echo $Whatsapp ?></div>
                      </div>
                      <div class="row g-0 mb-2">
                        <div class="col-auto">
                          <div class="sw-3 me-1">
                            <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                          </div>
                        </div>
                        <div class="col text-alternate"><?php echo $Email ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-5">
                    <div>
                      <p class="text-small text-muted mb-2">OPERADOR RESPONSÁVEL</p>
                      <div class="row g-0 mb-2">
                        <div class="col-auto">
                          <div class="sw-3 me-1">
                            <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                          </div>
                        </div>
                        <div class="col text-alternate align-middle"><?php echo $OperadorResponsavel ?></div>
                      </div>
                      <div class="row g-0 mb-2">
                        <div class="col-auto">
                          <div class="sw-3 me-1">
                            <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                          </div>
                        </div>
                        <div class="col text-alternate"><?php echo $OperadorResponsavelEmail ?></div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="mb-5">
                    <div>
                      <p class="text-small text-muted mb-2">RESPONSÁVEL PELO REGISTRO</p>
                      <div class="row g-0 mb-2">
                        <div class="col-auto">
                          <div class="sw-3 me-1">
                            <i data-acorn-icon="user" class="text-primary" data-acorn-size="17"></i>
                          </div>
                        </div>
                        <div class="col text-alternate align-middle"><?php echo $UserNameRegistro ?></div>
                      </div>
                      <div class="row g-0 mb-2">
                        <div class="col-auto">
                          <div class="sw-3 me-1">
                            <i data-acorn-icon="calendar" class="text-primary" data-acorn-size="17"></i>
                          </div>
                        </div>
                        <div class="col text-alternate"><?php echo $DataRegistro ?></div>
                      </div>
                      <div class="row g-0 mb-2">
                        <div class="col-auto">
                          <div class="sw-3 me-1">
                            <i data-acorn-icon="email" class="text-primary" data-acorn-size="17"></i>
                          </div>
                        </div>
                        <div class="col text-alternate"><?php echo $UsuarioRegistro ?></div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Customer End -->

            <div class="col-12 col-xl-8 col-xxl-9">
              <!-- Volumetrica do Contrato Start -->

              <h2 class="small-title">Valores do contrato</h2>
              <div class="row g-3 mb-5">
                <div class="col-12 col-lg-6 col-xxl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Volume do contrato</span>
                        <i data-acorn-icon="money-bag" class="text-primary"></i>
                      </div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $ValorEmDolar ?></span>
                      </div>
                      <div class="cta-1 text-primary"><?php echo $Valor ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Spot/Taxa</span>
                        <i data-acorn-icon="chart-2" class="text-primary"></i>
                      </div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $TipoDeOperacao ?></span>
                      </div>
                      <div class="cta-1 text-primary"><?php echo 'R$ ' . ' ' . $TaxaFinal . '/' . $Spot ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Spread da operação</span>
                        <i data-acorn-icon="sale-tag" class="text-primary"></i>
                      </div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text">Valor em %</span>
                      </div>
                      <div class="cta-1 text-primary"><?php echo $Spread . '%' ?></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Tarifa cobrada</span>
                        <i data-acorn-icon="invoice" class="text-primary"></i>
                      </div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $TarifaBanco ?></span>
                      </div>
                      <div class="cta-1 text-primary"><?php echo $TarifaCobrada ?></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Volumetrica do Contrato Start -->

                <!-- ORIGEM E DESTINO DA OPERAÇÃO Start -->
              <h2 class="small-title">Dados bancários</h2>
              <div class="row row-cols-1 row-cols-sm-1 row-cols-xxl-2 g-3 mb-5">
                <div class="col">
                  <div class="card h-100">
                    <div class="card-body">
                      <h5 class="heading mb-2">
                        
                          <span class="clamp-line sh-6 lh-1-5" data-line="2">Cliente</span>                        
                      </h5>

                       <div class="row g-0 align-items-center mb-1">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="building-large" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col ps-3">
                          <div class="row g-0">
                            <div class="col">
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Cliente</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php $Cliente ?></div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row g-0 align-items-center mb-1">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="building" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col ps-3">
                          <div class="row g-0">
                            <div class="col">
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Agência</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php $Agencia ?></div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row g-0 align-items-center mb-1">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="wallet" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col ps-3">
                          <div class="row g-0">
                            <div class="col">
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Conta</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $NumerodaConta ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row g-0 align-items-center mb-1">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="credit-card" class="text-primary"></i>
                          </div>
                        </div>
                      </div>

                     


                      
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100">
                    <div class="card-body">
                      <h5 class="heading mb-2">
                        
                          <span class="clamp-line sh-6 lh-1-5" data-line="2">Banco</span>
                        
                      </h5>

                      <div class="row g-0 align-items-center mb-1">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="flag" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col ps-3">
                          <div class="row g-0">
                            <div class="col">
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">País de destino</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $NomedoPais ?></div>
                            </div>
                          </div>
                        </div>
                      
                      <div class="row g-0 align-items-center mb-1">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="building-large" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col ps-3">
                          <div class="row g-0">
                            <div class="col">
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Banco</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $BancoEstrangeiro ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row g-0 align-items-center mb-1">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="wallet" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col ps-3">
                          <div class="row g-0">
                            <div class="col">
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Conta</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $ContaBancoEstrangeiro ?></div>
                            </div>
                          </div>
                        </div>
                      </div>                      

                       <div class="row g-0 align-items-center mb-1">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="terminal" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col ps-3">
                          <div class="row g-0">
                            <div class="col">
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Código SWIFT</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $CodigoSWIFT ?></div>
                            </div>
                          </div>
                        </div>
                     
                      
                    </div>
                  </div>
                </div>                
              </div>
            </div>
              <!-- ORIGEM E DESTINO DA OPERAÇÃO End -->

              

          <!-- Content End -->
        </div>

         <!-- Uploaded Files Start -->
                <section class="scroll-section" id="uploadedFiles">
                  <h2 class="small-title">Arquivos excepcionais</h2>
                  <div class="card mb-3">
                    <div class="card-body">
                      <a href="<?php echo $Local ?>" target="_blank">PDF do Contrato</a>
                    </div>
                  </div>
                </section>
                <!-- Uploaded Files End -->
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
                    <a href="#" target="_blank" class="btn-link">Link 3</a>
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

    <?php 

    if($_SESSION['NivelDeAcesso'] <= '3'){

      echo "
        <!-- Excluir Operação Começo -->
        <div class='modal fade modal-under-nav modal-search modal-close-out' id='ExcluirOperacao' tabindex='-1' style='display: none;' aria-hidden='true'>
          <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
              <div class='modal-header border-0 p-0'>
                <button type='button' class='btn-close btn btn-icon btn-icon-only btn-foreground' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <form action='ExcluirOperacao.php' method='post' class='modal-body ps-5 pe-5 pb-0 border-0'>
              <div class='modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0'>
                <p>Realmente Deseja Excluir a Operação?</p>
                <input style='display: none;' name='NumeroDaOperacaoBusca' value='".$NumeroDaOperacao."'>
                <input style='display: none;' name='IDdoContrato' value='".$IDdoContrato."'>
                <input type='checkbox' required>Tenho Certeza
                <input type='submit' value='Excluir' class='btn btn-icon btn-icon-end btn-primary w-100'>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Excluir Operação Fim -->";

    }

    ?>

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