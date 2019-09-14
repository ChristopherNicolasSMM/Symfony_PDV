<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnidadeRepository")
 */
class Unidade implements \JsonSerializable

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
            'unidadeAbv' => $this->getUnidadeAbv()
        ];
    }
}
