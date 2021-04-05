<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
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
     * @ORM\Column(type="integer")
     */
    private $strength;

    /**
     * @ORM\Column(type="integer")
     */
    private $smartness;

    /**
     * @ORM\Column(type="integer")
     */
    private $heartPoint;

    /**
     * @ORM\Column(type="integer")
     */
    private $manaPoint;

    /**
     * @ORM\OneToMany(targetEntity=Skill::class, mappedBy="race")
     */
    private $skills;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
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

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getSmartness(): ?int
    {
        return $this->smartness;
    }

    public function setSmartness(int $smartness): self
    {
        $this->smartness = $smartness;

        return $this;
    }

    public function getHeartPoint(): ?int
    {
        return $this->heartPoint;
    }

    public function setHeartPoint(int $heartPoint): self
    {
        $this->heartPoint = $heartPoint;

        return $this;
    }

    public function getManaPoint(): ?int
    {
        return $this->manaPoint;
    }

    public function setManaPoint(int $manaPoint): self
    {
        $this->manaPoint = $manaPoint;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setRace($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getRace() === $this) {
                $skill->setRace(null);
            }
        }

        return $this;
    }
}
