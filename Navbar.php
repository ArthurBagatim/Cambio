
<?php 

/* Verificação de Login */
include('VerificacaoOn.php');

// Puxando Nome de Usuário
$UserName = $_SESSION['UserName'];

// Buscando Foto do Usuário
$_SESSION['FotodoUsuario'] = 'img/profile/' . $UserName . '.jpg';
$FotodoUsuario = $_SESSION['FotodoUsuario'];

// Verificando se ela Existe ou Puxando Alternativa
if(isset($FotodoUsuario)){

    $FotodoUsuario = $FotodoUsuario;

}else{

    $FotodoUsuario = 'img/profile/Sem Foto.jpg';

}

if($_SESSION['NivelDeAcesso'] <= '3'){

  $RegistrarOperacao = 
  '<li>
  <a href="RegistrarOperacao.php" data-bs-toggle="modal" data-bs-target="#RegistrarOperacao">
    <span class="label">Registrar Operação</span>
  </a>
  </li>';

}else{

  $RegistrarOperacao = '';

}

if($_SESSION['NivelDeAcesso'] === '1'){

  $Banco = '
  <li>
    <a href="#banco">
      <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
      <span class="label">Banco</span>
    </a>
    <ul id="banco">
      <li>
        <a href="RegistrarBanco.php">
          <span class="label">Registrar Banco</span>
        </a>
      </li>
      <li>
        <a href="SelecionarBanco.php">
          <span class="label">Selecionar Banco</span>
        </a>
      </li>
    </ul>
  </li>';

  $Usuario = '
  <li>
    <a href="#usuarios">
      <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
      <span class="label">Usuários</span>
    </a>
    <ul id="usuarios">
      <li>
        <a href="RegistrarUsuario.php">
          <span class="label">Criar Usuário</span>
        </a>
      </li>
      <li>
        <a href="EditarUsuario.php">
          <span class="label">Editar Usuário</span>
        </a>
      </li>
    </ul>
  </li>';

  $Nvoip = '
  <li>
    <a href="#nvoip">
      <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
      <span class="label">Nvoip</span>
    </a>
    <ul id="nvoip">
      <li>
        <a href="Nvoip.php">
          <span class="label">Nvoip</span>
        </a>
      </li>
    </ul>
  </li>';

}else{

  $Banco = '';
  $Usuario = '';

}

