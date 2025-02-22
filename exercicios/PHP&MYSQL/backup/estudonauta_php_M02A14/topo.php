
<?php

  echo "<p class ='pequeno'>";
  if (empty($_SESSION['user'])) {# se o usuário estiver vasio
     echo "<a href='user-login.php'>Entrar</a>";
}else{# se não
  echo "Olá,<strong> " . $_SESSION['nome'] . "</strong> | ";
  echo "<a href='user-edit.php'>Meus Dados</a> | ";
  if (is_admin()) {
    echo "<a href='user-new.php'>Novo usário</a> | ";
    echo "Novo  jogo | ";
  }
  echo "<a href='user-logout.php'>Sair</a>";

}
  
  echo "</p>";
 
 
  