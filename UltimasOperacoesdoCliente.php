<?php

/* Selecionando Últimas Operações */
$selecionar = "SELECT * FROM EmpresaOperacoes WHERE Cliente = '$Cliente' ORDER BY NumeroDaOperacao DESC limit 10";

$query = mysqli_query($conn, $selecionar);

// Variavel Para Cada Campo de Últimas Operações
$x = 1;

/* Últimas Operações */
while($row = mysqli_fetch_assoc($query) and $x < 10){

  $TipoDeOperacao[$x] = $row['TipoDeOperacao'];
  $Moeda[$x] = $row['Moeda'];
  $Valor[$x] = number_format($row['Valor'], 2, ',', '.');
  $Spot[$x] = $row['Spot'];
  $TaxaFinal[$x] = $row['TaxaFinal'];
  $NumeroDaOperacaoBusca[$x] = $row['NumeroDaOperacao'];
  $x++;

}while($x < 10){

  $TipoDeOperacao[$x] = '';
  $Moeda[$x] = '';
  $Valor[$x] = '';
  $Spot[$x] = '';
  $TaxaFinal[$x] = '';
  $NumeroDaOperacaoBusca[$x] = '';
  $x++;

}

// Setando Variavel Para Editar de Acordo Com Nivel de Acesso
$x = 1;

if($_SESSION['NivelDeAcesso'] <= '3'){

    while($x < 10){
    
        $Editar[$x] = '<form action="EditarOperacao.php" method="post">
        <input type="text" style="display: none;" name="NumeroDaOperacaoBusca" value="'.$NumeroDaOperacaoBusca[$x].'">
        <input type="submit" class="btn btn-outline-primary py-1 px-3 text-small lh-1-5 me-1" value="EDITAR">
        </form>';
        $x++;

    }

}else{

    while($x < 10){
    
        $Editar[$x] = '';
        $x++;

    }

}

// Setando Variaveis Para Ultimas Operações
$UltimasOperacoesdoCliente = '';
$x = 1;

// Ultimas Operações

while($x < 10){
        
    $UltimasOperacoesdoCliente = $UltimasOperacoesdoCliente . '
    <div class="card mb-2 sh-11 sh-md-8">
        <div class="card-body pt-0 pb-0 h-100">
            <div class="row g-0 h-100 align-content-center">
                <div class="col-12 col-md-1 d-flex align-items-center mb-2 mb-md-0">
                    '.$TipoDeOperacao[$x].'
                </div>
                <div class="col-5 col-md-2 d-flex align-items-center text-medium justify-content-start justify-content-md-center text-muted">
                    '.$Moeda[$x].'
                </div>
                <div class="col-5 col-md-2 d-flex align-items-center text-medium justify-content-start justify-content-md-center text-muted">
                    '.$Valor[$x].'
                </div>
                <div class="col-5 col-md-2 d-flex align-items-center justify-content-center text-muted">'.$Spot[$x].'</div>
                <div class="col-5 col-md-2 d-flex align-items-center justify-content-center text-muted">'.$TaxaFinal[$x].'</div>
                <div class="col-12 col-sm d-flex justify-content-center justify-content-sm-end">
                    '.$Editar[$x].'
                    <form action="ContratoCambio.php" method="post">
                        <input type="text" style="display: none;" name="NumeroDaOperacaoBusca" value="'.$NumeroDaOperacaoBusca[$x].'">
                        <input type="submit" class="btn btn-outline-primary py-1 px-3 text-small lh-1-5" value="ABRIR">
                    </form>
                </div>
            </div>
        </div>
    </div>
    ';
    $x++;

}

?>