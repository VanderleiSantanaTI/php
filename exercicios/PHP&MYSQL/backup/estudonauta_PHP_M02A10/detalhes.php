<!DOCTYPE HTML>

<?php
		 require_once "includes/banco.php";
		 require_once "includes/login.php";
		 require_once "includes/funcoes.php";
		 
		?>

<html lang = "pt-br">
<head>
   
   <meta charset="UTF-8"/>
   <link rel="stylesheet" href="style.css"/>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
   <title> Detalhe do Jogo</title>
</head>
 
 <body>
        
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
						if (is_admin()){
							echo " <span class='material-symbols-outlined'>add_circle</span>"; 
							echo "<span class='material-symbols-outlined'>edit</span>"; 
							echo "<span class='material-symbols-outlined'>delete</span>";
						    }elseif (is_editor()){
								echo " <span class='material-symbols-outlined'>edit</span>";
							}
						echo "<tr><td>$reg->descricao";
						
				   }else{
                        echo " <tr><td>Nenhum registro encontrado";	
				   }
			  }  
		     ?>		
		 </table>
		  <?php echo voltar() ?>
	  </div>
	  <?php include_once "rodape.php"; ?>
 
 
 </body>
   
</html>   