// Menu do Usuário
$UserMenuPHP = '
<div class="user-container d-flex">
  <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img class="profile" alt="profile" src="' . $FotodoUsuario . '">
    <div class="name">' . $UserName . '</div>
  </a>
  <div class="dropdown-menu dropdown-menu-end user-menu wide">
    <div class="row mb-3 ms-0 me-0">
   
    <!--  Retirei o ecesso de opções no menu de usuário dropdown

    <div class="col-12 ps-1 mb-2">
        <div class="text-extra-small text-primary">ACCOUNT</div>
      </div>
      <div class="col-6 ps-1 pe-1">
        <ul class="list-unstyled">
          <li>
            <a href="#">User Info</a>
          </li>
          <li>
            <a href="#">Preferences</a>
          </li>
          <li>
            <a href="#">Calendar</a>
          </li>
        </ul>
      </div>
      <div class="col-6 pe-1 ps-1">
        <ul class="list-unstyled">
          <li>
            <a href="#">Security</a>
          </li>
          <li>
            <a href="#">Billing</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row mb-1 ms-0 me-0">
      <div class="col-12 p-1 mb-2 pt-2">
        <div class="text-extra-small text-primary">APPLICATION</div>
      </div>
      <div class="col-6 ps-1 pe-1">
        <ul class="list-unstyled">
          <li>
            <a href="#">Themes</a>
          </li>
          <li>
            <a href="#">Language</a>
          </li>
        </ul>
      </div>
      <div class="col-6 pe-1 ps-1">
        <ul class="list-unstyled">
          <li>
            <a href="#">Devices</a>
          </li>
          <li>
            <a href="#">Storage</a>
          </li>
        </ul>
      </div> -->
    </div>
    <div class="row mb-1 ms-0 me-0">
      <div class="col-12 p-1 mb-3 pt-3">
        <div class="separator-light"></div>
      </div>
      <div class="col-6 ps-1 pe-1">
        <ul class="list-unstyled">
          <li style="display: none;">
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-help me-2"><circle cx="10" cy="9.99997" r="3" transform="rotate(-135 10 9.99997)"></circle><path d="M3.63608 3.63602C4.41713 2.85497 5.68346 2.85497 6.46451 3.63602L7.87872 5.05023C8.65977 5.83128 8.65977 7.09761 7.87872 7.87866V7.87866C7.09767 8.6597 5.83134 8.6597 5.05029 7.87866L3.63608 6.46444C2.85503 5.68339 2.85503 4.41706 3.63608 3.63602V3.63602zM12.1214 12.1213C12.9025 11.3403 14.1688 11.3403 14.9499 12.1213L16.3641 13.5355C17.1451 14.3166 17.1451 15.5829 16.3641 16.3639V16.3639C15.583 17.145 14.3167 17.145 13.5356 16.3639L12.1214 14.9497C11.3404 14.1687 11.3404 12.9024 12.1214 12.1213V12.1213z"></path><path d="M5.93558 3.10715C9.00339 1.29528 13.021 1.70728 15.6569 4.34315C18.2927 6.97901 18.7047 10.9966 16.8929 14.0644M3.10715 5.93558C1.29528 9.00339 1.70728 13.021 4.34315 15.6569C6.97901 18.2927 10.9966 18.7047 14.0644 16.8929"></path><path d="M4.34326 15.6569L7.8788 12.1213M15.657 4.34315L12.1214 7.87869"></path></svg>
              <span class="align-middle">Help</span>
            </a>
          </li>
          <li style="display: none;">
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-file-text me-2"><path d="M6.5 18H13.5C14.9045 18 15.6067 18 16.1111 17.6629C16.3295 17.517 16.517 17.3295 16.6629 17.1111C17 16.6067 17 15.9045 17 14.5V7.44975C17 6.83775 17 6.53175 16.9139 6.24786C16.8759 6.12249 16.8256 6.00117 16.7638 5.88563C16.624 5.62399 16.4076 5.40762 15.9749 4.97487L14.0251 3.02513L14.0251 3.02512C13.5924 2.59238 13.376 2.37601 13.1144 2.23616C12.9988 2.1744 12.8775 2.12415 12.7521 2.08612C12.4682 2 12.1622 2 11.5503 2H6.5C5.09554 2 4.39331 2 3.88886 2.33706C3.67048 2.48298 3.48298 2.67048 3.33706 2.88886C3 3.39331 3 4.09554 3 5.5V14.5C3 15.9045 3 16.6067 3.33706 17.1111C3.48298 17.3295 3.67048 17.517 3.88886 17.6629C4.39331 18 5.09554 18 6.5 18Z"></path><path d="M13 6 7 6M13 10 7 10M13 14 7 14"></path></svg>
              <span class="align-middle">Docs</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-6 pe-1 ps-1">
        <ul class="list-unstyled">
          <li style="display: none;">
            <a style="display:" href="Perfil.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-gear me-2"><path d="M8.32233 3.75427C8.52487 1.45662 11.776 1.3967 11.898 3.68836C11.9675 4.99415 13.2898 5.76859 14.4394 5.17678C16.4568 4.13815 18.0312 7.02423 16.1709 8.35098C15.111 9.10697 15.0829 10.7051 16.1171 11.4225C17.932 12.6815 16.2552 15.6275 14.273 14.6626C13.1434 14.1128 11.7931 14.9365 11.6777 16.2457C11.4751 18.5434 8.22404 18.6033 8.10202 16.3116C8.03249 15.0059 6.71017 14.2314 5.56062 14.8232C3.54318 15.8619 1.96879 12.9758 3.82906 11.649C4.88905 10.893 4.91709 9.29487 3.88295 8.57749C2.06805 7.31848 3.74476 4.37247 5.72705 5.33737C6.85656 5.88718 8.20692 5.06347 8.32233 3.75427Z"></path><path d="M10 8C11.1046 8 12 8.89543 12 10V10C12 11.1046 11.1046 12 10 12V12C8.89543 12 8 11.1046 8 10V10C8 8.89543 8.89543 8 10 8V8Z"></path></svg>
              <span class="align-middle">Settings</span>
            </a>
          </li>
          <li>
            <a href="Desconectar.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-logout me-2"><path d="M7 15 2.35355 10.3536C2.15829 10.1583 2.15829 9.84171 2.35355 9.64645L7 5M3 10H13M12 18 14.5 18C15.9045 18 16.6067 18 17.1111 17.6629 17.3295 17.517 17.517 17.3295 17.6629 17.1111 18 16.6067 18 15.9045 18 14.5L18 5.5C18 4.09554 18 3.39331 17.6629 2.88886 17.517 2.67048 17.3295 2.48298 17.1111 2.33706 16.6067 2 15.9045 2 14.5 2L12 2"></path></svg>
              <span class="align-middle">Logout</span>
            </a>
          </li>
        </ul>
      </div> 
    </div> 
  </div>
