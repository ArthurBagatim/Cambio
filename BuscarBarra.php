<?php

/* Verificação de Login */
include('VerificacaoOn.php');

/* Selecionando Número de Clientes */
$selecionar = "SELECT COUNT(*) FROM `EmpresaClientes`";

$query = mysqli_query($conn, $selecionar);

/* Número de Clientes */
while($row = mysqli_fetch_assoc($query)){

  $NumerodeClientes = $row['COUNT(*)'];

}

if(!isset($_SESSION['BuscarNumerodeClientes'])){

  $_SESSION['BuscarNumerodeClientes'] = 'Não Definido';
  
}

// Verificando se o Número de Clientes Bate Com o da Sessão Caso Não Limpa para Novos
if($_SESSION['BuscarNumerodeClientes'] != $NumerodeClientes){


  unset($_SESSION['BuscarCNPJ_CPF']);
  unset($_SESSION['BuscarNomeDoCliente']);
  unset($_SESSION['BuscarNumerodeClientes']);

  /* Selecionando Clientes */
  $selecionar = "SELECT `Cliente`,`CNPJ_CPF` FROM `EmpresaClientes`";

  $query = mysqli_query($conn, $selecionar);

  $x = 0;

  /* Atribuindo Clientes a Sessões */
  while($row = mysqli_fetch_assoc($query)){

  $x++;
  $_SESSION['BuscarCNPJ_CPF'][$x] = $row['CNPJ_CPF'];
  $_SESSION['BuscarNomeDoCliente'][$x] = $row['Cliente'];
  $_SESSION['BuscarNumerodeClientes'] = $x;

  }

}

// Criando Variável Para Cada Cliente PHP
$x = $_SESSION['BuscarNumerodeClientes'];

// Atribuindo Clientes as Variáveis 
while($x > 0){

  $BuscarNomeDoCliente[$x] = $_SESSION['BuscarNomeDoCliente'][$x];
  $BuscarCNPJ_CPF[$x] = $_SESSION['BuscarCNPJ_CPF'][$x];

  $x--;

}

// Variaveis Para Criar os Campos de Busca
$x++;
$Y1 = '';
$Y2 = '';
$z = $_SESSION['BuscarNumerodeClientes'] + 1;

// Definindo Quantidade de Campos Criados
while($x < $z){
    
    $Y1 = $Y1 . 
    "<option value='$BuscarNomeDoCliente[$x]'>";
    $Y2 = $Y2 . 
    "<option value='$BuscarCNPJ_CPF[$x]'>";
    $x++;

}

// Campo de Busca Registrar Operação
$BuscarBarra_php = "
    <div class='modal fade modal-under-nav modal-search modal-close-out' id='RegistrarOperacao' tabindex='-1' style='display: none;' aria-hidden='true'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
          <div class='modal-header border-0 p-0'>
            <button type='button' class='btn-close btn btn-icon btn-icon-only btn-foreground' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <form action='RegistrarOperacao.php' method='post' class='modal-body ps-5 pe-5 pb-0 border-0'>
            <div class='autocomplete-container'>
              <label for='BuscarNomeDoCliente'>Nome do Cliente</label>
              <input list='browsers1' name='BuscarNomeDoCliente' id='BuscarNomeDoCliente'>
              <datalist id='browsers1'>
                $Y1
              </datalist>
              <label for='BuscarCNPJ_CPF'>CNPJ/CPF do Cliente</label>
              <input list='browsers2' name='BuscarCNPJ_CPF' id='BuscarCNPJ_CPF'>
              <datalist id='browsers2'>
                $Y2
              </datalist>
            </div><br><br>
          <div class='modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0'>
            <input type='submit' value='Selecionar' class='btn btn-icon btn-icon-end btn-primary w-100'>
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class='modal fade modal-under-nav modal-search modal-close-out' id='ProcurarCliente' tabindex='-1' style='display: none;' aria-hidden='true'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
          <div class='modal-header border-0 p-0'>
            <button type='button' class='btn-close btn btn-icon btn-icon-only btn-foreground' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <form action='PerfilCliente.php' method='post' class='modal-body ps-5 pe-5 pb-0 border-0'>
            <div class='autocomplete-container'>
              <label for='BuscarNomeDoCliente'>Nome do Cliente</label>
              <input list='browsers1' name='BuscarNomeDoCliente' id='BuscarNomeDoCliente'>
              <datalist id='browsers1'>
                $Y1
              </datalist>
              <label for='BuscarCNPJ_CPF'>CNPJ/CPF do Cliente</label>
              <input list='browsers2' name='BuscarCNPJ_CPF' id='BuscarCNPJ_CPF'>
              <datalist id='browsers2'>
                $Y2
              </datalist>
            </div><br><br>
          <div class='modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0'>
            <input type='submit' value='Selecionar' class='btn btn-icon btn-icon-end btn-primary w-100'>
          </div>
        </form>
        </div>
      </div>
    </div>";
?>