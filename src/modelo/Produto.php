<?php
    class Produto
    {
        private int $id;
        private string $nome;
        private int $tamanho;
        private string $descricao;
        private string $tipo;
        private double $preco;
        private exif_imagetype $fotoProduto;
        private string $condicao;

        public function __construct(int $id, string $email, string $senha){
            $this->id = $id;
            $this->nome = $nome;
            $this->tamanho = $tamanho;
            $this->descricao = $descricao;
            $this->tipo = $tipo;
            $this->preco = $preco;
            $this->fotoProduto = $fotoProduto;
            $this->condicao = $condicao;

        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getnome(): string
        {
            return $this->nome;
        }

        public function gettamanho(): int
        {
            return $this->tamanho;
        }
        public function getdescricao(): String
        {
            return $this->descricao;
        }
        public function gettipo(): String
        {
            return $this->tipo;
        }
         public function getpreco(): double
        {
            return $this->preco;
        }
         public function getfotoProduto():exif_imagetype 
        {
            return $this->fotoProduto;
        }
         public function condicao(): string 
        {
            return $this->condicao;
        }
    }
?>