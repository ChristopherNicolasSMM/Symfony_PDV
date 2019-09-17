<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa implements \JsonSerializable
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
    private $cnpj;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $inscricaoEstadual;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $inscricaoMunicipal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $razaoSocial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomeFantasia;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fusoHorario;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ajustarFusoHorario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="binary", nullable=true)
     */
    private $logoMarca;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): self
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getInscricaoEstadual(): ?string
    {
        return $this->inscricaoEstadual;
    }

    public function setInscricaoEstadual(string $inscricaoEstadual): self
    {
        $this->inscricaoEstadual = $inscricaoEstadual;

        return $this;
    }

    public function getInscricaoMunicipal(): ?string
    {
        return $this->inscricaoMunicipal;
    }

    public function setInscricaoMunicipal(?string $inscricaoMunicipal): self
    {
        $this->inscricaoMunicipal = $inscricaoMunicipal;

        return $this;
    }

    public function getRazaoSocial(): ?string
    {
        return $this->razaoSocial;
    }

    public function setRazaoSocial(string $razaoSocial): self
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    public function getNomeFantasia(): ?string
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia(string $nomeFantasia): self
    {
        $this->nomeFantasia = $nomeFantasia;

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

    public function getFusoHorario(): ?string
    {
        return $this->fusoHorario;
    }

    public function setFusoHorario(?string $fusoHorario): self
    {
        $this->fusoHorario = $fusoHorario;

        return $this;
    }

    public function getAjustarFusoHorario(): ?bool
    {
        return $this->ajustarFusoHorario;
    }

    public function setAjustarFusoHorario(bool $ajustarFusoHorario): self
    {
        $this->ajustarFusoHorario = $ajustarFusoHorario;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLogoMarca()
    {
        return $this->logoMarca;
    }

    public function setLogoMarca($logoMarca): self
    {
        $this->logoMarca = $logoMarca;

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
            "CNPJ" => $this->getCnpj() ,
            "IE" => $this->getInscricaoEstadual() ,
            "IM" => $this->getInscricaoMunicipal() ,
            "status" => $this->getStatus() ,
            "razao" => $this->getRazaoSocial() ,
            "nomeFantasia" => $this->getNomeFantasia() ,
            "email" => $this->getEmail() ,
            "logo" => $this->getLogoMarca() ,
            "fuso" => $this->getFusoHorario() ,
            "ajustarFuso" => $this->getAjustarFusoHorario()
        ];
    }
}
