<?php

namespace App\Entity;

use App\Repository\TrailerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrailerRepository::class)]
class Trailer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $trailerPlate = null;

    /**
     * @var Collection<int, Path>
     */
    #[ORM\OneToMany(targetEntity: Path::class, mappedBy: 'trailer')]
    private Collection $paths;

    public function __construct()
    {
        $this->paths = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrailerPlate(): ?string
    {
        return $this->trailerPlate;
    }

    public function setTrailerPlate(string $trailerPlate): static
    {
        $this->trailerPlate = $trailerPlate;

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
            $path->setTrailer($this);
        }

        return $this;
    }

    public function removePath(Path $path): static
    {
        if ($this->paths->removeElement($path)) {
            // set the owning side to null (unless already changed)
            if ($path->getTrailer() === $this) {
                $path->setTrailer(null);
            }
        }

        return $this;
    }
}