</div>';

// Icones Começo
$IconesPHP = '<ul class="list-unstyled list-inline text-center menu-icons">
<li style="display: none;" class="list-inline-item">
  <a href="#" data-bs-toggle="modal" data-bs-target="#ProcurarCliente">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-search undefined"><circle cx="9" cy="9" r="7"></circle><path d="M14 14L17.5 17.5"></path></svg>
  </a>
</li>
<li class="list-inline-item">
  <a href="#" id="pinButton" class="pin-button">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-lock-on unpin"><path d="M5 12.6667C5 12.0467 5 11.7367 5.06815 11.4824C5.25308 10.7922 5.79218 10.2531 6.48236 10.0681C6.73669 10 7.04669 10 7.66667 10H12.3333C12.9533 10 13.2633 10 13.5176 10.0681C14.2078 10.2531 14.7469 10.7922 14.9319 11.4824C15 11.7367 15 12.0467 15 12.6667V13C15 13.9293 15 14.394 14.9231 14.7804C14.6075 16.3671 13.3671 17.6075 11.7804 17.9231C11.394 18 10.9293 18 10 18V18C9.07069 18 8.60603 18 8.21964 17.9231C6.63288 17.6075 5.39249 16.3671 5.07686 14.7804C5 14.394 5 13.9293 5 13V12.6667Z"></path><path d="M11 15H10 9M13 10V5C13 3.34315 11.6569 2 10 2V2C8.34315 2 7 3.34315 7 5V10"></path></svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-lock-off pin"><path d="M5 12.6667C5 12.0467 5 11.7367 5.06815 11.4824C5.25308 10.7922 5.79218 10.2531 6.48236 10.0681C6.73669 10 7.04669 10 7.66667 10H12.3333C12.9533 10 13.2633 10 13.5176 10.0681C14.2078 10.2531 14.7469 10.7922 14.9319 11.4824C15 11.7367 15 12.0467 15 12.6667V13C15 13.9293 15 14.394 14.9231 14.7804C14.6075 16.3671 13.3671 17.6075 11.7804 17.9231C11.394 18 10.9293 18 10 18V18C9.07069 18 8.60603 18 8.21964 17.9231C6.63288 17.6075 5.39249 16.3671 5.07686 14.7804C5 14.394 5 13.9293 5 13V12.6667Z"></path><path d="M11 15H10 9M13 6V5C13 3.34315 11.6569 2 10 2V2C8.34315 2 7 3.34315 7 5V10"></path></svg>
  </a>
</li>
<li class="list-inline-item">
  <a href="#" id="colorButton">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-light-on light"><path d="M8 14L8.28283 16.4684C8.35276 17.0786 8.38772 17.3837 8.55097 17.6009C8.63047 17.7067 8.73017 17.7956 8.8443 17.8625C9.07862 18 9.38575 18 10 18V18C10.6143 18 10.9214 18 11.1557 17.8625C11.2698 17.7956 11.3695 17.7067 11.449 17.6009C11.6123 17.3837 11.6472 17.0786 11.7172 16.4684L12 14"></path><path d="M15 7C15 10.1518 13.5 10.5 13 11.5C12.5 12.5 12.6096 14.5 10 14.5C7.39038 14.5 7.5 12.5 7 11.5C6.5 10.5 5 10.1518 5 7C5 4.23858 7.23858 2 10 2C12.7614 2 15 4.23858 15 7Z"></path><path d="M18 7 17.5 7M16.9658 3 16.4829 3.12941M16.9658 11.2588 16.4829 11.1294M2 7 2.5 7M3.03418 3 3.51714 3.12941M3.03418 11.2588 3.51714 11.1294"></path></svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-light-off dark"><path d="M8 14L8.28283 16.4684C8.35276 17.0786 8.38772 17.3837 8.55097 17.6009C8.63047 17.7067 8.73017 17.7956 8.8443 17.8625C9.07862 18 9.38575 18 10 18V18C10.6143 18 10.9214 18 11.1557 17.8625C11.2698 17.7956 11.3695 17.7067 11.449 17.6009C11.6123 17.3837 11.6472 17.0786 11.7172 16.4684L12 14"></path><path d="M15 7C15 10.1518 13.5 10.5 13 11.5C12.5 12.5 12.6096 14.5 10 14.5C7.39038 14.5 7.5 12.5 7 11.5C6.5 10.5 5 10.1518 5 7C5 4.23858 7.23858 2 10 2C12.7614 2 15 4.23858 15 7Z"></path></svg>
  </a>
