<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SinisterRepository")
 * @apiResource()
 */
class Sinister
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfSinister;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $damageEstimation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicle", inversedBy="sinisters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateOfSinister(): ?\DateTimeInterface
    {
        return $this->dateOfSinister;
    }

    public function setDateOfSinister(\DateTimeInterface $dateOfSinister): self
    {
        $this->dateOfSinister = $dateOfSinister;

        return $this;
    }

    public function getDamageEstimation(): ?float
    {
        return $this->damageEstimation;
    }

    public function setDamageEstimation(?float $damageEstimation): self
    {
        $this->damageEstimation = $damageEstimation;

        return $this;
    }

    public function getVehicle(): ?Vehicle
    {
        return $this->vehicle;
    }

    public function setVehicle(?Vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }
}
