<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehicleAssignementRepository")
 * @apiResource()
 */
class VehicleAssignement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfassigning;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfRevoking;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicle", inversedBy="vehicleAssignements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Driver", inversedBy="vehicleAssignements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $driver;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $observation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOfassigning(): ?\DateTimeInterface
    {
        return $this->dateOfassigning;
    }

    public function setDateOfassigning(\DateTimeInterface $dateOfassigning): self
    {
        $this->dateOfassigning = $dateOfassigning;

        return $this;
    }

    public function getDateOfRevoking(): ?\DateTimeInterface
    {
        return $this->dateOfRevoking;
    }

    public function setDateOfRevoking(?\DateTimeInterface $dateOfRevoking): self
    {
        $this->dateOfRevoking = $dateOfRevoking;

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

    public function getDriver(): ?Driver
    {
        return $this->driver;
    }

    public function setDriver(?Driver $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }
}
