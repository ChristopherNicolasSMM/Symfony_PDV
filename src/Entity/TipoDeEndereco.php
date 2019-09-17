<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoDeEnderecoRepository")
 */
class TipoDeEndereco implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipoDeEndereco;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Endereco", mappedBy="tipoDeEndereco")
     */
    private $enderecos;

    public function __construct()
    {
        $this->enderecos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoDeEndereco(): ?string
    {
        return $this->tipoDeEndereco;
    }

    public function setTipoDeEndereco(string $tipoDeEndereco): self
    {
        $this->tipoDeEndereco = $tipoDeEndereco;

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
            "id" => $this->getId(),
            "tipoDeEndereco" => $this->getTipoDeEndereco()
        ];
    }

    /**
     * @return Collection|Endereco[]
     */
    public function getEnderecos(): Collection
    {
        return $this->enderecos;
    }

    public function addEndereco(Endereco $endereco): self
    {
        if (!$this->enderecos->contains($endereco)) {
            $this->enderecos[] = $endereco;
            $endereco->setTipoDeEndereco($this);
        }

        return $this;
    }

    public function removeEndereco(Endereco $endereco): self
    {
        if ($this->enderecos->contains($endereco)) {
            $this->enderecos->removeElement($endereco);
            // set the owning side to null (unless already changed)
            if ($endereco->getTipoDeEndereco() === $this) {
                $endereco->setTipoDeEndereco(null);
            }
        }

        return $this;
    }
}
