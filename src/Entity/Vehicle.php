<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehicleRepository")
 */
class Vehicle
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
    private $make;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfCirculation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOfAcquisition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $immatriculationNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $greyCardNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sinister", mappedBy="vehicle")
     */
    private $sinisters;

    /**
     * @ORM\Column(type="boolean")
     */
    private $availability;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VehicleCheckout", mappedBy="vehicle")
     */
    private $vehicleCheckouts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VehicleAssignement", mappedBy="vehicle")
     */
    private $vehicleAssignements;

    public function __construct()
    {
        $this->sinisters = new ArrayCollection();
        $this->vehicleCheckouts = new ArrayCollection();
        $this->vehicleAssignements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(string $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getDateOfCirculation(): ?\DateTimeInterface
    {
        return $this->dateOfCirculation;
    }

    public function setDateOfCirculation(\DateTimeInterface $dateOfCirculation): self
    {
        $this->dateOfCirculation = $dateOfCirculation;

        return $this;
    }

    public function getDateOfAcquisition(): ?\DateTimeInterface
    {
        return $this->dateOfAcquisition;
    }

    public function setDateOfAcquisition(\DateTimeInterface $dateOfAcquisition): self
    {
        $this->dateOfAcquisition = $dateOfAcquisition;

        return $this;
    }

    public function getImmatriculationNumber(): ?string
    {
        return $this->immatriculationNumber;
    }

    public function setImmatriculationNumber(string $immatriculationNumber): self
    {
        $this->immatriculationNumber = $immatriculationNumber;

        return $this;
    }

    public function getGreyCardNumber(): ?string
    {
        return $this->greyCardNumber;
    }

    public function setGreyCardNumber(string $greyCardNumber): self
    {
        $this->greyCardNumber = $greyCardNumber;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Sinister[]
     */
    public function getSinisters(): Collection
    {
        return $this->sinisters;
    }

    public function addSinister(Sinister $sinister): self
    {
        if (!$this->sinisters->contains($sinister)) {
            $this->sinisters[] = $sinister;
            $sinister->setVehicle($this);
        }

        return $this;
    }

    public function removeSinister(Sinister $sinister): self
    {
        if ($this->sinisters->contains($sinister)) {
            $this->sinisters->removeElement($sinister);
            // set the owning side to null (unless already changed)
            if ($sinister->getVehicle() === $this) {
                $sinister->setVehicle(null);
            }
        }

        return $this;
    }

    public function getAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * @return Collection|VehicleCheckout[]
     */
    public function getVehicleCheckouts(): Collection
    {
        return $this->vehicleCheckouts;
    }

    public function addVehicleCheckout(VehicleCheckout $vehicleCheckout): self
    {
        if (!$this->vehicleCheckouts->contains($vehicleCheckout)) {
            $this->vehicleCheckouts[] = $vehicleCheckout;
            $vehicleCheckout->setVehicle($this);
        }

        return $this;
    }

    public function removeVehicleCheckout(VehicleCheckout $vehicleCheckout): self
    {
        if ($this->vehicleCheckouts->contains($vehicleCheckout)) {
            $this->vehicleCheckouts->removeElement($vehicleCheckout);
            // set the owning side to null (unless already changed)
            if ($vehicleCheckout->getVehicle() === $this) {
                $vehicleCheckout->setVehicle(null);
            }
        }

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
            $vehicleAssignement->setVehicle($this);
        }

        return $this;
    }

    public function removeVehicleAssignement(VehicleAssignement $vehicleAssignement): self
    {
        if ($this->vehicleAssignements->contains($vehicleAssignement)) {
            $this->vehicleAssignements->removeElement($vehicleAssignement);
            // set the owning side to null (unless already changed)
            if ($vehicleAssignement->getVehicle() === $this) {
                $vehicleAssignement->setVehicle(null);
            }
        }

        return $this;
    }
}
