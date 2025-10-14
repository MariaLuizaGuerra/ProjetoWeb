<?php
session_start();

$usuarioLogado = $_SESSION['email'] ?? null;
$erro = $_GET['erro'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">

    <title>reVeste - Login</title>
</head>

<body>
    <main>
        <?php if ($usuarioLogado): ?>
            <section class="container-topo">
                <div class="topo-direita">
                    <p>Você já está logado como <strong><?= htmlspecialchars($usuarioLogado) ?></strong></p>
                    <form action="logout.php" method="post">
                        <button type="submit" class="botao-sair">Sair</button>
                    </form>
                </div>
                <div class="conteudo">
                    <a href="admin.php" class="link-adm">Ir para o painel do brechó</a>
                </div>
            </section>

        <?php else: ?>

            <section class="container-login">
            
                <h1 class="titulo-login">Login reVeste</h1>

                <?php if ($erro === 'credenciais'): ?>
                    <p class="mensagem-erro">Usuário ou senha incorretos.</p>
                <?php elseif ($erro === 'campos'): ?>
                    <p class="mensagem-erro">Preencha e-mail e senha.</p>
                <?php endif; ?>

                <form action="verifica_login.php" method="post" class="form-login">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Digite o seu e-mail" required>

                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite a sua senha" required>

                    <input type="submit" class="botao-entrar" value="Entrar">
                </form>
            </section>

        <?php endif; ?>
    </main>

    <script>
        window.addEventListener('DOMContentLoaded', function(){
            var msg = document.querySelector('.mensagem-erro');
            if(msg){
                setTimeout(function(){
                    msg.classList.add('oculto');
                }, 4000);
            }
        });
    </script>
</body>

</html>