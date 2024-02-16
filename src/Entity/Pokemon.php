<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Controller\GetPokemonAction;
use App\Controller\PokemonController;
use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\OpenApi\Model;

#[ApiResource(
    operations: [
        new GetCollection(),
        new Get(
            uriTemplate: '/pokemon/details/{name}/{lvl}/',
            uriVariables: [
                'name' => "name"
            ],
            controller: GetPokemonAction::class,
            openapi: new Model\Operation(
                summary: "Retrieves a Pokemon resource with name and lvl.",
            ),
        ),
    ],
    order: ['status' => 'ASC', 'createdAt' => 'DESC'],
    paginationClientItemsPerPage: true
)]
#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $hp = null;

    #[ORM\Column]
    private ?int $defense = null;

    #[ORM\Column]
    private ?int $attack = null;

    #[ORM\Column]
    private ?int $speed = null;

    #[ORM\Column]
    private ?bool $side = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    #[ORM\Column]
    private ?int $special = null;

    #[ORM\OneToMany(mappedBy: 'pokemon', targetEntity: PokemonLvl::class)]
    private Collection $pokemonLvls;

    #[ORM\Column]
    private ?int $pp = null;

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

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): static
    {
        $this->hp = $hp;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): static
    {
        $this->defense = $defense;

        return $this;
    }

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): static
    {
        $this->attack = $attack;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function isSide(): ?bool
    {
        return $this->side;
    }

    public function setSide(bool $side): static
    {
        $this->side = $side;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getSpecial(): ?int
    {
        return $this->special;
    }

    public function setSpecial(int $special): static
    {
        $this->special = $special;

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
            $pokemonLvl->setPokemon($this);
        }

        return $this;
    }

    public function removePokemonLvl(PokemonLvl $pokemonLvl): static
    {
        if ($this->pokemonLvls->removeElement($pokemonLvl)) {
            // set the owning side to null (unless already changed)
            if ($pokemonLvl->getPokemon() === $this) {
                $pokemonLvl->setPokemon(null);
            }
        }

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
}
