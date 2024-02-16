<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PokemonLvlRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonLvlRepository::class)]
#[ApiResource]
class PokemonLvl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'pokemonLvls')]
    private ?Pokemon $pokemon = null;

    #[ORM\Column]
    private ?int $lvl = null;

    #[ORM\ManyToMany(targetEntity: PokemonMove::class, inversedBy: 'pokemonLvls')]
    private Collection $moves;

    public function __construct()
    {
        $this->moves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokemon(): ?Pokemon
    {
        return $this->pokemon;
    }

    public function setPokemon(?Pokemon $pokemon): static
    {
        $this->pokemon = $pokemon;

        return $this;
    }

    public function getLvl(): ?int
    {
        return $this->lvl;
    }

    public function setLvl(int $lvl): static
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * @return Collection<int, PokemonMove>
     */
    public function getMoves(): Collection
    {
        return $this->moves;
    }

    public function addMove(PokemonMove $move): static
    {
        if (!$this->moves->contains($move)) {
            $this->moves->add($move);
        }

        return $this;
    }

    public function removeMove(PokemonMove $move): static
    {
        $this->moves->removeElement($move);

        return $this;
    }
}
