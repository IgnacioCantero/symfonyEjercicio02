<?php

namespace App\Entity;

use App\Repository\CitasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CitasRepository::class)
 */
class Citas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaHora;

    /**
     * @ORM\ManyToOne(targetEntity=Clientes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity=Servicios::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $servicio;

    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaHora(): ?\DateTimeInterface
    {
        return $this->fechaHora;
    }

    public function setFechaHora(\DateTimeInterface $fechaHora): self
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    public function getCliente(): ?Clientes
    {
        return $this->cliente;
    }

    public function setCliente(?Clientes $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getServicio(): ?Servicios
    {
        return $this->servicio;
    }

    public function setServicio(?Servicios $servicio): self
    {
        $this->servicio = $servicio;

        return $this;
    }
}
