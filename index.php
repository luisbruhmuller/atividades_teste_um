<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'sistema_simples3';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}else{
    echo "<script>console.log('conexão bem sucedida');</script>";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login com o banco</title>
</head>

<body>
    <h2>
        login com php
    </h2>
    <form action="" method="POST">
        <label for="usuario">usuario</label>
        <input type="text" name="usuario">
        <br>
        <label for="senha">senha</label>
        <input type="password" name="senha">
        <br>
        <button type="submit">entrar</button>
    </form>
</body>

</html>