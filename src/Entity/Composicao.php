<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComposicaoRepository")
 */
class Composicao
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sub_item;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantidade;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Unidade")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unidade;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $custo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $custoTotal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produto", inversedBy="composicao")
     */
    private $produto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubItem(): ?string
    {
        return $this->sub_item;
    }

    public function setSubItem(string $sub_item): self
    {
        $this->sub_item = $sub_item;

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

    public function getUnidade(): ?Unidade
    {
        return $this->unidade;
    }

    public function setUnidade(?Unidade $unidade): self
    {
        $this->unidade = $unidade;

        return $this;
    }

    public function getCusto(): ?float
    {
        return $this->custo;
    }

    public function setCusto(?float $custo): self
    {
        $this->custo = $custo;

        return $this;
    }

    public function getCustoTotal(): ?float
    {
        return $this->custoTotal;
    }

    public function setCustoTotal(?float $custoTotal): self
    {
        $this->custoTotal = $custoTotal;

        return $this;
    }

    public function getProduto(): ?Produto
    {
        return $this->produto;
    }

    public function setProduto(?Produto $produto): self
    {
        $this->produto = $produto;

        return $this;
    }
}
