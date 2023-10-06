<?php

/* Banco de Dados */
include('conexao.php');

// Navbar
include('Navbar.php');

// Cliente Dados Para Editar
include('DadosEditarOperacao.php');

// Barra de Buscar
include('BuscarBarra.php');

// Barra de Buscar
include('VariaveisOperacoes.php');

?>

<!DOCTYPE html>
<html lang="pt-BR" data-footer="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Registro de operação - Empresa</title>
    <meta name="description" content="Página de registro de operação" />
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
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="font/CS-Interface/style.css" />
    <!-- Font Tags End -->
    <!-- Vendor Styles Start -->
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/OverlayScrollbars.min.css" />

    <link rel="stylesheet" href="css/vendor/select2.min.css" />

    <link rel="stylesheet" href="css/vendor/select2-bootstrap4.min.css" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="css/styles.css" />
    <!-- Template Base Styles End -->
    <link rel="stylesheet" href="css/vendor/dropzone.min.css">
    <link rel="stylesheet" href="css/main.css" />
    <script src="js/base/loader.js"></script>
  </head>
<html data-override='{"attributes": {"color": "dark-green" }}'>
   <body onmouseover="FuncaoSpread() + FuncaoReceitaBruta()" class="" data-bs-padding="22px"><div id="paddingModal" class="modal" aria-hidden="true" style="display: none;"> <div class="modal-dialog d-none"><div class="modal-content"></div></div> </div>
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
                <div class="w-auto sw-md-30">
                  <a href="Dashboard.php" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-medium align-middle">Voltar ao dashboard</span>
                  </a>
                  <h1 class="mb-0 pb-0 display-5" id="title">Atualizar Operação</h1>
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

          <div class="row">
            <div class="col-12 col-xl-9 col-lg order-1 order-lg-0">
              <h2 class="small-title">Dados do cliente</h2>

              <form action="UpdateOperacao.php" method="post" id="addressForm" class="tooltip-label-end" enctype="multipart/form-data">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row g-3">
                      <div class="col-md-4 mb-3 filled">
                        <i data-acorn-icon="building"></i>
                        <input class="form-control" name="Cliente" placeholder="Nome do cliente" value="<?php echo $Cliente; ?>" readonly>
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="credit-card"></i>
                        <input class="form-control" name="CNPJ_CPF" placeholder="CNPJ/CPF do cliente" value="<?php echo $CNPJ_CPF; ?>" readonly>
                      </div>

                      <div class="col-md-2 mb-3 filled">
                        <i data-acorn-icon="credit-card"></i>
                        <input class="form-control" name="PFPJ" placeholder="PF/PJ" value="<?php echo $PFPJ; ?>" readonly>
                      </div>

                       <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="user"></i>
                        <input class="form-control" name="ResponsavelPelaOperacao" placeholder="Funcionario do cliente" value="<?php echo $ResponsavelPelaOperacao; ?>" readonly>
                      </div>

                      <div class="col-md-4 mb-3 filled">
                        <i data-acorn-icon="user"></i>
                        <input class="form-control" name="Comercial" placeholder="Comercial responsável" value="<?php echo $Comercial ?>" readonly>
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="category"></i>
                        <input class="form-control" name="Equipe" placeholder="Equipe" value="<?php echo $Equipe; ?>" readonly>
                      </div>

                      <div class="col-md-2 mb-3 filled">
                        <i data-acorn-icon="credit-card"></i>
                        <input class="form-control" name="ComissaoBanco" id="ComissaoBanco" value="<?php echo $ComissaoBanco; ?>">
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="phone"></i>
                        <input class="form-control" name="Telefone" placeholder="Telefone" value="<?php echo $Telefone; ?>" readonly>
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="message"></i>
                        <input class="form-control" name="Whatsapp" placeholder="Whatsapp" value="<?php echo $Whatsapp; ?>" readonly>
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="globe"></i>
                        <input class="form-control" name="Estado" placeholder="Estado" value="<?php echo $Estado; ?>" readonly>
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="building-large"></i>
                        <input class="form-control" name="Cidade" placeholder="Cidade" value="<?php echo $Cidade; ?>" readonly>
                      </div>

                      <div class="col-md-4 mb-3 filled">
                        <i data-acorn-icon="pin"></i>
                        <input class="form-control" name="Endereco" placeholder="Endereço" value="<?php echo $Endereco; ?>" readonly>
                      </div>


                      <div class="col-md-2 mb-3 filled">
                        <i data-acorn-icon="pin"></i>
                        <input class="form-control" name="Cep" placeholder="CEP" value="<?php echo $Cep; ?>" readonly>
                      </div>

                       
                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="category"></i>
                        <input class="form-control" name="SetordeAtuacao" placeholder="Setor de atuação" value="<?php echo $SetordeAtuacao; ?>" readonly>
                      </div>
             
                      <div class="col-md-2 mb-3 filled">
                        <i data-acorn-icon="tag"></i>
                        <input class="form-control" name="NumeroDaOperacao" placeholder="Número da Operação" value="<?php echo $NumeroDaOperacao; ?>" readonly>
                      </div>

                    </div>
                  </div>
                </div>



 <h2 class="small-title">Dados do banco</h2>

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row g-3">

                      <div class="col-md-4 mb-3 filled">
                        <i data-acorn-icon="money-bag"></i>
                        <?php echo $BancoDados ?>
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="credit-card"></i>
                        <input class="form-control" name="BancoCNPJ" id="BancoCNPJ" value="<?php echo $BancoCNPJ; ?>" readonly>
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="calendar"></i>
                        <input type="text" class="data form-control" name="Data" placeholder="Data da operação" id="datePickerFilled" value="<?php echo $Data; ?>">
                      </div>

                        <div class="col-md-2 mb-3 filled">
                        <i data-acorn-icon="wallet"></i>
                        <input class="form-control" name="NumerodaConta" placeholder="Nº da conta" value="<?php echo $NumerodaConta; ?>">
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="wallet"></i>
                        <input class="form-control" name="NomedoPais" placeholder="País Destino" value="<?php echo $NomedoPais ?>">
                      </div>

                      <div class="col-md-4 mb-3 filled">
                        <i data-acorn-icon="money-bag"></i>
                        <input class="form-control" name="BancoEstrangeiro" placeholder="Banco Estrangeiro" value="<?php echo $BancoEstrangeiro ?>">
                      </div>


                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="credit-card"></i>
                        <input class="form-control" name="ContaBancoEstrangeiro" placeholder="Conta Banco Estrangeiro" value="<?php echo $ContaBancoEstrangeiro ?>">
                      </div>

                      <div class="col-md-2 mb-3 filled">
                      <i data-acorn-icon="wallet"></i>
                      <input class="form-control" name="CodigoSWIFT" placeholder="Código SWIFT" value="<?php echo $CodigoSWIFT ?>">
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="support"></i>
                        <?php echo $OperadorResponsavelDados ?>
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="tag"></i>
                        <?php echo $NaturezaDados ?>
                      </div>

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="dollar"></i>
                        <?php echo $MoedaDados ?>
                      </div>                
                      
                      <div class="col-md-3 mb-3 filled">
                      <i data-acorn-icon="category"></i>
                        <input class="form-control" name="IDdoContrato" placeholder="IDdoContrato" value="<?php echo $IDdoContrato ?>">
                      </div>

                    </div>
                  </div>
                </div>

            </div>

            <div class="col-12 col-xl-3 mb-n5 col-lg-auto order-0 order-lg-1">

              <!-- Summary Start -->
              <h2 class="small-title">Resumo da operação</h2>
              <div class="card mb-5 w-100  ">
                <div class="card-body mb-n5">
                  <div class="row g-3">

                      <div class="mb-2">
                        <label class="form-label">Contrato de Cambio</label>
                        <input type="file" name="arquivo" accept=".pdf">
                      </div>

                      <div class="mb-2">
                        <label class="form-label">Valor da operação</label>
                        <input type="text" name="Valor" class="form-control mask-currency" id="Valor" onKeyUp="mascaraMoeda(this, event) + FuncaoReceitaBruta()" value="<?php echo $Valor ?>" required>
                      </div>

                      <div class="mb-2">
                        <label class="form-label">Spot banco</label>
                        <input type="text" name="Spot" class="form-control mask-currency" id="Spot" onKeyUp="mascaraTaxa(this, event) + FuncaoSpread() + FuncaoReceitaBruta()" value="<?php echo $Spot ?>" required>
                      </div>

                      <div class="mb-2">
                        <label class="form-label">Taxa final</label>
                        <input type="text" name="TaxaFinal" class="form-control mask-currency" id="TaxaFinal" onKeyUp="mascaraTaxa(this, event) + FuncaoSpread() + FuncaoReceitaBruta()" value="<?php echo $TaxaFinal ?>" required>
                      </div>

                      <div class="mb-2">
                        <label class="form-label">Moeda p/ Dólar</label>
                        <input type="text" name="EquivalenciaDoDolar" class="form-control mask-currency" id="EquivalenciaDoDolar" onKeyUp="mascaraMoeda(this, event)" value="<?php echo $EquivalenciaDoDolar ?>" required>
                      </div>

                      <div class="mb-2">
                        <label class="form-label">Tarifa do banco</label>
                        <input type="text" name="TarifaBanco" class="form-control mask-currency" id="TarifaBanco" onKeyUp="mascaraMoedaReal(this, event) + FuncaoReceitaBruta()" value="R$ <?php echo $TarifaBanco ?>" required>
                      </div>

                      <div class="mb-2">
                        <label class="form-label">Tarifa cobrada</label>
                        <input type="text" name="TarifaCobrada" class="form-control mask-currency" id="TarifaCobrada" onKeyUp="mascaraMoedaReal(this, event) + FuncaoReceitaBruta()" value="R$ <?php echo $TarifaCobrada ?>" required>
                      </div>
                    
                      <div class="mb-1">
                      <p class="text-medium text-muted mb-1">Spread</p>
                      <div class="cta-2">
                        <span id="Spread">
                        </span>
                      </div>
                    </div>

                  <div class="mb-2">
                      <p class="text-medium text-muted mb-1">Receita Final R$</p>
                      <div class="cta-2">
                        <span id="ReceitaBruta">
                        </span>
                      </div>
                    </div>
                  </div>
                  <div style="display: none;" class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="customCheck1" onclick="FuncaoVerificacao()">
                  </div>
                  <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column flex-sm-row justify-content-between mb-5 w-100">
                      <input class="btn btn-icon btn-icon-end btn-primary w-100" type="submit" value="Atualizar Operação">
                    </div>
                    </form>
                  </div>
                </div>

              </div>
                        <!-- Uploaded Files Start -->
            <!-- DOCUMENTAÇÃO PARA ÁREA DE UPLOAD https://acorn-html-docs.coloredstrategies.com/Javascript.Forms.Dropzone.html -->
             <!--   <section class="scroll-section" id="uploadedFiles">
                  <h2 class="small-title">Importar usando .CSV</h2>
                  <div class="card mb-5">
                    <div class="card-body">
                      <form >
                        <div class="dropzone" id="dropzoneServerFiles"></div>
                      </form>
                    </div>
                  </div>
                </section> -->
                <!-- Uploaded Files End -->
            </div>
              <!-- Summary End -->



            </div>


          </div>
       
      </main>

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

    <!-- Vendor Scripts Start -->
    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="icon/acorn-icons-commerce.js"></script>
    <script src="icon/acorn-icons-learning.js"></script>

    <script src="js/vendor/select2.full.min.js"></script>

    <script src="js/vendor/timepicker.js"></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->
    <script src="js/vendor/dropzone.min.js"></script>
    <script src="js/cs/dropzone.templates.js"></script>
    <script src="js/pages/storefront.checkout.js"></script>

    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>
    <!-- Page Specific Scripts End -->

    <!-- Input Valores -->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>

    <script>

      $(document).ready(function(){

        $('.data').mask(('0000-00-00'));

      });

    </script>

    <!-- Meu Script -->

    <script src="Input.js"></script>
    <script src="Busca.js"></script>
    <script src="RegistrarOperacoes.js"></script>

  </body>
</html>
