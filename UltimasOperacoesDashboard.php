<?php

/* Selecionando Últimas Operações */
$selecionar = "SELECT * FROM EmpresaOperacoes ORDER BY NumeroDaOperacao DESC limit 10";

$query = mysqli_query($conn, $selecionar);

// Variavel Para Cada Campo de Últimas Operações
$x = 1;

/* Últimas Operações */
while($row = mysqli_fetch_assoc($query)){

    $UltimasOperacoesClienteDisplay[$x] = substr($row['Cliente'], 0, 17).'...';
    $UltimasOperacoesCliente[$x] = $row['Cliente'];
    $TipoDeOperacao[$x] = $row['TipoDeOperacao'];
    $UltimasOperacoesValorEmDolar[$x] = 'USD ' . number_format($row['ValorEmDolar'], 2, ',', '.');
    $NumeroDaOperacaoBusca[$x] = $row['NumeroDaOperacao'];
    $x++;

}while($x < 10){

    $UltimasOperacoesClienteDisplay[$x] = '';
    $UltimasOperacoesCliente[$x] = '';
    $TipoDeOperacao[$x] = '';
    $UltimasOperacoesValorEmDolar[$x] = '';
    $NumeroDaOperacaoBusca[$x] = '';
    $x++;
  
}

// Setando Variavel Para Editar de Acordo Com Nivel de Acesso
$x = 1;

if($_SESSION['NivelDeAcesso'] <= '2'){

    while($x < 9){
    
        $Editar[$x] = '<form action="EditarOperacao.php" method="post">
        <input type="text" style="display: none;" name="NumeroDaOperacaoBusca" value="'.$NumeroDaOperacaoBusca[$x].'">
        <input type="submit" class="btn btn-outline-primary py-1 px-3 text-small lh-1-5 me-1" value="EDITAR">
        </form>';
        $x++;

    }

}else{

    while($x < 9){
    
        $Editar[$x] = '';
        $x++;

    }

}

// Setando Variaveis Para Ultimas Operações
$UltimasOperacoesDashboard = '';
$x = 1;

// Ultimas Operações

while($x < 9){

    $cliente = 'cliente_click'.$x;
        
    $UltimasOperacoesDashboard = $UltimasOperacoesDashboard . '
    
    <div class="card mb-2 sh-11 sh-md-12">
        <div class="card-body pt-0 pb-0 h-100">
            <div class="row g-0 h-100 align-content-center">
                <div class="col-12 col-md-3 d-flex align-items-center mb-2 mb-md-0">

                    <form method="post" action="PerfilCliente.php" id="'.$x.'">
                        <div id="cliente">  

                            <input style="display:none;" type="text" name="BuscarNomeDoCliente" value="'.$UltimasOperacoesCliente[$x].'" />
                            
                            <div class="newslink">

                                <input type="hidden" name="submit_cliente" />

                                <a type="button" style="-webkit-appearance: none;" class="body-link text-truncate" onClick="document.getElementById('.$x.').submit();">'.$UltimasOperacoesClienteDisplay[$x].'</a>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-5 col-md-3 d-flex align-items-center text-medium justify-content-start justify-content-md-center text-muted">
                    '.$TipoDeOperacao[$x].'
                </div>
        
                <div class="col-5 col-md-2 d-flex align-items-center justify-content-center text-muted">
                    '.$UltimasOperacoesValorEmDolar[$x].'
                </div>
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