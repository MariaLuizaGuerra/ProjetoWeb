<?php
    require_once __DIR__ . '/src/conexao_banco.php';
    require_once __DIR__ . '/src/Repositorio/RepositorioProduto.php';
    require_once __DIR__ . '/src/Modelo/Produto.php';


    $repo = new RepositorioProduto($pdo);
 
    if($repo-> buscarPorNome($nome))
    {
        echo "Produto encontrado! {$nome}\n";
        exit;
    }

    $repo->salvar(new Produto(0, $nome, $tamanho, $tipo));
    

    echo "Produto criado: {$nome}\n";



?>