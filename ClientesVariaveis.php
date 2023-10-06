<?php

/* Verificação de Login */
include('VerificacaoOn.php');

$NaturezaDados = '
<select class="form-control" name="Natureza" id="Natureza_da_Operacao">
<option style="display: none;" value="'.$Natureza.'">'.$Natureza.'</option>
<option class="form-control dropdown-empresa-option" value="Importação">Importação</option>
<option class="form-control dropdown-empresa-option" value="Exportação">Exportação</option>
<option class="form-control dropdown-empresa-option" value="Financeiro Venda">Financeiro Venda</option>
<option class="form-control dropdown-empresa-option" value="Financeiro Compra">Financeiro Compra</option>
</select>';

// Selecionando Dados de Bancos
$query = "SELECT * FROM `EmpresaBancos`";

$dados = mysqli_query($conn, $query);

$x = 0;

while($row = mysqli_fetch_assoc($dados)){

    $x++;
    $BancoResultado[$x] = $row['Nome'];
    $ComissaoBancoResultado[$x] = ($row['ComissaoBanco']*100)."%";
    $BancoCNPJResultado[$x] = $row['CNPJBanco'];
    $TarifaBancoResultado[$x] = $row['Tarifa'];

}

echo '<script>

var ComissaoBanco = [];
var BancoCNPJ = [];
var BancoTarifa = [];
var SelectBanco = [];

</script>';

$ResultadosBanco = '';
$ResultadosBanco_2 = '';

while($x > 0){

    $ResultadosBanco = '<option class="form-control dropdown-empresa-option" value="'.$BancoResultado[$x].'">'.$BancoResultado[$x].'</option>' . $ResultadosBanco;
    $ResultadosBanco_2 = '<option class="form-control dropdown-empresa-option" value="'.$BancoResultado[$x].'">'.$BancoResultado[$x].'</option>' . $ResultadosBanco_2;
    
    echo '<script>

    ComissaoBanco.push("'.$ComissaoBancoResultado[$x].'");
    BancoCNPJ.push("'.$BancoCNPJResultado[$x].'");
    BancoTarifa.push("'.$TarifaBancoResultado[$x].'");
    SelectBanco.push("'.$BancoResultado[$x].'");

    </script>';

    $x--;

}

$BancoDados = '
<select class="form-control" onclick="FuncaoBanco()" name="Banco" id="Banco">
<option style="display: none;" value="'.$Banco.'">'.$Banco.'</option>
'.$ResultadosBanco.'
</select>';

$BancoDados_2 = '
<select class="form-control" onclick="FuncaoBanco_2()" name="Banco_2" id="Banco_2">
<option style="display: none;" value="'.$Banco_2.'">'.$Banco_2.'</option>
'.$ResultadosBanco_2.'
</select>';

?>