<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VendaPDVRepository")
 */
class VendaPDV implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Produto")
     */
    private $itens;

    /**
     * @ORM\Column(type="float")
     */
    private $subTotal;

    /**
     * @ORM\Column(type="float")
     */
    private $desconto;

    /**
     * @ORM\Column(type="float")
     */
    private $total;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $formaPagamento;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $troco;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valorPago;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroComprovante;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataOperacao;

    /**
     * @ORM\Column(type="boolean")
     */
    private $impresso;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vendedor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $consumidor;

    public function __construct()
    {
        $this->itens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Produto[]
     */
    public function getItens(): Collection
    {
        return $this->itens;
    }

    public function addIten(Produto $iten): self
    {
        if (!$this->itens->contains($iten)) {
            $this->itens[] = $iten;
        }

        return $this;
    }

    public function removeIten(Produto $iten): self
    {
        if ($this->itens->contains($iten)) {
            $this->itens->removeElement($iten);
        }

        return $this;
    }

    public function getSubTotal(): ?float
    {
        return $this->subTotal;
    }

    public function setSubTotal(float $subTotal): self
    {
        $this->subTotal = $subTotal;

        return $this;
    }

    public function getDesconto(): ?float
    {
        return $this->desconto;
    }

    public function setDesconto(float $desconto): self
    {
        $this->desconto = $desconto;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getFormaPagamento(): ?string
    {
        return $this->formaPagamento;
    }

    public function setFormaPagamento(?string $formaPagamento): self
    {
        $this->formaPagamento = $formaPagamento;

        return $this;
    }

    public function getTroco(): ?float
    {
        return $this->troco;
    }

    public function setTroco(?float $troco): self
    {
        $this->troco = $troco;

        return $this;
    }

    public function getValorPago(): ?float
    {
        return $this->valorPago;
    }

    public function setValorPago(?float $valorPago): self
    {
        $this->valorPago = $valorPago;

        return $this;
    }

    public function getNumeroComprovante(): ?string
    {
        return $this->numeroComprovante;
    }

    public function setNumeroComprovante(string $numeroComprovante): self
    {
        $this->numeroComprovante = $numeroComprovante;

        return $this;
    }

    public function getDataOperacao(): ?\DateTimeInterface
    {
        return $this->dataOperacao;
    }

    public function setDataOperacao(\DateTimeInterface $dataOperacao): self
    {
        $this->dataOperacao = $dataOperacao;

        return $this;
    }

    public function getImpresso(): ?bool
    {
        return $this->impresso;
    }

    public function setImpresso(bool $impresso): self
    {
        $this->impresso = $impresso;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getVendedor(): ?string
    {
        return $this->vendedor;
    }

    public function setVendedor(?string $vendedor): self
    {
        $this->vendedor = $vendedor;

        return $this;
    }

    public function getConsumidor(): ?string
    {
        return $this->consumidor;
    }

    public function setConsumidor(?string $consumidor): self
    {
        $this->consumidor = $consumidor;

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
           "id" => $this->getId() ,
           "status" => $this->getStatus() ,
           "consumidor" => $this->getConsumidor() ,
           "vendedor" => $this->getVendedor() ,
           "dataOperacao" => $this->getDataOperacao() ,
           "impresso" => $this->getImpresso() ,
           "numeroComprovante" => $this->getNumeroComprovante() ,
           "itens" => $this->getItens() ,
           "subTotal" => $this->getSubTotal() ,
           "desconto" => $this->getDesconto() ,
           "total" => $this->getTotal() ,
           "formaPagamento" => $this->getFormaPagamento() ,
           "troco" => $this->getTroco()
       ];
    }
}
