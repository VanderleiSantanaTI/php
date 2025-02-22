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
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
 
 <body> 
  
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
	  <?php include_once "rodape.php"; ?>
      
       
 </body>
   
</html>