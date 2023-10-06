<?php

/* Verificação de Login */
include('VerificacaoOn.php');

// Verificando se Já Foi Feito uma Busca
if(isset($_POST['Cliente'])){

  $CNPJ_CPF[0] = $_POST['CNPJ_CPF'];
  $Cliente[0] = $_POST['Cliente'];

  // Verificando Quais Campos Foram Preenchidos
  if(isset($_POST['Data']) and $_POST['Data'] != ''){

    $Data[0] = $_POST['Data'];

  }else{

    $Data[0] = '%';

  }

    $OperadorResponsavel[0] = $_POST['OperadorResponsavel'];

    $TipoDeOperacao[0] = $_POST['TipoDeOperacao'];

    $IDdoContrato[0] = $_POST['IDdoContrato'];

    // Variavel de Resultados
  $x = 1;

  /* Selecionando Dados do Banco */
  $selecionar = "SELECT * FROM `EmpresaOperacoes` WHERE Cliente LIKE '%$Cliente[0]%' and `Data` LIKE '$Data[0]'  and OperadorResponsavel LIKE '%$OperadorResponsavel[0]%' and TipoDeOperacao LIKE '%$TipoDeOperacao[0]%' and IDdoContrato LIKE '%$IDdoContrato[0]%'";

  $dados = mysqli_query($conn, $selecionar);

  // Dados 
  while($row = mysqli_fetch_assoc($dados)){

    $NumeroDaOperacaoBusca[$x] = $row['NumeroDaOperacao'];
    $Cliente[$x] = $row['Cliente'];
    $CNPJ_CPF[$x] = $row['CNPJ_CPF'];
    $Moeda[$x] = $row['Moeda'];
    $ValorEmDolar[$x] = number_format($row['ValorEmDolar'], 2, ',', '.');
    $TaxaFinal[$x] = number_format($row['TaxaFinal'], 4, ',', '.');
    $TipoDeOperacao[$x] = $row['TipoDeOperacao'];
    $IDdoContrato[$x] = $row['IDdoContrato'];
    $x++;

  }while($x <= 13){

    $NumeroDaOperacaoBusca[$x] = '';
    $Cliente[$x] = 'Cliente';
    $CNPJ_CPF[$x] = 'CNPJ_CPF';
    $Moeda[$x] = 'Moeda';
    $ValorEmDolar[$x] = 'Valor (US$)';
    $TaxaFinal[$x] = 'Taxa Final';
    $TipoDeOperacao[$x] = 'Compra/Venda';
    $IDdoContrato[$x] = '';
    $x++;

  }

}else{

    // Variavel de Resultados
  $x = 1;

  // Selecionando Dados do Banco 
  $selecionar = "SELECT * FROM `EmpresaOperacoes` ORDER BY `NumeroDaOperacao` DESC";

  $dados = mysqli_query($conn, $selecionar);

  // Dados 
  while($row = mysqli_fetch_assoc($dados)){

    $NumeroDaOperacaoBusca[$x] = $row['NumeroDaOperacao'];
    $Cliente[$x] = $row['Cliente'];
    $CNPJ_CPF[$x] = $row['CNPJ_CPF'];
    $Moeda[$x] = $row['Moeda'];
    $ValorEmDolar[$x] = number_format($row['ValorEmDolar'], 2, ',', '.');
    $TaxaFinal[$x] = number_format($row['TaxaFinal'], 4, ',', '.');
    $TipoDeOperacao[$x] = $row['TipoDeOperacao'];
    $IDdoContrato[$x] = $row['IDdoContrato'];
    $x++;

  }while($x <= 13){

    $NumeroDaOperacaoBusca[$x] = '';
    $Cliente[$x] = 'Cliente';
    $CNPJ_CPF[$x] = '';
    $Moeda[$x] = 'Moeda';
    $ValorEmDolar[$x] = 'Valor (US$)';
    $TaxaFinal[$x] = 'Taxa Final';
    $TipoDeOperacao[$x] = 'Compra/Venda';
    $IDdoContrato[$x] = '';
    $x++;

  }

}

// Setando Variavel Para Editar de Acordo Com Nivel de Acesso
$x = 1;

if($_SESSION['NivelDeAcesso'] <= '2'){

  while($x <= 13){
    $Editar[$x] = "
    <form action='EditarOperacao.php' method='post'>
      <input style='display: none;' name='NumeroDaOperacaoBusca' value=" . $NumeroDaOperacaoBusca[$x] . ">
      <input style='display: none;' name='IDdoContrato' value=" . $IDdoContrato[$x] . ">
      <input type='submit' class='btn btn-outline-primary py-1 px-3 text-small lh-1-5 me-1' value='Editar'>
    </form>";
    $x++;
  }

}else{

  while($x <= 13){

    $Editar[$x] = '';
    $x++;

  }

}

// Variaveis Para Criar os Campos de Busca
$ResultadosdaBusca = '';
$x = 1;

// Definindo Quantidade de Campos Criados
while($x <= 13){
  
  $ResultadosdaBusca = $ResultadosdaBusca . 
    "
    <div class='list scroll-out'>
    <div class='scroll-by-count' data-count='20' data-childSelector='.scroll-child'>
    <div class='h-auto sh-sm-5 mb-3 mb-sm-0 scroll-child'>
          <div class='row g-0 h-100 align-content-center'>
          <div class='col-12 col-sm-3 d-flex align-items-center'>" . $Cliente[$x] . "</div>
          <div class='col-12 col-sm-2 d-flex align-items-center text-muted category'>" . $TipoDeOperacao[$x] . "</div>
          <div class='col-12 col-sm-2 d-flex align-items-center text-muted sale'>" . $Moeda[$x] . "</div>
          <div class='col-12 col-sm-2 d-flex align-items-center text-muted sale'>" . $ValorEmDolar[$x] . "</div>
          <div class='col-12 col-sm-1 d-flex align-items-center text-muted sale'>" . $TaxaFinal[$x] . "</div>
          <div class='col-12 col-sm-2 d-flex align-items-center justify-content-sm-end text-muted sale'>
          ".$Editar[$x]."
            <form action='ContratoCambio.php' method='post'>
              <input style='display: none;' name='NumeroDaOperacaoBusca' value=" . $NumeroDaOperacaoBusca[$x] . ">
              <input style='display: none;' name='IDdoContrato' value=" . $IDdoContrato[$x] . ">
              <input type='submit' class='btn btn-outline-primary py-1 px-3 text-small lh-1-5 me-1' value='Visualizar'>
            </form>
          </div>
      </div>                                  
    </div>";
    $x++;

}

?>