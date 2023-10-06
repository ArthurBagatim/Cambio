<?php

/* Verificação de Login */
include('VerificacaoOn.php');

$x = 0;

// Selecionando Banco do Cliente
$query = "SELECT * FROM `Login` where Nivel_De_Acessos_Empresa_secure = '2'";

$dados = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($dados)){

    $x++;
    $OperadorResponsavelResultado[$x] = $row['UserName_Empresa_secure'];

}

if(!isset($OperadorResponsavel)){

    $OperadorResponsavel = $_SESSION['UserName'];

}

$ResultadosOperador = '';

while($x > 0){

    $ResultadosOperador = '
    <option class="form-control dropdown-empresa-option" value="'.$OperadorResponsavelResultado[$x].'">'.$OperadorResponsavelResultado[$x].'</option>' . $ResultadosOperador;
    $x--;

}

$OperadorResponsavelDados = '
<select class="form-control" name="OperadorResponsavel" id="OperadorResponsavel" value="'.$OperadorResponsavel.'">
<option style="display: none;" value="'.$OperadorResponsavel.'">'.$OperadorResponsavel.'</option>
'.$ResultadosOperador.'
</select>';

if(isset($_SESSION['Natureza'])){
    
    $Natureza = $_SESSION['Natureza'];
    unset($_SESSION['Natureza']);

}
if($Natureza == ''){

    $Natureza = 'Natureza operação';
  
}

$NaturezaDados = '
<select class="form-control" name="Natureza" id="Natureza_da_Operacao">
<option style="display: none;" value="'.$Natureza.'">'.$Natureza.'</option>
<option class="form-control dropdown-empresa-option" value="Importação">Importação</option>
<option class="form-control dropdown-empresa-option" value="Exportação">Exportação</option>
<option class="form-control dropdown-empresa-option" value="Financeiro Venda">Financeiro Venda</option>
<option class="form-control dropdown-empresa-option" value="Financeiro Compra">Financeiro Compra</option>
</select>';

if(isset($_SESSION['Moeda'])){
    
    $Moeda = $_SESSION['Moeda'];

}else if(!isset($Moeda)){
    
    $Moeda = 'Selecionar moeda';
    
}

$MoedaDados = '
<select class="form-control" name="Moeda" id="Selecionar_Moeda">
<option style="display: none;" value="'.$Moeda.'">'.$Moeda.'</option>
<option class="form-control dropdown-empresa-option" value="USD">USD</option>
<option class="form-control dropdown-empresa-option" value="EUR">EUR</option>
<option class="form-control dropdown-empresa-option" value="GBP">GBP</option>
</select>';

$x = 0;

// Selecionando Dados de Bancos
$query = "SELECT * FROM `EmpresaBancos`";

$dados = mysqli_query($conn, $query);

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

while($x > 0){

    $ResultadosBanco = '<option class="form-control dropdown-empresa-option" value="'.$BancoResultado[$x].'">'.$BancoResultado[$x].'</option>' . $ResultadosBanco;
   
    echo '<script>

    ComissaoBanco.push("'.$ComissaoBancoResultado[$x].'");
    BancoCNPJ.push("'.$BancoCNPJResultado[$x].'");
    BancoTarifa.push("'.$TarifaBancoResultado[$x].'");
    SelectBanco.push("'.$BancoResultado[$x].'");

    </script>';

    $x--;

}


// Selecionando Banco do Cliente
$query = "SELECT * FROM `EmpresaBancos` where Nome = '$Banco'";

$dados = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($dados);

$BancoCNPJ = $row['CNPJBanco'];
$ComissaoBanco = ($row['ComissaoBanco']*100)."%";
$TarifaBanco = $row['Tarifa'];

if(isset($_SESSION['Banco'])){

    $Banco = $_SESSION['Banco'];
    $BancoCNPJ = $_SESSION['BancoCNPJ'];
    $TarifaBanco = $_SESSION['TarifaBanco'];

    unset($_SESSION['ComissaoBanco']);
    unset($_SESSION['Banco']);
    unset($_SESSION['BancoCNPJ']);
    unset($_SESSION['TarifaBanco']);

}

$BancoDados = '
<select class="form-control" onclick="FuncaoBanco() + FuncaoReceitaBruta()" name="Banco" id="Banco">
<option style="display: none;" value="'.$Banco.'">'.$Banco.'</option>
'.$ResultadosBanco.'
</select>';


?>