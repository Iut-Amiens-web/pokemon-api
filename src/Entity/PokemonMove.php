<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PokemonMoveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonMoveRepository::class)]
#[ApiResource]
class PokemonMove
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $power = null;

    #[ORM\Column]
    private ?int $accuracy = null;

    #[ORM\Column]
    private ?int $pp = null;

    #[ORM\ManyToMany(targetEntity: PokemonLvl::class, mappedBy: 'moves')]
    private Collection $pokemonLvls;

    public function __construct()
    {
        $this->pokemonLvls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): static
    {
        $this->power = $power;

        return $this;
    }

    public function getAccuracy(): ?int
    {
        return $this->accuracy;
    }

    public function setAccuracy(int $accuracy): static
    {
        $this->accuracy = $accuracy;

        return $this;
    }

    public function getPp(): ?int
    {
        return $this->pp;
    }

    public function setPp(int $pp): static
    {
        $this->pp = $pp;

        return $this;
    }

    /**
     * @return Collection<int, PokemonLvl>
     */
    public function getPokemonLvls(): Collection
    {
        return $this->pokemonLvls;
    }

    public function addPokemonLvl(PokemonLvl $pokemonLvl): static
    {
        if (!$this->pokemonLvls->contains($pokemonLvl)) {
            $this->pokemonLvls->add($pokemonLvl);
            $pokemonLvl->addMove($this);
        }

        return $this;
    }

    public function removePokemonLvl(PokemonLvl $pokemonLvl): static
    {
        if ($this->pokemonLvls->removeElement($pokemonLvl)) {
            $pokemonLvl->removeMove($this);
        }

        return $this;
    }
}
