<?php
session_start();
include("conexao.php"); //inclue o arquivo conexão no arquivo index.php



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjetoA3</title>
    <style>

        body{
            background-image: url('https://w.forfun.com/fetch/0c/0c5259b4fb3b2f2db3b66ba26619e8da.jpeg?w=1000&r=0.5625 ');
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1.projetoa3{
            color:aliceblue;
        }

        p.aluno{
            color: aliceblue;
        }
        .error{
            color: darkred;
            text-align: center;
            margin-top: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-size: 23px;
        }
        .login-box {
            width: 300px;
            margin: 0 auto;
            background-color: rgba(128, 128, 128, 0.8);
            border: 3px solid black;
            padding: 20px;
            margin-top: 8%;
        }

        .login-box label {
            display: block;
            margin-bottom: 10px;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .login-box button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }
        .inscricao{
            margin-top: 20px;
            margin-left: 40px;
        }
        .input{
            margin-right: 20px;
        }
        .botao{
            display: inline-block;
            padding: 2px 5px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            margin-left: 35%;
            margin-top: 5%;
        }
        .login-box a {
            color: #0000ff;
            text-decoration: none;
        }
    .container {
            position: relative;
        }
         
    </style>
</head> 
<body>
    <h1 class="projetoa3"> MISSÃO: projetoA3</h1>
    <p class= "aluno">CODENAME: Luiz Antônio da Silva Santino</p>

    <div class="container">
        <div class="login-box">
            <form action="" method="POST">
            <div><label for="email">E-mail</label></div>
            <div class="input"> <input type="text" name="email" id="email"> </div>
                <label for="senha">Senha</label>
            <div class="input"><input type="password" name="senha" id="senha"> </div>
            <div class="botao"><button type="submit">Acessar</button></div> 


            <!-- Codigo logico do php -->
<?php
if(isset($_POST["email"])   || isset($_POST["senha"])){ //verificar se as caixas estão vazias 

    if(strlen($_POST["email"]) == 0){
        echo '<div class="error">Preencha seu e-mail</div>';
}   else if (strlen($_POST["senha"]) == 0){
        echo '<div class="error">Preencha sua senha';
}   else {
        $email = $mysqli->real_escape_string($_POST["email"]); 
        $senha = $mysqli->real_escape_string($_POST["senha"]);

    $sql_code = " SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("falha na execução do código SQL" . $mysqli->error);
    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

        if(isset($_SESSION)){

            session_start();
    }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION["nome"] = $usuario["nome"];   

        header("location: index.php"); 

    } else {
            echo '<div class="error">E-mail ou senha incorretos</div>';
            }

    }

}

?>
    <!-- Fim do codigo logico -->


    </div>

        </form>
    </div>
</body>
</html>
