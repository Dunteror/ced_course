<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
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
    private $mpCost;

    /**
     * @ORM\Column(type="integer")
     */
    private $baseDamage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $physical;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="skills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

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

    public function getMpCost(): ?int
    {
        return $this->mpCost;
    }

    public function setMpCost(int $mpCost): self
    {
        $this->mpCost = $mpCost;

        return $this;
    }

    public function getBaseDamage(): ?int
    {
        return $this->baseDamage;
    }

    public function setBaseDamage(int $baseDamage): self
    {
        $this->baseDamage = $baseDamage;

        return $this;
    }

    public function isPhysical(): ?bool
    {
        return $this->physical;
    }

    public function setPhysical(bool $physical): self
    {
        $this->physical = $physical;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }
}
