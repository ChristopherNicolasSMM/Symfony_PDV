<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubCategoriaRepository")
 */
class SubCategoria
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subCategoria;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produto", mappedBy="subCategoria")
     */
    private $produtos;

    public function __construct()
    {
        $this->produtos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubCategoria(): ?string
    {
        return $this->subCategoria;
    }

    public function setSubCategoria(string $subCategoria): self
    {
        $this->subCategoria = $subCategoria;

        return $this;
    }

    /**
     * @return Collection|Produto[]
     */
    public function getProdutos(): Collection
    {
        return $this->produtos;
    }

    public function addProduto(Produto $produto): self
    {
        if (!$this->produtos->contains($produto)) {
            $this->produtos[] = $produto;
            $produto->setSubCategoria($this);
        }

        return $this;
    }

    public function removeProduto(Produto $produto): self
    {
        if ($this->produtos->contains($produto)) {
            $this->produtos->removeElement($produto);
            // set the owning side to null (unless already changed)
            if ($produto->getSubCategoria() === $this) {
                $produto->setSubCategoria(null);
            }
        }

        return $this;
    }
}