</li>
<!-- ///////// ARTHUR, possível colocar aqui notificações das últimas operações registradas que o comercial estiver como dono do cliente? ////////////// -->
<li style="display: none;" class="list-inline-item">
  <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
    <div class="position-relative d-inline-flex">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-bell undefined"><path opacity="0.9" d="M11 18H10H9"></path><path d="M6 7.38161V5.6718C6 4.25597 6.83142 2.97212 8.12338 2.39297C8.70126 2.13392 9.32738 2 9.96066 2H10.0393C10.6726 2 11.2987 2.13392 11.8766 2.39297C13.1686 2.97212 14 4.25597 14 5.6718V7.38161C14 8.44715 14.2374 9.4993 14.6949 10.4616L15.578 12.3193C15.8428 12.8762 15.8216 13.5267 15.5213 14.0653C15.1995 14.6423 14.5905 15 13.9297 15H6.07028C5.40953 15 4.80053 14.6423 4.4787 14.0653C4.17837 13.5267 4.15724 12.8762 4.42198 12.3193L5.30513 10.4616C5.76263 9.4993 6 8.44715 6 7.38161Z"></path></svg>
      <span class="position-absolute notification-dot rounded-xl"></span>
    </div>
  </a>
  <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications" style="">
    <div class="scroll os-host os-theme-dark os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-overflow os-host-overflow-y"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -15px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 15px; height: 100%; width: 100%;">
      <ul class="list-unstyled border-last-none">
        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
          <img src="img/profile/profile-1.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="...">
          <div class="align-self-center">
            <a href="#">Joisse Kaycee just sent a new comment!</a>
          </div>
        </li>
        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
          <img src="img/profile/profile-2.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="...">
          <div class="align-self-center">
            <a href="#">New order received! It is total $147,20.</a>
          </div>
        </li>
        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
          <img src="img/profile/profile-3.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="...">
          <div class="align-self-center">
            <a href="#">3 items just added to wish list by a user!</a>
          </div>
        </li>
        <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
          <img src="img/profile/profile-6.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="...">
          <div class="align-self-center">
            <a href="#">Kirby Peters just sent a new message!</a>
          </div>
        </li>
      </ul>
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="transform: translate(0px, 0px); width: 100%;"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="transform: translate(0px, 0px); height: 67.7656%;"></div></div></div><div class="os-scrollbar-corner"></div></div>
  </div>
</li>
</ul>';

// Menu Começo
$MenuPHP = '
<div class="menu-container flex-grow-1">
  <ul id="menu" class="menu">
    <li>
      <a href="#operacoes">
        <i data-acorn-icon="sync-horizontal" class="icon" data-acorn-size="18"></i>
        <span class="label">Operações</span>
      </a>
      <ul id="operacoes">
        '.$RegistrarOperacao.'
        <li>
          <a href="SelecionarOperacao.php">
            <span class="label">Selecionar Operação</span>
          </a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#clientes">
        <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
        <span class="label">Clientes</span>
      </a>
      <ul id="clientes">
        <li>
          <a href="RegistrarCliente.php">
            <span class="label">Cadastrar Cliente</span>
          </a>
        </li>
        <li>
          <a href="PerfilCliente.php" data-bs-toggle="modal" data-bs-target="#ProcurarCliente">
            <span class="label">Perfil do Cliente</span>
          </a>
        </li>
      </ul>
    </li>
    '. $Banco .'
    ' . $Usuario . '
    ' . $Nvoip . '
    <li style="display: none;" class="list-inline-item">
      <a href="#">
        <i data-acorn-icon="chart-4" class="icon" data-acorn-size="18"></i>
        <span class="label">Relatórios</span>
      </a>
    </li>
    <li class="list-inline-item">
      <a href="Desconectar.php">
        <i data-acorn-icon="logout" class="icon" data-acorn-size="18"></i>
        <span class="label">Logout</span>
      </a>
    </li>
  </li>
</div>';

?>