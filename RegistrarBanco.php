<?php

/* Banco de Dados */
include('conexao.php');

// Navbar
include('Navbar.php');

// Barra de Buscar
include('BuscarBarra.php');

// Erro

if(isset($_SESSION['UltimaAcao'])){

  $UltimaAcao = $_SESSION['UltimaAcao'];

  $Banco = $_SESSION['Banco'];
  $BancoCNPJ = $_SESSION['BancoCNPJ'];
  $TarifaBanco = $_SESSION['TarifaBanco'];
  $Repasse = $_SESSION['Repasse'];

  unset($_SESSION['Banco']);
  unset($_SESSION['BancoCNPJ']);
  unset($_SESSION['TarifaBanco']);
  unset($_SESSION['Repasse']);

  echo "<script> 
  
        alert('$UltimaAcao'); 
        
        </script>";

  unset($_SESSION['UltimaAcao']);
  
}else{

    $Banco = '';
    $BancoCNPJ = '';
    $TarifaBanco = 'R$ ';
    $Repasse = '%';

}

?>

<!DOCTYPE html>
<html lang="pt-BR" data-footer="true">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Registro de operação - Empresa</title>
    <meta name="description" content="Página de registro de Bancos" />
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
   <body onload="mascaraMoedaReal(this, event)" class="" data-bs-padding="22px"><div id="paddingModal" class="modal" aria-hidden="true" style="display: none;"> <div class="modal-dialog d-none"><div class="modal-content"></div></div> </div>
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
                  <h1 class="mb-0 pb-0 display-5" id="title">Registrar Banco</h1>
                </div>
              </div>
              <!-- Title End -->
            </div>
          </div>
          <!-- Title and Top Buttons End -->

          <div class="row">
            <div class="col-12 col-xl-9 col-lg order-1 order-lg-0">
                <h2 class="small-title">Dados do banco</h2>

                <form action="InserirBanco.php" method="post" id="addressForm" class="tooltip-label-end">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row g-3">

                      <div class="col-md-4 mb-3 filled">
                        <i data-acorn-icon="money-bag"></i>
                        <input class="form-control" name="Banco" placeholder="Nome do Banco" value="<?php echo $Banco ?>">
                      </div>
                      

                      <div class="col-md-3 mb-3 filled">
                        <i data-acorn-icon="credit-card"></i>
                        <input class="form-control" name="BancoCNPJ" placeholder="CNPJ do Banco" value="<?php echo $BancoCNPJ ?>">
                      </div>

                    </div>  

                  </div>

                </div>

              </div>

            <div class="col-12 col-xl-3 mb-n5 col-lg-auto order-0 order-lg-1">
          
              <!-- Summary Start -->
              <h2 class="small-title">Tarifa</h2>
              <div class="card mb-5 w-100  ">
                <div class="card-body mb-n5">
                  <div class="row g-3">

                      <div class="mb-2">
                        <label class="form-label">Tarifa do banco</label>
                        <input type="text" name="TarifaBanco" class="form-control mask-currency" id="TarifaBanco" onKeyUp="mascaraMoedaReal(this, event)" value="<?php echo $TarifaBanco ?>">
                      </div>

                      <div class="mb-2">
                        <label class="form-label">Repasse</label>
                        <input type="text" name="Repasse" class="form-control mask-currency" id="Repasse" onKeyUp="mascaraPorcentagem(this, event)" value="<?php echo $Repasse ?>">
                      </div>

                  <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">
                      Preenchi a operação de acordo com os  
                      <a href="#" target="_blank">dados do Banco.</a>
                    </label>
                  </div>
                  <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column flex-sm-row justify-content-between mb-5 w-100">
                      <input class="btn btn-icon btn-icon-end btn-primary w-100" type="submit" value="Registrar Banco">
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

    <!-- Meu Script -->

    <script src="Input.js"></script>
    <script src="Busca.js"></script>
    <script src="RegistrarOperacoes.js"></script>

  </body>
</html>