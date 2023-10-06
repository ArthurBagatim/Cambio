// Função Para Busca
function FuncaoCampo(){

  // Puxando Campo de Pesquisa
  var CNPJ_CPF = document.getElementById("BuscarCNPJ_CPF").value;

  // Inicio Campo 1

  // Selecionando 0 Como CNPJ_CPF
  x = 0;
  // Definindo Que Não Há Valor No Campo
  Campo1 = 'OFF 1';

    // Verificando se Há Clientes Com Dados Semelhantes ao Pesquisado Para o Campo
  while((Campo1 === 'OFF 1' && x != BuscarNumerodeClientes)){

    // Aumentando em 1 Número do CNPJ_CPF
     x++;

    /* Verifica Se Há Valor Semelhante */
    {
      // Avisa Caso Sobressair Limite de Dígitos
      if(CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "none";

        Campo1 = 'OFF 1';

      }
      // Insere Valor Semelhante de 14 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,14)) && !CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];
      

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 13 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,13)) && !CNPJ_CPF.substr(13)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];
      

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 12 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,12)) && !CNPJ_CPF.substr(12)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];
      

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 11 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,11)) && !CNPJ_CPF.substr(11)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];
      

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 10 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,10)) && !CNPJ_CPF.substr(10)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 9 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,9)) && !CNPJ_CPF.substr(9)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 8 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,8)) && !CNPJ_CPF.substr(8)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];
      
        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 7 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,7)) && !CNPJ_CPF.substr(7)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 6 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,6)) && !CNPJ_CPF.substr(6)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 5 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,5)) && !CNPJ_CPF.substr(5)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 4 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,4)) && !CNPJ_CPF.substr(4)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 3 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,3)) && !CNPJ_CPF.substr(3)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 2 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,2)) && !CNPJ_CPF.substr(2)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Insere Valor Semelhante de 1 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,1)) && !CNPJ_CPF.substr(1)){

        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 1
        document.getElementById("BuscarCNPJ_CPF[1]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo 1
        Campo1 = BuscarCNPJ_CPF[x];
        
      }
      // Oculta Caso Não Existir
      else{
    
        // Ocultar
        document.getElementById("BuscarCNPJ_CPF[1]").style.display = "none";

        // Definindo Que Não Há Valor No Campo
        Campo1 = 'OFF 1';
    
      }

    }
    
  } 

  // Inicio Campo 2

  // Selecionando 0 Como CNPJ_CPF
  x = 0;
  // Definindo Que Não Há Valor No Campo
  Campo2 = 'OFF 2';

    // Verificando se Há Clientes Com Dados Semelhantes ao Pesquisado Para o Campo 2
  while((Campo2 === 'OFF 2' && x != BuscarNumerodeClientes) || Campo2 === Campo1){

    // Aumentando em 1 Número do CNPJ_CPF
    x++;

    /* Verifica Se Há Valor Semelhante */
      {
      // Avisa Caso Sobressair Limite de Dígitos
      if(CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "none";

        Campo2 = 'OFF 2';

      }
      // Insere Valor Semelhante de 14 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,14)) && !CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 13 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,13)) && !CNPJ_CPF.substr(13)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 12 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,12)) && !CNPJ_CPF.substr(12)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 11 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,11)) && !CNPJ_CPF.substr(11)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 10 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,10)) && !CNPJ_CPF.substr(10)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 9 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,9)) && !CNPJ_CPF.substr(9)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 8 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,8)) && !CNPJ_CPF.substr(8)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 7 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,7)) && !CNPJ_CPF.substr(7)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 6 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,6)) && !CNPJ_CPF.substr(6)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 5 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,5)) && !CNPJ_CPF.substr(5)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 4 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,4)) && !CNPJ_CPF.substr(4)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 3 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,3)) && !CNPJ_CPF.substr(3)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 2 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,2)) && !CNPJ_CPF.substr(2)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 1 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,1)) && !CNPJ_CPF.substr(1)){

        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 2
        document.getElementById("BuscarCNPJ_CPF[2]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo2 = BuscarCNPJ_CPF[x];

      }
      // Oculta Caso Não Existir
      else{
    
        // Ocultar
        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "none";

        // Definindo Que Não Há Valor No Campo
        Campo2 = 'OFF 2';
    
      }
      // Ocultar Duplicados
      if(Campo2 === Campo1){
      
        // Ocultar
        document.getElementById("BuscarCNPJ_CPF[2]").style.display = "none";
      
      }

    }
    
  }

  // Inicio Campo 3

  // Selecionando 0 Como CNPJ_CPF
  x = 0;
  // Definindo Que Não Há Valor No Campo
  Campo3 = 'OFF 3';

    // Verificando se Há Clientes Com Dados Semelhantes ao Pesquisado Para o Campo 3
  while((Campo3 === 'OFF 3' && x != BuscarNumerodeClientes) || Campo3 === Campo2 || Campo3 === Campo1){

    // Aumentando em 1 Número do CNPJ_CPF
    x++;

    /* Verifica Se Há Valor Semelhante */
    {
      // Avisa Caso Sobressair Limite de Dígitos
      if(CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "none";

        Campo3 = 'OFF 3';

      }
      // Insere Valor Semelhante de 14 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,14)) && !CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 113 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,13)) && !CNPJ_CPF.substr(13)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 112 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,12)) && !CNPJ_CPF.substr(12)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 11 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,11)) && !CNPJ_CPF.substr(11)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 10 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,10)) && !CNPJ_CPF.substr(10)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 9 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,9)) && !CNPJ_CPF.substr(9)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 8 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,8)) && !CNPJ_CPF.substr(8)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 7 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,7)) && !CNPJ_CPF.substr(7)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 6 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,6)) && !CNPJ_CPF.substr(6)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 5 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,5)) && !CNPJ_CPF.substr(5)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 4 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,4)) && !CNPJ_CPF.substr(4)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 3 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,3)) && !CNPJ_CPF.substr(3)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 2 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,2)) && !CNPJ_CPF.substr(2)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 1 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,1)) && !CNPJ_CPF.substr(1)){

        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 3
        document.getElementById("BuscarCNPJ_CPF[3]").value =
      
        BuscarCNPJ_CPF[x];

        // Definindo Que Há Valor No Campo
        Campo3 = BuscarCNPJ_CPF[x];

      }
      // Oculta Caso Não Existir
      else{
    
        // Ocultar
        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "none";

        // Definindo Que Não Há Valor No Campo
        Campo3 = 'OFF 3';
    
      }
      
      // Ocultar Duplicados
      if(Campo3 === Campo2 || Campo3 === Campo1){

        // Ocultar
        document.getElementById("BuscarCNPJ_CPF[3]").style.display = "none";

      }

    }
  
  }

  // Inicio Campo 4

  // Selecionando 0 Como CNPJ_CPF
  x = 0;
  // Definindo Que Não Há Valor No Campo
  Campo4 = 'OFF 4';

    // Verificando se Há Clientes Com Dados Semelhantes ao Pesquisado Para o Campo 4
  while((Campo4 === 'OFF 4' && x != BuscarNumerodeClientes) || Campo4 === Campo3 || Campo4 === Campo2 || Campo4 === Campo1){

    // Aumentando em 1 Número do CNPJ_CPF
    x++;

    /* Verifica Se Há Valor Semelhante */
    {
      // Avisa Caso Sobressair Limite de Dígitos
      if(CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "none";

        Campo4 = 'OFF 4';

      }
      // Insere Valor Semelhante de 14 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,14)) && !CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 13 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,13)) && !CNPJ_CPF.substr(13)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 12 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,12)) && !CNPJ_CPF.substr(12)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 11 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,11)) && !CNPJ_CPF.substr(11)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 10 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,10)) && !CNPJ_CPF.substr(10)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 9 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,9)) && !CNPJ_CPF.substr(9)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 8 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,8)) && !CNPJ_CPF.substr(8)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 7 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,7)) && !CNPJ_CPF.substr(7)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 6 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,6)) && !CNPJ_CPF.substr(6)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 5 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,5)) && !CNPJ_CPF.substr(5)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 4 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,4)) && !CNPJ_CPF.substr(4)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 4 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,3)) && !CNPJ_CPF.substr(3)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 2 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,2)) && !CNPJ_CPF.substr(2)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];



        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 1 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,1)) && !CNPJ_CPF.substr(1)){

        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 4
        document.getElementById("BuscarCNPJ_CPF[4]").value =
      
        BuscarCNPJ_CPF[x];


        // Definindo Que Há Valor No Campo
        Campo4 = BuscarCNPJ_CPF[x];

      }
      // Oculta Caso Não Existir
      else{
    
        // Ocultar
        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "none";

        // Definindo Que Não Há Valor No Campo
        Campo4 = 'OFF 4';
    
      }
      
      // Ocultar Duplicados
      if(Campo4 === Campo1 || Campo4 === Campo2 || Campo4 === Campo3){

        // Ocultar
        document.getElementById("BuscarCNPJ_CPF[4]").style.display = "none";

      }

    }
  
  }

  // Inicio Campo 5

  // Selecionando 0 Como CNPJ_CPF
  x = 0;
  // Definindo Que Não Há Valor No Campo
  Campo5 = 'OFF 5';

    // Verificando se Há Clientes Com Dados Semelhantes ao Pesquisado Para o Campo 5
  while((Campo5 === 'OFF 5' && x != BuscarNumerodeClientes) || Campo5 === Campo4 || Campo5 === Campo3 || Campo5 === Campo2 || Campo5 === Campo1){

    // Aumentando em 1 Número do CNPJ_CPF
    x++;

    /* Verifica Se Há Valor Semelhante */
    {
      // Avisa Caso Sobressair Limite de Dígitos
      if(CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "none";

        Campo5 = 'OFF 5';

      }
      // Insere Valor Semelhante de 14 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,14)) && !CNPJ_CPF.substr(14)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 13 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,13)) && !CNPJ_CPF.substr(13)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 12 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,12)) && !CNPJ_CPF.substr(12)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 11 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,11)) && !CNPJ_CPF.substr(11)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 10 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,10)) && !CNPJ_CPF.substr(10)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 9 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,9)) && !CNPJ_CPF.substr(9)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 8 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,8)) && !CNPJ_CPF.substr(8)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 7 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,7)) && !CNPJ_CPF.substr(7)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 6 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,6)) && !CNPJ_CPF.substr(6)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 5 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,5)) && !CNPJ_CPF.substr(5)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 4 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,4)) && !CNPJ_CPF.substr(4)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 5 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,3)) && !CNPJ_CPF.substr(3)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 2 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,2)) && !CNPJ_CPF.substr(2)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Insere Valor Semelhante de 1 dígitos
      else if(CNPJ_CPF.match(BuscarCNPJ_CPF[x].substr(0,1)) && !CNPJ_CPF.substr(1)){

        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "block";
        // Insere Dado Semelhante ao Pesquisado no Campo 5
        document.getElementById("BuscarCNPJ_CPF[5]").value =
      
        BuscarCNPJ_CPF[x];
      
        // Definindo Que Há Valor No Campo
        Campo5 = BuscarCNPJ_CPF[x];

      }
      // Oculta Caso Não Existir
      else{
    
        // Ocultar
        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "none";

        // Definindo Que Não Há Valor No Campo
        Campo5 = 'OFF 5';
    
      }
      
      // Ocultar Duplicados
      if(Campo5 === Campo1 || Campo5 === Campo2 || Campo5 === Campo3 || Campo5 === Campo4){

        // Ocultar
        document.getElementById("BuscarCNPJ_CPF[5]").style.display = "none";
      }

    }
  
  }

}

