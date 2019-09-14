<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CFOPRepository")
 */
class CFOP implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cod_cfop;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao;

    /**
     * @ORM\Column(type="boolean")
     */
    private $padao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NaturezaDeOperacao", inversedBy="CFOP")
     * @ORM\JoinColumn(nullable=false)
     */
    private $naturezaDeOperacao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodCfop(): ?string
    {
        return $this->cod_cfop;
    }

    public function setCodCfop(string $cod_cfop): self
    {
        $this->cod_cfop = $cod_cfop;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getPadao(): ?bool
    {
        return $this->padao;
    }

    public function setPadao(bool $padao): self
    {
        $this->padao = $padao;

        return $this;
    }

    public function getNaturezaDeOperacao(): ?NaturezaDeOperacao
    {
        return $this->naturezaDeOperacao;
    }

    public function setNaturezaDeOperacao(?NaturezaDeOperacao $naturezaDeOperacao): self
    {
        $this->naturezaDeOperacao = $naturezaDeOperacao;

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
            'id'    => $this->getId(),
            'descricao' => $this->getDescricao(),
            'CFOP' => $this->getCodCfop(),
            'naturezaDeOperacao' => $this->getNaturezaDeOperacao(),
            'padrao' => $this->getPadao()
        ];
    }
}
