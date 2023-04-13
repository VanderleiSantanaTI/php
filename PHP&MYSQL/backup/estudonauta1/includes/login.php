<?php

session_start();

if (!isset($_SESSION['user'])){#se nao tiver nada preenchido então preencher os campos 
      $_SESSION['user']="";#se o  usuário estiver logado irá aparecer
      $_SESSION['nome']="";
      $_SESSION['tipo']="";
}


function cripto($senha){
    $c = '';
    for($pos  = 0; $pos < strlen($senha);  $pos++){
       
        $letra = ord($senha[$pos])+1;
        $c .= chr($letra); 
    }
    return $c;

}

function gerarHash($senha){
    $hash = password_hash(cripto($senha), PASSWORD_DEFAULT);
    return $hash;
}
 

function testarHash($senha, $hash) {
    $ok = password_verify(cripto($senha), $hash);
    return $ok;
}
#$original = 'teste';
#$modificada = cripto($original);
#echo "$original------";
#echo '<br>';
#echo  cripto($original) . "---";
#echo '<br>';

#echo  gerarHash($original). "---";
#echo '<br>';

#echo testarHash($original,'$2y$10$tqbgwAzwMCTMFg3hQXNPBepkj80DR9qvYZhReVuTlPUGyAY1BjjWm')?"SIM":"NÃO";//condição se senha condiz 



function logout(){
     unset($_SESSION['user']);
     unset($_SESSION['nome']);
     unset($_SESSION['tipo']);
}