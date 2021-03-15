<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $icon;

    /**
     * @ORM\ManyToMany(targetEntity=Pokemon::class, mappedBy="types", cascade={"all"}, orphanRemoval=true)
     */
    private $types;

    public function __toString() {
         return $this->name;
    }

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
     * @return Collection|Pokemon[]
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Pokemon $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types[] = $type;
            $type->addType($this);
        }

        return $this;
    }

    public function removeType(Pokemon $type): self
    {
        if ($this->types->removeElement($type)) {
            $type->removeType($this);
        }

        return $this;
    }

    
}
