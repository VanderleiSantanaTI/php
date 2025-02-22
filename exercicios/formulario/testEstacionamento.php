<?php
$hostname = 'Localhost';
$bancodedados = 'estacionamento';
$usuario = 'root';
$senha = '';

$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);

if($conexao->connect_errno){
    echo "Erro";
}
else{
    echo " Conexao efetuada com sucesso";
}
?>