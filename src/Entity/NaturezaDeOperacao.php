<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NaturezaDeOperacaoRepository")
 */
class NaturezaDeOperacao implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $abreviacaoCod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $tipo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dentroDoEstado;

    /**
     * @ORM\Column(type="boolean")
     */
    private $propria;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CFOP", mappedBy="naturezaDeOperacao")
     */
    private $CFOP;

    public function __construct()
    {
        $this->CFOP = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbreviacaoCod(): ?string
    {
        return $this->abreviacaoCod;
    }

    public function setAbreviacaoCod(string $abreviacaoCod): self
    {
        $this->abreviacaoCod = $abreviacaoCod;

        return $this;
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

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

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

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDentroDoEstado(): ?bool
    {
        return $this->dentroDoEstado;
    }

    public function setDentroDoEstado(bool $dentroDoEstado): self
    {
        $this->dentroDoEstado = $dentroDoEstado;

        return $this;
    }

    public function getPropria(): ?bool
    {
        return $this->propria;
    }

    public function setPropria(bool $propria): self
    {
        $this->propria = $propria;

        return $this;
    }

    /**
     * @return Collection|CFOP[]
     */
    public function getCFOP(): Collection
    {
        return $this->CFOP;
    }

    public function addCFOP(CFOP $cFOP): self
    {
        if (!$this->CFOP->contains($cFOP)) {
            $this->CFOP[] = $cFOP;
            $cFOP->setNaturezaDeOperacao($this);
        }

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
            'nome' => $this->getNome(),
            'tipo' => $this->getTipo(),
            'descricao' => $this->getDescricao(),
            'propria' => $this->getPropria(),
            'abreviacaoCod' => $this->getAbreviacaoCod(),
            'CFOP' => $this->getCFOP(),
            'dentroDoEstado' => $this->getDentroDoEstado(),
            'status' => $this->getStatus()
        ];
    }
}