// Função Para Inserir Campo 1
function FuncaoBuscarCNPJ_CPF1(){

  var Campo1 = document.getElementById("BuscarCNPJ_CPF[1]").value;
  
  document.getElementById("BuscarCNPJ_CPF").value =

  Campo1;

} 

// Função Para Inserir Campo 2
function FuncaoBuscarCNPJ_CPF2(){

  var Campo2 = document.getElementById("BuscarCNPJ_CPF[2]").value;
  
  document.getElementById("BuscarCNPJ_CPF").value =

  Campo2;

} 

// Função Para Inserir Campo 3
function FuncaoBuscarCNPJ_CPF3(){

  var Campo3 = document.getElementById("BuscarCNPJ_CPF[3]").value;
  
  document.getElementById("BuscarCNPJ_CPF").value =

  Campo3;

} 

// Função Para Inserir Campo 4
function FuncaoBuscarCNPJ_CPF4(){

  var Campo4 = document.getElementById("BuscarCNPJ_CPF[4]").value;
  
  document.getElementById("BuscarCNPJ_CPF").value =

  Campo4;

} 

// Função Para Inserir Campo 5
function FuncaoBuscarCNPJ_CPF5(){

  var Campo5 = document.getElementById("BuscarCNPJ_CPF[5]").value;
  
  document.getElementById("BuscarCNPJ_CPF").value =

  Campo5;

} 