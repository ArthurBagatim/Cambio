<?php

/* Verificação de Login */
include('VerificacaoOn.php');

// Verificando se Já Foi Feito uma Busca
if(isset($_POST['Nome'])){

    $Nome[0] = $_POST['Nome'];
    $CNPJBanco[0] = $_POST['CNPJBanco'];

    
    // Variavel de Resultados
    $x = 1;

  /* Selecionando Dados do Banco */
  $selecionar = "SELECT * FROM `EmpresaBancos` WHERE Nome LIKE '%$Nome[0]%' and `CNPJBanco` LIKE '$CNPJBanco[0]%'";

  $dados = mysqli_query($conn, $selecionar);

  // Dados 
  while($row = mysqli_fetch_assoc($dados)){

    $Nome[$x] = $row['Nome'];
    $CNPJBanco[$x] = $row['CNPJBanco'];
    $Tarifa[$x] = "R$ " . $row['Tarifa'];
    $ComissaoBanco[$x] = ($row['ComissaoBanco']*100) . "%";
    $x++;

  }while($x <= 13){

    $Nome[$x] = 'Banco';
    $CNPJBanco[$x] = 'CNPJ Banco';
    $Tarifa[$x] = 'Tarifa';
    $ComissaoBanco[$x] = 'Comissão Banco';
    $x++;

  }

}else{

    // Variavel de Resultados
  $x = 1;

  // Selecionando Dados do Banco 
  $selecionar = "SELECT * FROM `EmpresaBancos`";

  $dados = mysqli_query($conn, $selecionar);

  // Dados 
  while($row = mysqli_fetch_assoc($dados)){

    $Nome[$x] = $row['Nome'];
    $CNPJBanco[$x] = $row['CNPJBanco'];
    $Tarifa[$x] = "R$ " . $row['Tarifa'];
    $ComissaoBanco[$x] = ($row['ComissaoBanco']*100) . "%";
    $x++;

  }while($x <= 13){

    $Nome[$x] = 'Banco';
    $CNPJBanco[$x] = 'CNPJ Banco';
    $Tarifa[$x] = 'Tarifa';
    $ComissaoBanco[$x] = 'Comissão Banco';
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
          <div class='col-12 col-sm-3 d-flex align-items-center'>" . $Nome[$x] . "</div>
          <div class='col-12 col-sm-3 d-flex align-items-center text-muted category'>" . $CNPJBanco[$x] . "</div>
          <div class='col-12 col-sm-2 d-flex align-items-center text-muted sale'>" . $Tarifa[$x] . "</div>
          <div class='col-12 col-sm-2 d-flex align-items-center text-muted sale'>" . $ComissaoBanco[$x] . "</div>
          <div class='col-12 col-sm-2 d-flex align-items-center justify-content-sm-end text-muted sale'>
            <form action='EditarBanco.php' method='post'>
                <input style='display: none;' name='Nome' value='$Nome[$x]'>
                <input style='display: none;' name='CNPJBanco' value='$CNPJBanco[$x]'>
                <input type='submit' class='btn btn-outline-primary py-1 px-3 text-small lh-1-5 me-1' value='Editar'>
            </form>
          </div>
      </div>                                  
    </div>";
    $x++;

}

?>