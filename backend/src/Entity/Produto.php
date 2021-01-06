<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProdutoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/** 
 * @ApiResource
 * @ORM\Entity(repositoryClass=ProdutoRepository::class)
 */
class Produto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $tipo;

    /**
     * @ORM\Column(type="float")
     */
    private $peso;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantidade;

    /**
     * @ORM\Column(type="integer")
     */
    private $preco;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getPeso(): ?float
    {
        return $this->peso;
    }

    public function setPeso(float $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    public function getQuantidade(): ?int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getPreco(): ?int
    {
        return $this->preco;
    }

    public function setPreco(int $preco): self
    {
        $this->preco = $preco;

        return $this;
    }
}
