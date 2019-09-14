<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FragmentacaoRepository")
 */
class Fragmentacao implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantidade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $unidade;

    /**
     * @ORM\Column(type="float")
     */
    private $preco_parcial;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produto", inversedBy="fragmentacao")
     */
    private $produto;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUnidade(): ?string
    {
        return $this->unidade;
    }

    public function setUnidade(string $unidade): self
    {
        $this->unidade = $unidade;

        return $this;
    }

    public function getPrecoParcial(): ?float
    {
        return $this->preco_parcial;
    }

    public function setPrecoParcial(float $preco_parcial): self
    {
        $this->preco_parcial = $preco_parcial;

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

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'id'        => $this->getId(),
            'produto' => $this->getProduto(),
            'unidade' => $this->getUnidade(),
            'quantidade' => $this->getQuantidade(),
            'precoParcial' => $this->getPrecoParcial()
        ];
    }
}
