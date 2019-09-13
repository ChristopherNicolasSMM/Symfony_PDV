<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriaRepository")
 */
class Categoria
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
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produto", mappedBy="categoria")
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

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

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
            $produto->setCategoria($this);
        }

        return $this;
    }

    public function removeProduto(Produto $produto): self
    {
        if ($this->produtos->contains($produto)) {
            $this->produtos->removeElement($produto);
            // set the owning side to null (unless already changed)
            if ($produto->getCategoria() === $this) {
                $produto->setCategoria(null);
            }
        }

        return $this;
    }
}
