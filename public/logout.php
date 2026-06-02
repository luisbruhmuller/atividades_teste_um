<?php
    // Logout do usuário, destruindo a sessão e redirecionando para a página de login.
    session_start();
    session_destroy();
    header("Location: ../index.php");
    exit();

?>