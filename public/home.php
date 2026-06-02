<?php
// Página de Home, onde o usuário pode cadastrar novos usuários e visualizar a tabela de usuários cadastrados.
// Acessível apenas para usuários logados.
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: ../index.php");
    exit();
}
// Inclusão do arquivo de conexão com o banco de dados
include("../infra/db/connect.php");
// Lógica para cadastro de novo usuário
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $novoUsuario = $_POST['usuario'];
    $novaSenha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (usuario,senha) 
    VALUES ('$novoUsuario','$novaSenha')";  

    if($conn->query($sql) === TRUE){
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
    }else{
        echo "<script> alert('Erro ao cadastrar')</script>";
    }

};

?>
<!-- Página Home -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h3>Bem-Vindo! <?php echo $_SESSION["usuario"]; ?></h3>
    <a href="logout.php"> Sair</a>

    <hr>
    <h4>Cadastro de Novo Usuário.</h4>
    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <?php
        
            if(isset($erro)){
                echo $erro;
            };
        
        ?>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    <hr>
    <?php
    // Inclusão do arquivo que exibe a tabela de usuários cadastrados
    include("components/table.php")

    ?>
    


</body>
</html>