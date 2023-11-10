<?php
include('protect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina inicial</title>
    <style>
        body{
            background-image: url('https://conteudo.imguol.com.br/c/entretenimento/e4/2018/03/19/call-of-duty-modern-warfare-2-1521429841859_v2_900x506.jpg.webp');
            background-repeat: no-repeat;
            background-size: cover;
            padding-top: 40px;
        }
        .morte{
            text-align: center;
            color: red;
        }
        .login-box {
            width: 300px;
            height: 300px;
            background-color: rgba(128, 128, 128, 0.8);
            border: 3px solid black;
            padding: 100px;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .inscricao{
            color: white;
            font-size: 17px;
        }
        a.button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}
    .t{
     font-size: 30px;   
    }
    .site{
        
        display: flex;
        justify-content: center;
        margin-top: -400px;
    }
    
    </style>
</head>
<body><br>
    <div class="login-container">
        <div class="login-box">
        
            <h1 class="t" id="welcome-text">Bem-vindo, <span id="username"> </span>  </h1>
            <label> <a class="inscricao" href="cadrasto.php">Cadastrar novo usuario</a> </label>
            <p><label> <a class="inscricao" href="alterar.php">alterar senha</a> </label>
            <p>
<?php

if ($_SESSION['isAdmin']) {
    // Mostrar o link de redirecionamento apenas se o usuário for um admin
    echo '<a class="inscricao" href="listar.php">listar usuarios</a><br></br>'; 
    echo '<a class="inscricao" href="deletar.php">Delete um usuario</a><br></br>';
    echo '<a class="inscricao" href="promover.php">Promova um usuario</a><br></br>';

    // Verificar se o administrador é o admin de email "admin@fpb.com"
    $adminID ="1"; // ID do admin específico

    if (isset($_SESSION['id']) && $_SESSION['id'] === $adminID) {
        echo '<a class="inscricao" href="rebaixar.php">Rebaixe um usuario</a><br></br>';
    }
}
?>

            </p>
            <p><a class="button" href="logout.php">Logout</a></p>
        </div>
    </div>
    <br>
    <div class="site">
    
    </div>
    
    <script>
        // Obter o nome de usuário da sessão PHP
        var username = "<?php echo $_SESSION['nome']."!"; ?>";
        var welcomeText = document.getElementById("welcome-text");
        var usernameElement = document.getElementById("username");

        // Função para simular a digitação do nome de usuário
        function typeUsername(text, element) {
            var index = 0;

            function type() {
                if (index < text.length) {
                    element.textContent += text.charAt(index);
                    index++;
                    setTimeout(type, 150); // Ajuste a velocidade de digitação aqui (em milissegundos)
                }
            }

            type();
        }

        // Iniciar o efeito de digitação
        typeUsername(username, usernameElement);
    </script>
   

</body>
</html>
