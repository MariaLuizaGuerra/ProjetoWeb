<?php
    require_once __DIR__ . '/src/conexao-bd.php';

    $email = 'admin@exemplo.com';
    $senha = 'MinhaSenhaSegura';

    $stmt = $pdo->prepare('INSERT INTO usuarios (email, senha) VALUES (?, ?)');
    $stmt->execute([$email, password_hash($senha, PASSWORD_DEFAULT)]);
    echo "Usuário inserido: {$email}\n";



?>