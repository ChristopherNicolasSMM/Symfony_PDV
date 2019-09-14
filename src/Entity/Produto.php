<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProdutoRepository")
 */
class Produto implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ean;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descricao;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tipoItem;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Unidade")
     * @ORM\JoinColumn(nullable=false)
     */
    private $unidade;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="produtos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SubCategoria", inversedBy="produtos")
     */
    private $subCategoria;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marca", inversedBy="produtos")
     */
    private $marca;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modelo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tags;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codBalanca;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codInterno;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $precoCusto;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $precoVarejo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $precoAtacado;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qntAtacado;

    /**
     * @ORM\Column(type="boolean")
     */
    private $movEstoque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tipEstoque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tipoProduto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ncm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $origem;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cest;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $categoriaPDV;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rotuloPDV;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tagsPDV;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Composicao", mappedBy="produto")
     */
    private $composicao;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fragmentacao", mappedBy="produto")
     */
    private $fragmentacao;

    public function __construct()
    {
        $this->composicao = new ArrayCollection();
        $this->fragmentacao = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(?string $ean): self
    {
        $this->ean = $ean;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getTipoItem(): ?string
    {
        return $this->tipoItem;
    }

    public function setTipoItem(?string $tipoItem): self
    {
        $this->tipoItem = $tipoItem;

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

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getSubCategoria(): ?SubCategoria
    {
        return $this->subCategoria;
    }

    public function setSubCategoria(?SubCategoria $subCategoria): self
    {
        $this->subCategoria = $subCategoria;

        return $this;
    }

    public function getMarca(): ?Marca
    {
        return $this->marca;
    }

    public function setMarca(?Marca $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(?string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(?string $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getCodBalanca(): ?int
    {
        return $this->codBalanca;
    }

    public function setCodBalanca(?int $codBalanca): self
    {
        $this->codBalanca = $codBalanca;

        return $this;
    }

    public function getCodInterno(): ?string
    {
        return $this->codInterno;
    }

    public function setCodInterno(?string $codInterno): self
    {
        $this->codInterno = $codInterno;

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

    public function getPrecoCusto(): ?float
    {
        return $this->precoCusto;
    }

    public function setPrecoCusto(?float $precoCusto): self
    {
        $this->precoCusto = $precoCusto;

        return $this;
    }

    public function getPrecoVarejo(): ?float
    {
        return $this->precoVarejo;
    }

    public function setPrecoVarejo(?float $precoVarejo): self
    {
        $this->precoVarejo = $precoVarejo;

        return $this;
    }

    public function getPrecoAtacado(): ?float
    {
        return $this->precoAtacado;
    }

    public function setPrecoAtacado(?float $precoAtacado): self
    {
        $this->precoAtacado = $precoAtacado;

        return $this;
    }

    public function getQntAtacado(): ?int
    {
        return $this->qntAtacado;
    }

    public function setQntAtacado(?int $qntAtacado): self
    {
        $this->qntAtacado = $qntAtacado;

        return $this;
    }

    public function getMovEstoque(): ?bool
    {
        return $this->movEstoque;
    }

    public function setMovEstoque(bool $movEstoque): self
    {
        $this->movEstoque = $movEstoque;

        return $this;
    }

    public function getTipEstoque(): ?string
    {
        return $this->tipEstoque;
    }

    public function setTipEstoque(?string $tipEstoque): self
    {
        $this->tipEstoque = $tipEstoque;

        return $this;
    }

    public function getTipoProduto(): ?string
    {
        return $this->tipoProduto;
    }

    public function setTipoProduto(?string $tipoProduto): self
    {
        $this->tipoProduto = $tipoProduto;

        return $this;
    }

    public function getNcm(): ?string
    {
        return $this->ncm;
    }

    public function setNcm(?string $ncm): self
    {
        $this->ncm = $ncm;

        return $this;
    }

    public function getOrigem(): ?string
    {
        return $this->origem;
    }

    public function setOrigem(?string $origem): self
    {
        $this->origem = $origem;

        return $this;
    }

    public function getCest(): ?string
    {
        return $this->cest;
    }

    public function setCest(?string $cest): self
    {
        $this->cest = $cest;

        return $this;
    }

    public function getCategoriaPDV(): ?string
    {
        return $this->categoriaPDV;
    }

    public function setCategoriaPDV(?string $categoriaPDV): self
    {
        $this->categoriaPDV = $categoriaPDV;

        return $this;
    }

    public function getRotuloPDV(): ?string
    {
        return $this->rotuloPDV;
    }

    public function setRotuloPDV(?string $rotuloPDV): self
    {
        $this->rotuloPDV = $rotuloPDV;

        return $this;
    }

    public function getTagsPDV(): ?string
    {
        return $this->tagsPDV;
    }

    public function setTagsPDV(?string $tagsPDV): self
    {
        $this->tagsPDV = $tagsPDV;

        return $this;
    }

    /**
     * @return Collection|Composicao[]
     */
    public function getComposicao(): Collection
    {
        return $this->composicao;
    }

    public function addComposicao(Composicao $composicao): self
    {
        if (!$this->composicao->contains($composicao)) {
            $this->composicao[] = $composicao;
            $composicao->setProduto($this);
        }

        return $this;
    }

    public function removeComposicao(Composicao $composicao): self
    {
        if ($this->composicao->contains($composicao)) {
            $this->composicao->removeElement($composicao);
            // set the owning side to null (unless already changed)
            if ($composicao->getProduto() === $this) {
                $composicao->setProduto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Fragmentacao[]
     */
    public function getFragmentacao(): Collection
    {
        return $this->fragmentacao;
    }

    public function addFragmentacao(Fragmentacao $fragmentacao): self
    {
        if (!$this->fragmentacao->contains($fragmentacao)) {
            $this->fragmentacao[] = $fragmentacao;
            $fragmentacao->setProduto($this);
        }

        return $this;
    }

    public function removeFragmentacao(Fragmentacao $fragmentacao): self
    {
        if ($this->fragmentacao->contains($fragmentacao)) {
            $this->fragmentacao->removeElement($fragmentacao);
            // set the owning side to null (unless already changed)
            if ($fragmentacao->getProduto() === $this) {
                $fragmentacao->setProduto(null);
            }
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
            'id'    => $this->getId(),
            'unidade_id' => $this->getUnidade(),
            'categoria_id' => $this->getCategoria(),
            'sub_categoria_id' => $this->getSubCategoria(),
            'marca_id' => $this->getMarca(),
            'ean' => $this->getEan(),
            'descricao' => $this->getDescricao(),
            'tipo_item' => $this->getTipoItem(),
            'modelo' => $this->getModelo(),
            'tags' => $this->getTags(),
            'cod_balanca' => $this->getCodBalanca(),
            'cod_interno' => $this->getCodInterno(),
            'status' => $this->getStatus(),
            'preco_custo' => $this->getPrecoCusto(),
            'preco_varejo' => $this->getPrecoAtacado(),
            'preco_atacado' => $this->getPrecoVarejo(),
            'qnt_atacado' => $this->getQntAtacado(),
            'mov_estoque' => $this->getMovEstoque(),
            'tip_estoque' => $this->getTipEstoque(),
            'tipo_produto' => $this->getTipoProduto(),
            'ncm' => $this->getNcm(),
            'origem' => $this->getOrigem(),
            'cest' => $this->getCest(),
            'categoria_pdv' => $this->getCategoriaPDV(),
            'rotulo_pdv' => $this->getRotuloPDV(),
            'tags_pdv' => $this->getTagsPDV()
        ];



    }
}
