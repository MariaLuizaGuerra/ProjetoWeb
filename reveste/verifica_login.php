<?php
session_start();

// Captura os dados do formulário
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Credenciais corretas
$email_correto = "reveste@gmail.com";
$senha_correta = "anabel";

// Verifica login
if ($email === $email_correto && $senha === $senha_correta) {
    $_SESSION['usuario'] = $email; // Mantendo igual ao login.php
    header("Location: admin.php");
    exit;
} else {
    header("Location: login.php?erro=credenciais");
    exit;
}
?>
