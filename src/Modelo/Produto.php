<?php
class Produto
{
    private ?int $id;
    private string $tipo;
    private string $nome;
    private string $descricao;

    private ?string $imagem;
    private float $preco;

    public function __construct(?int $id, string $tipo, string $nome, string $descricao,  float $preco,  ?string $imagem = null)
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        // Se não informar imagem, usa imagem padrão
        $this->imagem = $imagem ?? 'logo-granato.png';
        $this->preco = $preco;
    }

    // O método getId() deve retornar o ID, que pode ser nulo
    public function getId(): ?int
    {
        return $this->id;
    }


    public function setImagem(?string $imagem): void
    {
        $this->imagem = $imagem;
    }



    public function getTipo(): string
    {
        return $this->tipo;
    }


    public function getNome(): string
    {
        return $this->nome;
    }


    public function getDescricao(): string
    {
        return $this->descricao;
    }



    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function getImagemDiretorio(): string
    {
        // procura primeiro na pasta uploads (onde salvar.php grava)
        $uploadsPath = __DIR__ . '/../../uploads/';
        if ($this->imagem && file_exists($uploadsPath . $this->imagem)) {
            return 'uploads/' . $this->imagem;
        }

        // caso falhe, usa imagem padrão na pasta img/
        return 'img/' . ($this->imagem ?? 'logo-granato.png');
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getPrecoFormatado(): string
    {
        return "R$ " . number_format($this->preco, 2);
    }
}
