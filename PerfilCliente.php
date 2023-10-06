<?php

/* Banco de Dados */
include('conexao.php');

// Verificar Cliente
include('VerificarCliente.php');

// Navbar
include('Navbar.php');

// Barra de Buscar
include('BuscarBarra.php');

// Ultimas Operacoes
include('UltimasOperacoesdoCliente.php');

// Dados
include('DadosPerfilCliente.php');

?>


<!DOCTYPE html>
<html lang="pt-BR" data-footer="true">
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Perfil do cliente - Empresa</title>
    <meta name="title" content="Perfil do cliente - Empresa">
    <meta name="description" content="Modo de visualização de clientes.">
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
                  <h1 class="mb-0 pb-0 display-5" id="title">Perfil do cliente</h1>
                </div>
              </div>
              <!-- Title End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <!-- Perfil do cliente Start -->
          <div class="row g-5">
            <!-- Left Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
              <!-- Biography Start -->
              <h2 class="small-title">Perfil e dados de contato</h2>
              <div class="card">
                <div class="card-body mb-n5">
                  <div class="d-flex align-items-center flex-column mb-5">
                    <div class="mb-4 d-flex align-items-center flex-column">
                      <div class="sw-13 position-relative mb-3">
                        <img style="display:none;" src="img/cliente/cliente1.jpeg" class="img-fluid rounded-xl" alt="nome do cliente" />
                      </div>
                      <div class="h5 mb-0"><?php echo $Cliente ?></div>
                      <div class="text-muted mb-2"><?php echo $CNPJ_CPF ?></div>
                      <div class="text-muted text-center"><?php echo $SetordeAtuacao ?></div>
                    </div>
                    <div class="d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100">
                      <form action="EditarCliente.php" method="post">
                        <button type="submit" class="btn btn-primary w-95 me-2">Editar cliente</button>
                        <input type="text" style="display: none;" value="<?php echo $Cliente ?>" name="BuscarNomeDoCliente">
                      </form>
                      <?php
                      if($_SESSION['NivelDeAcesso'] <= '3'){
                        echo '
                      <form action="RegistrarOperacao.php" method="post">
                        <button type="submit" class="btn btn-outline-primary w-95 me-2">Nova operação</button>
                        <input type="text" style="display: none;" value="'.$Cliente.'" name="BuscarNomeDoCliente">
                        <input type="text" style="display: none;" value="'.$CNPJ_CPF.'" name="BuscarCNPJ_CPF">
                      </form>
                      <!-- COLCOAR AQUI BOTÃO DE DESATIVAR CLIENTE -->
                      <button data-bs-toggle="modal" data-bs-target="#DesativarCliente" class="btn btn-icon btn-icon-only btn-outline-primary" type="button">'
                      ;

                      }

                      ?>
                        <i data-acorn-icon="more-horizontal"></i>
                      </button>
                    </div>
                  </div>
                  <div class="mb-5">
                    <p class="text-small text-muted mb-2">OBSERVAÇÕES</p>
                    <p>
                      <?php echo $Observacoes ?>
                    </p>
                  </div>
                  <div class="mb-5">
                    <p class="text-small text-muted mb-2">CONTATOS</p>
                    <a href="#" class="d-block body-link mb-1">
                      <i data-acorn-icon="user" class="me-2" data-acorn-size="17"></i>
                      <span class="align-middle"><?php echo $ResponsavelPelaOperacao ?></span>
                    </a>
                    <a href="#" class="d-block body-link mb-1">
                      <i data-acorn-icon="phone" class="me-2" data-acorn-size="17"></i>
                      <span class="align-middle"><?php echo $Telefone ?></span>
                    </a>
                    <a href="#" class="d-block body-link mb-1">
                      <i data-acorn-icon="message" class="me-2" data-acorn-size="17"></i>
                      <span class="align-middle"><?php echo $Whatsapp ?></span>
                    </a>
                    <a href="#" class="d-block body-link mb-1">
                      <i data-acorn-icon="email" class="me-2" data-acorn-size="17"></i>
                      <span class="align-middle"><?php echo $Email ?></span>
                    </a>
                    <a href="#" class="d-block body-link mb-1">
                      <i data-acorn-icon="screen" class="me-2" data-acorn-size="17"></i>
                      <span class="align-middle"><?php echo $Site ?></span>
                    </a>               
                  </div>

                    <!-- Dados do cliente Start -->
                  <div class="mb-5">
                    <div class="row g-0 align-items-center mb-1">
                      <div class="col-auto">
                        <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="user" class="text-primary"></i>
                        </div>
                      </div>
                      <div class="col ps-3">
                        <div class="row g-0">
                          <div class="col">
                            <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Comercial</div>
                          </div>
                          <div class="col-auto">
                            <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $Comercial ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center mb-1">
                      <div class="col-auto">
                        <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                          <i data-acorn-icon="sale-tag" class="text-primary"></i>
                        </div>
                      </div>
                      <div class="col ps-3">
                        <div class="row g-0">
                          <div class="col">
                            <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Comissão</div>
                          </div>
                          <div class="col-auto">
                            <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $Comissao*100 . '%' ?></div>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    

                    <!-- Perfil do cliente End -->
                  </div>
                </div>
              </div>



              <!-- Biography End -->
            </div>
            <!-- Left Side End -->

            <!-- Right Side Start -->
            <div class="col-12 col-xl-8 col-xxl-9">
              <!-- Performance geral do cliente Start -->
              <h2 class="small-title">Histórico do cliente</h2>
              <div class="row g-3 mb-5">
                <div class="col-12 col-lg-6 col-xxl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Operações</span>
                        <i data-acorn-icon="invoice" class="text-primary"></i>
                      </div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $OperacoesAnoAnterior ?>/Ano</span>
                      </div>
                      <div class="cta-1 text-primary"><?php echo $OperacoesMesAnterior ?>/Mês</div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Volume em dólares</span>
                        <i data-acorn-icon="dollar" class="text-primary"></i>
                      </div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $VolumeEmDolarAno ?>/Ano</span>
                      </div>
                      <div class="cta-1 text-primary"><?php echo $VolumeEmDolarMes ?>/Mês</div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Spread Médio</span>
                        <i data-acorn-icon="sale-tag" class="text-primary"></i>
                      </div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $SpreadMedioAno . '%' ?>/Ano</span>
                      </div>
                      <div class="cta-1 text-primary"><?php echo $SpreadMedioMes . '%' ?>/Mês</div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-6 col-xxl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                        <span>Spot/Taxa Médio</span>
                        <i data-acorn-icon="chart-2" class="text-primary"></i>
                      </div>
                      <div class="text-medium text-muted mb-1">
                        <span class="text"><?php echo $SpotMedioAno ?>/<?php echo $TaxaFinalAno ?>/Ano</span>
                      </div>
                      <div class="cta-1 text-primary"><?php echo $SpotMedioMes ?>/<?php echo $TaxaFinalMes ?>/Mês</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Performance geral do cliente End -->

                <!-- Dados bancários Start -->
              <h2 class="small-title">Dados bancários</h2>
              <div class="row row-cols-1 row-cols-sm-1 row-cols-xxl-2 g-3 mb-5">
                <div class="col">
                  <div class="card h-100">
                    <div class="card-body">
                      <h5 class="heading mb-2">
                        
                          <span class="clamp-line sh-6 lh-1-5" data-line="2">Banco principal</span>
                        
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
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Banco</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $Banco ?></div>
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
                      <div class="row g-0 align-items-center">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="invoice" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col ps-3">
                          <div class="row g-0">
                            <div class="col">
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Tarifa</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $TarifaBanco ?></div>
                            </div>
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
                          <span class="clamp-line sh-6 lh-1-5" data-line="2">Banco secundário</span>
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
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Banco</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $Banco_2 ?></div>
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
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $NumerodaContaBanco_2 ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row g-0 align-items-center">
                        <div class="col-auto">
                          <div class="sw-3 sh-4 d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="invoice" class="text-primary"></i>
                          </div>
                        </div>
                        <div class="col ps-3">
                          <div class="row g-0">
                            <div class="col">
                              <div class="text-alternate sh-4 d-flex align-items-center lh-1-25">Tarifa</div>
                            </div>
                            <div class="col-auto">
                              <div class="sh-4 d-flex align-items-center text-alternate"><?php echo $TarifaBanco_2 ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>                
              </div>
              <!-- Dados Bancários End -->

              <!-- Últimas operações DO CLIENTE Start -->
            <div class="col-lg-12 mb-5">
              <div class="d-flex justify-content-between">
                <h2 class="small-title">Últimas operações do cliente</h2>
                
              </div>
              <div class="scroll-out">
                <div class="scroll-by-count os-host os-theme-dark os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition" data-count="5" style="height: 359.891px; margin-bottom: -8px;"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -15px; width: 805px; height: 367px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 15px; height: 100%; width: 100%;">
                  
                  <!-- Ultimas Operações Começo -->

                   <?php echo $UltimasOperacoesdoCliente ?>
                  
                  <!-- Ultimas Operações Fim -->

                  </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden" style="height: calc(100% - 8px);"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="height: 50.5618%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
                </div>
              </div>
              <!-- Últimas operações End -->
            </div>
          </div>
          <!-- Content End -->
        </div>
      </main>
      <!-- Layout Footer Start -->
      <footer>
        <div class="footer-content">
          <div class="container">
            <div class="row">
              <div class="col-12 col-sm-6">
                <p class="mb-0 text-muted text-medium">Colored Strategies 2021</p>
              </div>
              <div class="col-sm-6 d-none d-sm-block">
                <ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Review</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://1.envato.market/BX5oGy" target="_blank" class="btn-link">Purchase</a>
                  </li>
                  <li class="breadcrumb-item mb-0 text-medium">
                    <a href="https://acorn-html-docs.coloredstrategies.com/" target="_blank" class="btn-link">Docs</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Layout Footer End -->
    </div>
    <!-- Theme Settings Modal Start -->
    <div
      class="modal fade modal-right scroll-out-negative"
      id="settings"
      data-bs-backdrop="true"
      tabindex="-1"
      role="dialog"
      aria-labelledby="settings"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-scrollable full" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Theme Settings</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="scroll-track-visible">
              <div class="mb-5" id="color">
                <label class="mb-3 d-inline-block form-label">Color</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-blue" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="blue-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT BLUE</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-blue" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="blue-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK BLUE</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-teal" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="teal-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT TEAL</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-teal" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="teal-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK TEAL</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-sky" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="sky-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT SKY</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-sky" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="sky-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK SKY</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-red" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="red-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT RED</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-red" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="red-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK RED</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-green" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="green-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT GREEN</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-green" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="green-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK GREEN</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-lime" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="lime-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT LIME</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-lime" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="lime-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK LIME</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-pink" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="pink-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT PINK</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-pink" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="pink-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK PINK</span>
                    </div>
                  </a>
                </div>
                <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="light-purple" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="purple-light"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT PURPLE</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-purple" data-parent="color">
                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                      <div class="purple-dark"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK PURPLE</span>
                    </div>
                  </a>
                </div>
              </div>

              <div class="mb-5" id="navcolor">
                <label class="mb-3 d-inline-block form-label">Override Nav Palette</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap">
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="default" data-parent="navcolor">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DEFAULT</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="light" data-parent="navcolor">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-secondary figure-light top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">LIGHT</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="dark" data-parent="navcolor">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-muted figure-dark top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">DARK</span>
                    </div>
                  </a>
                </div>
              </div>

              <div class="mb-5" id="behaviour">
                <label class="mb-3 d-inline-block form-label">Menu Behaviour</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="pinned" data-parent="behaviour">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary left large"></div>
                      <div class="figure figure-secondary right small"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">PINNED</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="unpinned" data-parent="behaviour">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary left"></div>
                      <div class="figure figure-secondary right"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">UNPINNED</span>
                    </div>
                  </a>
                </div>
              </div>

              <div class="mb-5" id="layout">
                <label class="mb-3 d-inline-block form-label">Layout</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap">
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="fluid" data-parent="layout">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">FLUID</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-50 option col" data-value="boxed" data-parent="layout">
                    <div class="card rounded-md p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom small"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">BOXED</span>
                    </div>
                  </a>
                </div>
              </div>

              <div class="mb-5" id="radius">
                <label class="mb-3 d-inline-block form-label">Radius</label>
                <div class="row d-flex g-3 justify-content-between flex-wrap">
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="rounded" data-parent="radius">
                    <div class="card rounded-md radius-rounded p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">ROUNDED</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="standard" data-parent="radius">
                    <div class="card rounded-md radius-regular p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">STANDARD</span>
                    </div>
                  </a>
                  <a href="#" class="flex-grow-1 w-33 option col" data-value="flat" data-parent="radius">
                    <div class="card rounded-md radius-flat p-3 mb-1 no-shadow">
                      <div class="figure figure-primary top"></div>
                      <div class="figure figure-secondary bottom"></div>
                    </div>
                    <div class="text-muted text-part">
                      <span class="text-extra-small align-middle">FLAT</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Theme Settings Modal End -->

    <!-- Niches Modal Start -->
    <div
      class="modal fade modal-right scroll-out-negative"
      id="niches"
      data-bs-backdrop="true"
      tabindex="-1"
      role="dialog"
      aria-labelledby="niches"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-scrollable full" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Niches</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="scroll-track-visible">
              <div class="mb-5">
                <label class="mb-2 d-inline-block form-label">Classic Dashboard</label>
                <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                  <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/classic-dashboard.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-classic-dashboard.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-classic-dashboard.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-classic-dashboard.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
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
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/medical-assistant.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-medical-assistant.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-medical-assistant.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-medical-assistant.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
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
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/service-provider.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-service-provider.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-service-provider.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-service-provider.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
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
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/elearning-portal.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-elearning-portal.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-elearning-portal.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-elearning-portal.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
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
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/ecommerce-platform.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-ecommerce-platform.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-ecommerce-platform.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-ecommerce-platform.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
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
                    <img
                      src="https://acorn.coloredstrategies.com/img/page/starter-project.webp"
                      class="img-fluid rounded-sm lower-opacity border border-separator-light"
                      alt="card image"
                    />
                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                      <a
                        target="_blank"
                        href="https://acorn-html-starter-project.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Html
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-laravel-starter-project.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        Laravel
                      </a>
                      <a
                        target="_blank"
                        href="https://acorn-dotnet-starter-project.coloredstrategies.com/"
                        class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1"
                      >
                        .Net5
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Niches Modal End -->

    <!-- Theme Settings & Niches Buttons Start -->
    <div class="settings-buttons-container">
      <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#settings" id="settingsButton">
        <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Settings">
          <i data-acorn-icon="paint-roller" class="position-relative"></i>
        </span>
      </button>
      <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#niches" id="nichesButton">
        <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Niches">
          <i data-acorn-icon="toy" class="position-relative"></i>
        </span>
      </button>
    </div>
    <!-- Theme Settings & Niches Buttons End -->

    <!-- Search Modal Start -->
    <?php echo $BuscarBarra_php ?>
    <!-- Search Modal End -->

    <!-- Desativar Cliente Começo -->
    
    <?php 

    if($_SESSION['NivelDeAcesso'] <= '3'){

      echo "
        <div class='modal fade modal-under-nav modal-search modal-close-out' id='DesativarCliente' tabindex='-1' style='display: none;' aria-hidden='true'>
          <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
              <div class='modal-header border-0 p-0'>
                <button type='button' class='btn-close btn btn-icon btn-icon-only btn-foreground' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <form action='ExcluirOperacao.php' method='post' class='modal-body ps-5 pe-5 pb-0 border-0'>
              <div class='modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0'>
                <p>Realmente Deseja Desativar o Cliente?</p>
                <input style='display: none;' name='Cliente' value='".$Cliente."'>
                <input style='display: none;' name='CNPJ_CPF' value='".$CNPJ_CPF."'>
                <input type='checkbox' required>Tenho Certeza
                <input type='submit' value='Desativar' class='btn btn-icon btn-icon-end btn-primary w-100'>
              </div>
            </form>
            </div>
          </div>
        </div>";

    }

    ?>

    <!-- Desativar Cliente Fim -->


    <!-- Vendor Scripts Start -->
    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="icon/acorn-icons-learning.js"></script>
    <script src="icon/acorn-icons-commerce.js"></script>
    <script src="js/vendor/select2.full.min.js"></script>
    <script src="js/vendor/timepicker.js"></script>


    <script src="js/vendor/jquery.barrating.min.js"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->

    <script src="js/pages/instructor.detail.js"></script>

    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Page Specific Scripts End -->
  </body>
</html>
