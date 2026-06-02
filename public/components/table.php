<h4>Usuários Cadastrados</h4>
<!-- Tabela de usuários cadastrados -->
<table border="1" cellpadding="3">

    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Senha</th>
    </tr>

    <?php
    // Consulta para selecionar todos os usuários cadastrados no banco de dados
    $sqlTodosUsuarios = "SELECT * FROM usuarios";

    $resultadoTodosUsuarios = $conn->query($sqlTodosUsuarios);

    while($linha = $resultadoTodosUsuarios->fetch_assoc()){

// Exibição de cada usuário em uma linha da tabela
        echo "  <tr>
                    <td>". $linha['id'] . "</td>
                    <td>". $linha['usuario'] . "</td>
                    <td>". $linha['senha'] . "</td>
                </tr>
        ";

    }
    
    ?>

    


</table>