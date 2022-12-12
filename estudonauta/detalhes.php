<!DOCTYPE HTML>
<html lang = "pt-br">
<head>
	
   <title> Título da Página</title>
   <meta charset="UTF-8"/>
   <link rel="stylesheet" href="estilos/style.css"/>
  
 </head>
 
 <body>
        <?php
		 require_once "includes/banco.php";
		 require_once "includes/funcoes.php";
		 
		?>
      <div id="corpo">
	     <?php include_once "topo.php"; 
	     
		   # usa o _GET para pegar da 'url'  se for do pacote usa o _POST
		   $c = $_GET['cod'] ?? 0; #busca o valor do cod na URL, se não tiver o valor fica 0
		   $busca = $banco->query("select*from jogos where cod='$c'");
		 ?>
	     <H1>Detalhes do jogo</H1>
		 <table class="detalhes">
		      <?php
			    if(!$busca){				  
				  echo "Busca falhou! $banco->error";
			  }else{
			       if($busca->num_rows ==1){
					   $reg = $busca->fetch_object();
					   $t=  thumb($reg->capa);
						echo "<tr><td rowspan='3'><img src='$t' class='full'> ";
						echo "<td><h2>$reg->nome</h2>";
						echo "Nota: $reg->nota/10";
						echo "<tr><td>$reg->descricao";
						echo "<tr><td>Adm";
				   }else{
                        echo "<tr><td>Nenhum registro encontrado";	
				   }
			  }  
		     ?>		
		 </table>
	      <a href="index.php"><img src="icones/icoback.png"/></a>
		  
	  </div>
	  <?php include_once "rodape.php"; ?>
 
 
 </body>
   
</html>   