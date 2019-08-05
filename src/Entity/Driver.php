<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DriverRepository")
 */
class Driver
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $licenseNumber;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VehicleAssignement", mappedBy="driver")
     */
    private $vehicleAssignements;

    public function __construct()
    {
        $this->vehicleAssignements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLicenseNumber(): ?string
    {
        return $this->licenseNumber;
    }

    public function setLicenseNumber(string $licenseNumber): self
    {
        $this->licenseNumber = $licenseNumber;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|VehicleAssignement[]
     */
    public function getVehicleAssignements(): Collection
    {
        return $this->vehicleAssignements;
    }

    public function addVehicleAssignement(VehicleAssignement $vehicleAssignement): self
    {
        if (!$this->vehicleAssignements->contains($vehicleAssignement)) {
            $this->vehicleAssignements[] = $vehicleAssignement;
            $vehicleAssignement->setDriver($this);
        }

        return $this;
    }

    public function removeVehicleAssignement(VehicleAssignement $vehicleAssignement): self
    {
        if ($this->vehicleAssignements->contains($vehicleAssignement)) {
            $this->vehicleAssignements->removeElement($vehicleAssignement);
            // set the owning side to null (unless already changed)
            if ($vehicleAssignement->getDriver() === $this) {
                $vehicleAssignement->setDriver(null);
            }
        }

        return $this;
    }
}
