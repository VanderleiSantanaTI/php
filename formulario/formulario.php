<?php
if(isset($_POST['submit']))
{
    print_r($_POST['nome']);
    print_r($_POST['email']);
    print_r($_POST['telefone']);
    include_once('config.php');
    $nome = $_POST['nome'];
    $email =$_POST['email'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao,"INSERT INTO usuarios(nome,email,telefone,sexo,data_nasc,cidade,estado,endereco) VALUES ('$nome', '$email', '$telefone','$sexo', '$data_nascimento', '$cidade','$estado', '$endereco')");
  
}
?>
<!DOCTYPE html>
<html lang="pr-">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>

    <style>
        body{
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(90deg, rgb(20, 147, 220), rgb(17,54,71));
        }
        .box{
            position: absolute;
            top:50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgb(0,0,0,0.6);
            padding: 15px;
            border-radius: 15px;
           
        }
        fieldset{
            border:3px solid dodgerblue;;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;

        }
        .inputUser{
            color: white;
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline:none;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top:0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;


        }
        
        .inputUser:focus ~ .labelInput, .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;


        }
        #data_nascimento{
        
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
    
            
        }
        #submit{
            background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 3px;
        }
        #submit:hover{
            background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="formulario.php" method="POST">


            <fieldset>
         <legend><b>Formulário de Clientes</b></legend>
         <br>
         <div class="inputBox">
            <input type="text" name="nome" id="nome" class="inputUser" required>
            <label for="name" class="labelInput">Nome completo</label>
         </div>
         <br>
         <div class="inputBox">
            <input type="text" name="email" id="email" class="inputUser" required>
            <label for="name" class="labelInput">Email</label>
         </div>
         <br>
         <div class="inputBox">
            <input type="tel" name="telefone" id="telefone" class="inputUser" required>
            <label for="name" class="labelInput">Telefone</label>
         </div>
         <br>

         <p>Sexo:</p>
         <input type="radio" id="feminino" name="genero" value="feminino"required>
         <label for="feminino">Feminino</label>
         <br><br>     
         <input type="radio" id="masculino" name="genero" value="masculino"required>
         <label for="masculino">Masculino</label>
         <br><br>
         <input type="radio" id="outros" name="genero" value="outros"required>
         <label for="outros">Outros</label>
         <br><br>
         
         <label for="data_nascimento"><b>Data de nascimento:</b></label>
         <input type="date" name="data_nascimento" id="data_nascimento" required>           
        
        <br><br><br>
        <div class="inputBox">
            <input type="text" name="cidade" id="cidade" class="inputUser" required>
            <label for="name" class="labelInput">Cidade</label>
         </div>
         <br>
         <div class="inputBox">
            <input type="text" name="estado" id="estado" class="inputUser" required>
            <label for="name" class="labelInput">Estado</label>
         </div>
         <br>
         <div class="inputBox">
            <input type="text" name="endereco" id="endereco" class="inputUser" required>
            <label for="name" class="labelInput">Endereço</label>
         </div>
         <br>
         <input type="submit" name="submit" id="submit" >
         
            </fieldset>


        </form>


    </div>
</body>
</html>