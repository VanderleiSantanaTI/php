<?php
	 $banco = new mysqli("localhost", "root", "", "nomebanco");
	 if($banco->connect_errno){
		 echo "<p> Encontrei um erro $banco->errno --> $banco->connect_error</p>";# mensage personalizada
		 die(); #significa parar a execução se houver erro
	 }
	 
	 
	 #caso dê problebla de compatibilidade no padrão de escrita
	 #$banco->query("SET NAMES 'utf8'");
	 #$banco->query("SET CHARACTER_set_ connection=utf8");
	 #$banco->query("SET CHARACTER_set_client=utf8");
	 #$banco->query("SET CHARACTER_set_results=utf8");
	 
	 
