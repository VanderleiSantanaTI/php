<!DOCTYPE HTML>

<?php
	    /*include "includes/banco.php";#Obs: se o include der erro, o site continua*/
		/*require "includes/banco.php";#Obs: Se o require der erro, o site para de fincionar*/
		require_once  "includes/banco.php"; /*Obs: se usar a ênclise "_once" evita de importar duas vezes*/
		require_once "includes/login.php";
		require_once "includes/funcoes.php";/*buca a função thumb*/
		$ordem = $_GET['o'] ?? "n"; #pega o cod separado pela interrogação (?), caso não tenha retorna nome(n)
		$chave = $_GET['c'] ?? ""; #campo de input, caso nao exista retornar vazio
	  ?>
<html lang = "pt-br">

<head>
   <title> Listagem de jogos </title>
   <meta charset="UTF-8"/>
   <link rel="stylesheet" href="style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
 
 <body class="p-3"> 
  
      <div id="corpo">
	      <?php include_once "topo.php";?> 
	     <H1>Escolha seu jogo</H1>

	
		 <form method="get" id="busca" action="index.php">
		 Ordenar:
		 <a href="index.php?o=n&c=<?php echo $chave;?>">Nome</a> | 
		 <a href="index.php?o=p&c=<?php echo $chave;?>">Produtora</a> | 
		 <a href="index.php?o=n1&c=<?php echo $chave;?>">Nota alta</a> | 
		 <a href="index.php?o=n2&c=<?php echo $chave;?>">Nota baixa</a> |
		 <a href="index.php">Mostrat todos</a> |
		 Buscar:<input type="text" name="c" size="10" maxlength="40"/>
		  
		 <input type="submit" value="ok"/>
		 </form>
	     <table class="Listagem">
		    <?php
			    $q = "select j.cod, j.nome, g.genero, p.produtora, j.capa  from jogos j join generos g on j.genero = g.cod 
				join produtoras p on j.produtora = p.cod ";
				 if (!empty($chave)){
					 # chave de busca
					 $q .= "WHERE j.nome like '%$chave%' OR p.produtora  like '%$chave%' OR g.genero like  '%$chave%'"  ;
				 }
				switch ($ordem) {
					case "p": 
					      $q .= "ORDER BY p.produtora";/*o recurso ".=" atribui o valor no final de '$q'. obs: deixar espaço no final*/
						  break;
					case "n1":
					      $q .= "ORDER BY j.nota DESC";
						  break;
					case "n2":
					      $q .= "ORDER BY j.nota ASC";
                         break;						  
					default:
                         $q .=  "ORDER BY j.nome";
                         #break;						 
				}
			    $busca = $banco->query($q);
			    if (!$busca){
					echo  "<tr><td>Infelismente a busco deu errado";
                  				
				}else{
				    if($busca->num_rows == 0){
					   echo "<tr><td>Nenhum registro foi encontrado";
					
				    }else{
						
						while($reg=$busca->fetch_object()){	
						    $t=  thumb($reg->capa);
							echo "<tr><td><img class='mini' src=$t>";
							echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";# a parte (detalhes.php?cod=$reg->cod) o "?" chama o codigo do jogo
							echo " [$reg->genero]";
							echo "<br/>$reg->produtora";
							if (is_admin()){
							echo "<td> <span class='material-symbols-outlined'>add_circle</span>"; 
							echo "<span class='material-symbols-outlined'>edit</span>"; 
							echo "<span class='material-symbols-outlined'>delete</span>";
							 
						    }elseif (is_editor()){
								echo "<td>";
								echo "<span class='material-symbols-outlined'>edit</span>";
							}
						}
					}				
			 }
			?>
		      
			</table>			
	  </div>
	  <script>
      
                    function calcular() {
                    const operacao = document.getElementById("estado").value;
                    const valor_pago = parseFloat(document.getElementById("valor_pago").value);
                    
                    

                    // Verificar se os números são válidos
                    if (isNaN(valor_pago)) {
                        alert("Por favor, insira valores numéricos válidos.");
                        return;
                    }
                    
                    let Tipo_ligacao = 30;
                    let consumo_estimado;
                    let tarifa;
                    let resultadoAredondado;
                    let consume_diario;
                    let iradiacao_solar;
                    let sistema;
                    let potencia_modulo = 460;
                    let qtd_modulo;
                    let geracao_energia;
                    let producao_anual;
                    let potencia_inst_estimada;
                    let investimento;
                    
                    
                    
                    // Aplicar critério usando 'if'
                    if (operacao == "SP") {
                        tarifa = 0.60000;
                        consumo_estimado = (valor_pago / tarifa) - Tipo_ligacao;
                        consume_diario = consumo_estimado/30
                        iradiacao_solar = 4.43;
                        tarifa = " R$ " + 0.61000;
                        
                        // mostrar tabela
                        tabelaHidden.removeAttribute("hidden");


                    } else if (operacao == "RJ") {
                        tarifa = 0.84360;
                        consumo_estimado = (valor_pago / tarifa) - Tipo_ligacao;
                        consume_diario = consumo_estimado/30
                        iradiacao_solar = 4.70;
                        tarifa = " R$ " + 0.84360;
                        
                        // mostrar tabela
                        tabelaHidden.removeAttribute("hidden");
                       

                    } else if (operacao == "MG") {
                        tarifa = 0.83000;
                        consumo_estimado = (valor_pago / tarifa) - Tipo_ligacao;
                        consume_diario = consumo_estimado/30
                        iradiacao_solar = 5.13;
                        tarifa = " R$ " + 0.83000;
                        
                        // mostrar tabela
                        tabelaHidden.removeAttribute("hidden");

                    } else if (operacao == "Estado") {
                        
                        alert("Selecionar um estado.");
                        return;
                        
                    } else {
                        alert("Selecione uma operação válida.");
                        return;
                    }

                    
                    // formatação de saida
                    sistema = (consume_diario/iradiacao_solar)*1.2 ;//kWp O "*1.2" é para compensar a perda
                    qtd_modulo = (sistema/potencia_modulo)*1000; // multiplacar por 1000 para ficar só em W
                    qtd_modulo = Math.ceil(qtd_modulo);// Arredonda o consumo_estimado para o número inteiro para  cima
                    geracao_energia1 = (((qtd_modulo * potencia_modulo * iradiacao_solar)/ 1000) * 30);// dividida por mil para tornar KWp-dia e multiplicado por 30 para achar mensal.
                    geracao_energia2 = ((((qtd_modulo*1.1) * potencia_modulo * iradiacao_solar)/ 1000) * 30);
                    geracao_energia = ((geracao_energia1 + geracao_energia2)/2)*0.8; // media mensal, o 0,8 seria a perda de energia sofrida da instalação.
                    
                    consumo_estimado = Math.ceil(consumo_estimado) + " kWh ";// Arredonda o consumo_estimado para o número inteiro para cima   
                    potencia_inst_estimada1 =  qtd_modulo * potencia_modulo;
                    potencia_inst_estimada2 =  Math.ceil(qtd_modulo*1.1) * potencia_modulo;
                    
                    qtd_modulos = " De " + qtd_modulo + " a " + Math.ceil(qtd_modulo*1.1) + " placas de " + potencia_modulo + "Wp";
                    potencia_inst_estimada = " de " + potencia_inst_estimada1 + " kWp a " + potencia_inst_estimada2 + " kWp "; 

                    

                    producao_anual = (geracao_energia*12).toFixed(2) + " kWh"; // O toFixed(2) para reduzir em duas casas decimas.
                    geracao_energia = geracao_energia.toFixed(2) + " kWh ";

                    const valor1 = (qtd_modulo*2492.3744 + 640.6218)*1.25;
                    const valor2 = (qtd_modulo*2492.3744 + 640.6218)*1.358;
                    const formatoMoeda = 'pt-BR'; // Código ISO para o Brasil
                    const valorFormatado1 = valor1.toLocaleString(formatoMoeda, { style: 'currency', currency: 'BRL' });
                    const valorFormatado2 = valor2.toLocaleString(formatoMoeda, { style: 'currency', currency: 'BRL' });
                    
                    investimento = "De R$" + (valorFormatado1) + " a  R$ " + (valorFormatado2);
                    // Colocar os valores nas células da tabela
                    
                    document.querySelector(".operacaoCelula").innerText = operacao;
                    document.querySelector(".tarifaCelula").innerText = tarifa;
                    document.querySelector(".consumo_estimadoCelula").innerText = consumo_estimado;
                    document.querySelector(".qtd_moduloCelula").innerText = qtd_modulos;
                    document.querySelector(".potencia_inst_estimadaCelula").innerText = potencia_inst_estimada;
                    document.querySelector(".geracao_energiaCelula").innerText = geracao_energia;
                    document.querySelector(".producao_anualCelula").innerText = producao_anual;
                    document.querySelector(".investimentoCelula").innerText = investimento;
                    
                }


    </script>



    <div class="card text-center p-3">
        <div class="card-header mb-3">
            <h2>SIMULADOR on-grid mono.</h2>
          </div>
          
        <select class="form-select form-select-lg mb-3" id="estado" aria-label=".form-select-lg example">

            <option selected>Estado</option>
            
            <option value="MG">Minas Gerais</option>
        
            <option value="RJ">Rio de Janeiro</option>
           
            <option value="SP">São Paulo</option>
          
          </select>
          <p class="fs-3" >Quanto você paga em média de energia por mês? (R$)</p>
          
          <div class="input-group">
            <span class="input-group-text">R$</span>
            <input type="text" class="form-control" id="valor_pago" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">.00</span>
          </div>
        
          <div class="d-grid gap-2 p-3">
            <button class="btn btn-primary" type="button" onclick="calcular()">CALCULAR</button>
          </div>
      

          <table class="table  table-hover" id="tabelaHidden"  hidden>
            <thead>
              <tr>
                <th scope="col" class="operacaoCelula"></th>
                <th scope="col">Discrição</th>
                <th scope="col">Valores</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Tarifa Estimada</td>
                <td class="tarifaCelula"></td>
               
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Consumo Estimado</td>
                <td class="consumo_estimadoCelula"></td>                
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Qtd. de Placas Estimada</td>
                <td class="qtd_moduloCelula"></td>                
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Potência inst. Estimada</td>
                <td class="potencia_inst_estimadaCelula"></td>                
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Geração mensal de energia média</td>
                <td class="geracao_energiaCelula">148,23 kWh</td>                
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Produção anual de energia média</td>
                <td class="producao_anualCelula"></td>                
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>INVESTIMENTO ESTIMADO</td>
                <td class="investimentoCelula"></td>         
              </tr>
            
              <tr>
                <th scope="row">8</th>
                <td colspan="2">FIM</td>
                
              </tr>
            </tbody>
          </table>



          <div class="card-footer text-body-secondary">
            <p class="fs-5">Calculadora VSATECH &copy; 2023</p>
          
          </div>

</div>
	  <?php include_once "rodape.php"; ?>
      
       
 </body>
   
</html>