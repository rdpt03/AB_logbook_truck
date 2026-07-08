<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DriverRepository::class)]
class Driver
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $LastName = null;

    #[ORM\Column]
    private ?int $driverNum = null;

    /**
     * @var Collection<int, Path>
     */
    #[ORM\OneToMany(targetEntity: Path::class, mappedBy: 'driver')]
    private Collection $paths;

    #[ORM\OneToOne(inversedBy: 'driver', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->paths = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): static
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getDriverNum(): ?int
    {
        return $this->driverNum;
    }

    public function setDriverNum(int $driverNum): static
    {
        $this->driverNum = $driverNum;

        return $this;
    }

    /**
     * @return Collection<int, Path>
     */
    public function getPaths(): Collection
    {
        return $this->paths;
    }

    public function addPath(Path $path): static
    {
        if (!$this->paths->contains($path)) {
            $this->paths->add($path);
            $path->setDriver($this);
        }

        return $this;
    }

    public function removePath(Path $path): static
    {
        if ($this->paths->removeElement($path)) {
            // set the owning side to null (unless already changed)
            if ($path->getDriver() === $this) {
                $path->setDriver(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
