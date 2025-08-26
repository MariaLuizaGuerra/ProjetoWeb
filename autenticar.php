<?php
session_start();

//Simular usuario e senha
$usuarioValido = 'admin@exemplo.com';
$senhaValida = '1234';

//Permitir somente POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

//Campos obrigatórios
if ($email === '' || $senha === '') {
    header('Location: login.php?erro=campos');
    exit;
}

//Credenciais corretas
if ($email === $usuarioValido && $senha === $senhaValida) {
    echo "Credenciais estão corretas!";
    exit;
}

//Falha nas credenciais
header('Location: login.php?erro=credenciais');
exit;
