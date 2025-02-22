<!DOCTYPE html>
<?php 
require_once "includes/banco.inc";
require_once "includes/funcoes.inc"; 
$ordem = $_GET['o'] ?? "nome";
$chave = $_GET['c'] ?? "";
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="estilos/estilo.css"/>
		<title>Listagem de Jogos</title>
	</head>
	<body>
		<div id="corpo">
		<?php include "topo.php"; ?>
		<h1>Escolha seu jogo</h1>
		<form method="get" action="index.php">
		<p class= "pequeno"> Ordenar: <a href="index.php?o=n">Nome</a> | 
		<a href="index.php?o=d">Distribuidora</a> | 
		<a href="index.php?o=n1">Nota Alta</a> | 
		<a href="index.php?o=n2">Nota Baixa</a> | 
		Buscar:
		<input type="text" name="c" size="10" maxlength="40"/>
		<input type="submit" value="Ok"/></p>
		</form>
		<table class="listagem">
			<?php
				$q = "SELECT j.cod, j.nome, g.genero, p.produtora, j.nota, j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
				if (!empty($chave)) {
					$q .= " WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%'";
				}
				switch ($ordem) {
					case "d":
						$q .= " ORDER BY p.produtora";
						break;
					case "n1":
						$q .= " ORDER BY j.nota DESC";
						break;
					case "n2":
						$q .= " ORDER BY j.nota ASC";
						break;
					default:
						$q .= " ORDER BY j.nome";
						break;
				}
				$busca = $banco->query($q);
				if (!$busca) {
					echo "Falhou! $banco->error";
				} else {
					if ($busca->num_rows > 0) {
						while($reg = $busca->fetch_object()){
							# Carregar thumb
							echo "<tr><td>";
							$thumb = thumb($reg->capa);
							echo "<img src='$thumb' class='mini'/>";
							# Mostrar jogo
							echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
							echo "<br>($reg->genero) $reg->produtora";
						}
					} else {
						echo "<p>Nenhum registro encontrado...</p>";
					}						
				}
			?>
		</table>
		</div>
		<?php include "rodape.php"; ?>
	</body>
</html>