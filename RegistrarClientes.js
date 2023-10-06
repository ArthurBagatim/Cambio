function FuncaoBanco(){

    var Banco = document.getElementById('Banco').value;

    var pos = SelectBanco.indexOf(Banco);

    document.getElementById('ComissaoBanco').value = 

    ComissaoBanco[pos];

    document.getElementById('BancoCNPJ').value = 

    BancoCNPJ[pos];

    document.getElementById('TarifaBanco').value = 

    "R$ " + BancoTarifa[pos];

}

function FuncaoBanco_2(){

    var Banco_2 = document.getElementById('Banco_2').value;

    var pos = SelectBanco.indexOf(Banco_2);

    document.getElementById('BancoCNPJ_2').value = 

    BancoCNPJ[pos];

    document.getElementById('TarifaBanco_2').value = 

    "R$ " + BancoTarifa[pos];

}