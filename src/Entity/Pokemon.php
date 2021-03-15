<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonRepository::class)
 */
class Pokemon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $nameen;

    /**
     * @ORM\Column(type="text")
     */
    private $namefr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $artwork;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $icon;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class, inversedBy="types", orphanRemoval=true)
     * @ORM\JoinTable(name="pokemon_type")
     */
    private $types;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Pokemon")
     */
    private $users;

    public function __toString() {
        return $this->types;
   }

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameen(): ?string
    {
        return $this->nameen;
    }

    public function setNameen(string $nameen): self
    {
        $this->nameen = $nameen;

        return $this;
    }

    public function getNamefr(): ?string
    {
        return $this->namefr;
    }

    public function setNamefr(string $namefr): self
    {
        $this->namefr = $namefr;

        return $this;
    }

    public function getArtwork(): ?string
    {
        return $this->artwork;
    }

    public function setArtwork(string $artwork): self
    {
        $this->artwork = $artwork;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return Collection|Type[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setPokemon($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getPokemon() === $this) {
                $user->setPokemon(null);
            }
        }

        return $this;
    }

   


}
