<!DOCTYPE HTML>
<?php
      require_once  "includes/banco.php";
		require_once "includes/login.php";
		require_once "includes/funcoes.php";
 ?>     
<html lang = "pt-br">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="style.css"/>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
   <title>Edição de Dados do Usuário</title>
 </head>
 
 <body>
      <div id="corpo">
	     <?php 
            if(!is_logado()){
              echo msg_erro("Efetue <a href='user-login.php'>Login</a> para editar Dados.");
            }else{
               if(!isset($_POST['usuario'])){
                  include "user-edit-form.php";
               }else{
                  echo msg_sucesso("Dados foram recebidos");
               }
               
            }
        ?>
	  
	  </div>
 
      <?php require_once "rodape.php"; ?>
 </body>
   
</html>   