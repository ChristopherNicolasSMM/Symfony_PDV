<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarcaRepository")
 */
class Teste
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public  $id;
    /**
     * @ORM\Column(type="string")
     */
    public $nome;
    /**
     * @ORM\Column(type="string")
     */
    public $crm;
}