<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnidadeRepository")
 */
class Unidade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $unidade_abv;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $descricao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnidadeAbv(): ?string
    {
        return $this->unidade_abv;
    }

    public function setUnidadeAbv(string $unidade_abv): self
    {
        $this->unidade_abv = $unidade_abv;

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
}
