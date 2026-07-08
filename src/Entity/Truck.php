<?php

namespace App\Entity;

use App\Repository\TruckRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TruckRepository::class)]
class Truck
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $truckPlate = null;

    #[ORM\Column(length: 30)]
    private ?string $truckNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTruckPlate(): ?string
    {
        return $this->truckPlate;
    }

    public function setTruckPlate(string $truckPlate): static
    {
        $this->truckPlate = $truckPlate;

        return $this;
    }

    public function getTruckNumber(): ?string
    {
        return $this->truckNumber;
    }

    public function setTruckNumber(string $truckNumber): static
    {
        $this->truckNumber = $truckNumber;

        return $this;
    }
}
