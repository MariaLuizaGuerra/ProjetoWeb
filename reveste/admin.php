<?php
session_start();

// Impede acesso sem login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$emailLogado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel - reVeste</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <main>
        <section class="painel">
            <h1>Bem-vinda ao Painel do Brechó reVeste</h1>
            <p>Login realizado com sucesso, <strong><?= htmlspecialchars($emailLogado) ?></strong>!</p>
            <a href="logout.php" class="botao-sair">Sair</a>
        </section>
    </main>
</body>
</html>
