<?php

namespace App\Entity;

use App\Repository\PathRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PathRepository::class)]
class Path
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    #[ORM\Column]
    private ?\DateTime $startingDate = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $endDate = null;

    #[ORM\Column(nullable: true)]
    private ?float $dischargePrice = null;

    #[ORM\Column(nullable: true)]
    private ?float $waitingPrice = null;

    #[ORM\ManyToOne(inversedBy: 'paths')]
    private ?Truck $truck = null;

    #[ORM\ManyToOne(inversedBy: 'paths')]
    private ?Driver $driver = null;

    #[ORM\ManyToOne(inversedBy: 'paths')]
    private ?Trailer $trailer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getStartingDate(): ?\DateTime
    {
        return $this->startingDate;
    }

    public function setStartingDate(\DateTime $startingDate): static
    {
        $this->startingDate = $startingDate;

        return $this;
    }

    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTime $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDischargePrice(): ?float
    {
        return $this->dischargePrice;
    }

    public function setDischargePrice(?float $dischargePrice): static
    {
        $this->dischargePrice = $dischargePrice;

        return $this;
    }

    public function getWaitingPrice(): ?float
    {
        return $this->waitingPrice;
    }

    public function setWaitingPrice(?float $waitingPrice): static
    {
        $this->waitingPrice = $waitingPrice;

        return $this;
    }

    public function getTruck(): ?Truck
    {
        return $this->truck;
    }

    public function setTruck(?Truck $truck): static
    {
        $this->truck = $truck;

        return $this;
    }

    public function getDriver(): ?Driver
    {
        return $this->driver;
    }

    public function setDriver(?Driver $driver): static
    {
        $this->driver = $driver;

        return $this;
    }

    public function getTrailer(): ?Trailer
    {
        return $this->trailer;
    }

    public function setTrailer(?Trailer $trailer): static
    {
        $this->trailer = $trailer;

        return $this;
    }
}
