<!DOCTYPE html>
<?php 
require_once "includes/banco.inc";
require_once "includes/funcoes.inc"; 
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="estilos/estilo.css"/>
		<title>Detalhes do Jogo</title>
	</head>
	<body>
		<div id="corpo">
			<?php include "topo.php"; ?>
			<table class="detalhes">
			<?php
				$cod = $_GET['cod'] ?? 0;
				$q = "SELECT * FROM jogos j WHERE j.cod = '$cod'";
				$busca = $banco->query($q);
				if (!$busca) {
					echo "Falhou! $banco->error";
				} else {
					if ($busca->num_rows > 0) {
						$reg = $busca->fetch_object();
						$thumb = thumb($reg->capa);
						echo "<tr><td rowspan='3'><img class='grande' src='$thumb'/>";
						echo "<td><h1>$reg->nome</h1>";
						echo "Nota: $reg->nota / 10.0";
						echo "<tr><td><p>$reg->descricao</p>";
					} else {
						echo "<p>Jogo não encontrado</p>";
					}		
				}
			?>
			</table>
			<a href="index.php"><img src="icones/icoback.png"/></a>
		</div>
		<?php include "rodape.php"; ?>
	</body>
</html>