/*! Função Para Campo de Moeda USD */

String.prototype.reverse = function(){
    return this.split('').reverse().join(''); 
  };
  
  function mascaraMoeda(campo,evento){
    var Selecionar_Moeda = document.getElementById("Selecionar_Moeda").value;
    if(Selecionar_Moeda !== "Selecionar moeda"){
    var Selecionar_Moeda = document.getElementById("Selecionar_Moeda").value;
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
    var resultado  = "";
    var mascara = "###.###.###.###.###.###,##".reverse();
    for (var x=0, y=0; x<mascara.length && y<valor.length;) {
      if (mascara.charAt(x) != '#') {
        resultado += mascara.charAt(x);
        x++;
      } else {
        resultado += valor.charAt(y);
        y++;
        x++;
      }
    }
    
    campo.value = Selecionar_Moeda + " "  + resultado.reverse();

  }else{

    alert('Selecione um Modelo de Moeda');
    campo.value = '';

  }

}

/*! Função Para Campo de Moeda Real */

String.prototype.reverse = function(){
  return this.split('').reverse().join(''); 
};

function mascaraMoedaReal(campo,evento){
  var tecla = (!evento) ? window.event.keyCode : evento.which;
  var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
  var resultado  = "";
  var mascara = "###.###.###.###.###.###,##".reverse();
  for (var x=0, y=0; x<mascara.length && y<valor.length;) {
    if (mascara.charAt(x) != '#') {
      resultado += mascara.charAt(x);
      x++;
    } else {
      resultado += valor.charAt(y);
      y++;
      x++;
    }
  }
  
  campo.value = "R$ " + resultado.reverse();

}

  /*! Função Para Campo de Taxa */

String.prototype.reverse = function(){
  return this.split('').reverse().join(''); 
};

function mascaraTaxa(campo,evento){
  var Selecionar_Moeda = document.getElementById("Selecionar_Moeda").value;
  if(Selecionar_Moeda !== "Selecionar moeda"){
  var Selecionar_Moeda = document.getElementById("Selecionar_Moeda").value;
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
    var resultado  = "";
    var mascara = "###.###.###.###.###.###,####".reverse();
    for (var x=0, y=0; x<mascara.length && y<valor.length;) {
      if (mascara.charAt(x) != '#') {
        resultado += mascara.charAt(x);
        x++;
      } else {
        resultado += valor.charAt(y);
        y++;
        x++;
      }
    }

    campo.value = "R$ " + resultado.reverse();

  }else{

    alert('Selecione um Modelo de Moeda');
    campo.value = '';

  }

}

function mascaraPorcentagem(campo,evento){
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
    var resultado  = "";
    var mascara = "###,##".reverse();
    for (var x=0, y=0; x<mascara.length && y<valor.length;) {
      if (mascara.charAt(x) != '#') {
        resultado += mascara.charAt(x);
        x++;
      } else {
        resultado += valor.charAt(y);
        y++;
        x++;
      }
    }

    campo.value = "% " + resultado.reverse();

}