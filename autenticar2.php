<?php
session_start();


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

//Função para validar usuário e senha da interface com o BD
function validarUsuario($email, $senha)
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=granatodb;charset=utf8','root','root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT senha FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        //Verificar se encontrou o usuario e senha corretos
        if($usuario && password_verify($senha, $usuario['senha'])){
            //se validou
            return true;
        }
        //se não validou 
        return false;

    }catch(PDOException $e){
        die("Erro ao acessar o banco de dados: " . $e->getMessage());
    }


}

//Credenciais corretas
if (validarUsuario($email, $senha)) {
    //Regenera a sessão 
    session_regenerate_id(true);
    //Setar a sessão com o email do usuário
    $_SESSION['usuario'] = $email;
    // echo '<pre>';
    // var_dump($_SESSION);
    // echo '</pre>';
    header('Location:admin.php');
    exit;
}

//Falha nas credenciais
header('Location: login.php?erro=credenciais');
exit;
