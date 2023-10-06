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

// Calculo do Spread
function FuncaoSpread(){

    var Spread;
    var TaxaFinal = (document.getElementById("TaxaFinal").value).replace(/[^0-9]/g,'')/1000;
    var Spot = (document.getElementById("Spot").value).replace(/[^0-9]/g,'')/1000;

    if(Spot >= 0.0001 && TaxaFinal >= 0.0001){

        if(Spot < TaxaFinal){

            Spread = (TaxaFinal-Spot)/Spot;
        
        }else{
        
            Spread = (Spot-TaxaFinal)/TaxaFinal;
        
        }

        document.getElementById("Spread").innerHTML =

        Spread.toFixed(4) * 100 + "%";

    }

}

// Calculo da Receita Bruta
function FuncaoReceitaBruta(){

    var Valor = (document.getElementById("Valor").value).replace(/[^0-9]/g,'')/100;
    var TaxaFinal = (document.getElementById("TaxaFinal").value).replace(/[^0-9]/g,'')/1000;
    var Spot = (document.getElementById("Spot").value).replace(/[^0-9]/g,'')/1000;
    var TarifaCobrada = (document.getElementById("TarifaCobrada").value).replace(/[^0-9]/g,'')/100;
    var TarifaBanco = (document.getElementById("TarifaBanco").value).replace(/[^0-9]/g,'')/100;
    var ComissaoBanco = (document.getElementById("ComissaoBanco").value).replace(/[^0-9]/g,'')/100;

    if(Spot < TaxaFinal){

        ReceitaBruta = ((TaxaFinal-Spot)*Valor)+TarifaCobrada;

    }else{

        ReceitaBruta = ((Spot-TaxaFinal)*Valor)+TarifaCobrada;

    }

    ReceitaPIS = ReceitaBruta-(ReceitaBruta*0.0465);
    ReceitaPISTarifa = ReceitaPIS-TarifaBanco;
    ReceitaFinal = (ReceitaPISTarifa*(ComissaoBanco));
    
    if(ReceitaFinal > 0){

        document.getElementById("ReceitaBruta").innerHTML =

        ReceitaFinal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

    }

}