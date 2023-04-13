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
   <title>Login de usuário</title>
   <style>
    div#corpo{
      width : 270px;
      font-size: 13pt;
    }
    td {
      padding: 6px;

    }
  </style>
 </head>

 
 <body>

        
      <div id="corpo">
        
        <?php
          $u = $_POST['usuario'] ?? null;
          $s = $_POST['senha'] ?? null; 

          if (is_null($u) || is_null($s)){
            require "user-login-form.php";
          } else {
            $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1 ";
            $busca = $banco->query($q);
            if(!$busca) {
              echo msg_erro('Falha ao acessar o banco!');
            } else {
                if ($busca->num_rows > 0){
                      $reg = $busca->fetch_object();
                          /*print_r($reg);*/
                      if (testarHash($s, $reg->senha)){
                        echo msg_sucesso('Logado com sucesso');
                        $_SESSION["user"] = $reg->usuario;
                        $_SESSION["nome"] = $reg->nome;
                        $_SESSION["tipo"] = $reg->tipo;
                      }else{
                        echo msg_erro("Senha inválida");
                      }
                    }else{
                      echo msg_erro("Usuário não existe");
                  }      
               }
      
          }
          echo voltar();
        ?> 

      </div>


 </body>


</html>     