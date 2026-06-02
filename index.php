<?php
// Início da sessão para controle de login
session_start();

// Inclusão do arquivo de conexão com o banco de dados
include("infra/db/connect.php");
// Lógica para autenticação do usuário
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION["usuario"] = $usuario;
        header("Location: public/home.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<!-- Página de Login -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Sitema de Login Simples</h1>
<!-- Formulário de login -->
    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <?php
    // Exibição de mensagem de erro caso as credenciais sejam inválidas 
        if (isset($erro)) {
            echo $erro;
        }
        ;


        ?>
        <br>
        <button type="submit">Entrar</button>
    </form>

</body>

</html>