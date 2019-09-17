<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnderecoRepository")
 */
class Endereco implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoDeEndereco", inversedBy="enderecos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipoDeEndereco;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cep;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logradouro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $complemento;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bairro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cidade;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $uf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pais;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoDeEndereco(): ?TipoDeEndereco
    {
        return $this->tipoDeEndereco;
    }

    public function setTipoDeEndereco(?TipoDeEndereco $tipoDeEndereco): self
    {
        $this->tipoDeEndereco = $tipoDeEndereco;

        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(string $cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): self
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(string $complemento): self
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(string $uf): self
    {
        $this->uf = $uf;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(string $pais): self
    {
        $this->pais = $pais;

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
            "tipoDeEndereco" => $this->getTipoDeEndereco(),
            "CEP" => $this->getCep(),
            "logradouro" => $this->getLogradouro(),
            "numero" => $this->getNumero(),
            "complemento" => $this->getComplemento(),
            "bairro" => $this->getBairro(),
            "cidade" => $this->getCidade(),
            "UF" => $this->getUf(),
            "pais" => $this->getPais()
        ];
    }
}
