<?php

namespace App\Entity;

use App\Repository\CircuitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CircuitRepository::class)
 */
class Circuit
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="circuits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="circuitsplayed")
     */
    private $participants;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $rules;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="points")
     */
    private $userpoints;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
        $this->userpoints = new ArrayCollection();
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

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(User $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants[] = $participant;
        }

        return $this;
    }

    public function removeParticipant(User $participant): self
    {
        $this->participants->removeElement($participant);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRules(): ?string
    {
        return $this->rules;
    }

    public function setRules(string $rules): self
    {
        $this->rules = $rules;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserpoints(): Collection
    {
        return $this->userpoints;
    }

    public function addUserpoint(User $userpoint): self
    {
        if (!$this->userpoints->contains($userpoint)) {
            $this->userpoints[] = $userpoint;
            $userpoint->addPoint($this);
        }

        return $this;
    }

    public function removeUserpoint(User $userpoint): self
    {
        if ($this->userpoints->removeElement($userpoint)) {
            $userpoint->removePoint($this);
        }

        return $this;
    }
}
