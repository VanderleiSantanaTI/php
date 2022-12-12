<!DOCTYPE HTML>
<html lang = "pt-br">

<head>
   <title> Listagem de jogos </title>
   <meta charset="UTF-8"/>
   <link rel="stylesheet" href="estilos/style.css"/>
  
  
  
</head>
 
 <body> 
         <nav class="nave">9898</nav>
      <?php
	    #include "includes/banco.php";#Obs: se o include der erro, o site continua
		#require "includes/banco.php";#Obs: Se o require der erro, o site para de fincionar
		require_once  "includes/banco.php"; # Obs: se usar a ênclise "_once" evita de importar duas vezes
		require_once "includes/funcoes.php";# buca a função thumb
	  ?>
      <div id="corpo">
	     <H1>Escolha seu jogo</H1>
	     <table class="Listagem">
		    <?php
			    $busca = $banco->query("select * from jogos order by nome");
			    if (!$busca){
					echo  "<tr><td>Infelismente a busco deu errado";
                  				
				}else{
				    if($busca->num_rows == 0){
					   echo "<tr><td>Nenhum registro foi encontrado";
					
				    }else{
						
						while($reg=$busca->fetch_object()){	
						    $t=  thumb($reg->capa);
							$desc = $reg->descricao; 
							echo "<tr><td><img class='mini' src=$t>";
							echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";# a parte (detalhes.php?cod=$reg->cod) o "?" chama o codigo do jogo
							echo "<td> adm ";
							
						}
					}				
			 }
			?>
		      
			</table>
	  </div>
 
 
 </body>
   
</html>