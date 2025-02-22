<?php
if (isset($_POST['email'])){
  include('config.php');

  $nome = $_POST['nome'];
  $email = $_POST['email'];

  
  $result=mysqli_query($conexao,"INSERT INTO  entrada (nome, email) VALUES ('$nome', '$email')");
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD- Cadastar</title>
</head>
<body>
    <h1>cadastrar Usuário</h1>
    <form action="" method="POST">

      <label>Nome:</label>
      <input type="text"  name="nome" placeholder="Digite o nome completo"><br><br>
      <label>Email:</label>
      <input type="text"  name="email" placeholder="Digite o seu email "><br><br>

      <button type="submit">Cadastrar </button>





    </form>
</body>
</html>