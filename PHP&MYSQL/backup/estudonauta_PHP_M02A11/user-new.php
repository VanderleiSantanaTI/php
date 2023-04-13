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
   <title>Cadastrar novo usuário</title>
 </head>
 
 <body>
      <div id="corpo">
        <?php
	    if(!is_admin()){
            echo msg_erro('Área restrita! Você não é administrador!');
	        
            } else{
               if (!isset($_POST['usuario'])){/*se não tiver preenchido o usuário então*/ 
                require "user-new-form.php";

               }else{
                $usuario = $_POST['usuario'] ?? null;
                $nome  = $_POST['nome'] ?? null;
                $senha1 = $_POST['senha1'] ?? null;
                $senha2 = $_POST['senha2'] ?? null;
                $tipo = $_POST['tipo'] ?? null;

                if($senha1 === $senha2) {
                    echo  msg_sucesso("Tudo  certo pra gravar.");

                } else {
                    echo  msg_erro("Senhas não conferem. Repita o procedimento.");
                }
               }
            }
     
            echo voltar();
            ?>
	  </div>
 
 
 </body>
   
</html>   