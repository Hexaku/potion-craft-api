<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PotionRepository::class)]
#[ApiResource]
class Potion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?string $level = null;

    #[ORM\OneToMany(mappedBy: 'potion', targetEntity: PotionIngredient::class)]
    private Collection $potionIngredients;

    #[ORM\ManyToOne(inversedBy: 'potions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Effect $effect = null;

    #[ORM\ManyToMany(targetEntity: Tool::class, mappedBy: 'potions')]
    private Collection $tools;

    public function __construct()
    {
        $this->potionIngredients = new ArrayCollection();
        $this->tools = new ArrayCollection();
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

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection<int, PotionIngredient>
     */
    public function getPotionIngredients(): Collection
    {
        return $this->potionIngredients;
    }

    public function addPotionIngredient(PotionIngredient $potionIngredient): self
    {
        if (!$this->potionIngredients->contains($potionIngredient)) {
            $this->potionIngredients->add($potionIngredient);
            $potionIngredient->setPotion($this);
        }

        return $this;
    }

    public function removePotionIngredient(PotionIngredient $potionIngredient): self
    {
        if ($this->potionIngredients->removeElement($potionIngredient)) {
            // set the owning side to null (unless already changed)
            if ($potionIngredient->getPotion() === $this) {
                $potionIngredient->setPotion(null);
            }
        }

        return $this;
    }

    public function getEffect(): ?Effect
    {
        return $this->effect;
    }

    public function setEffect(?Effect $effect): self
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * @return Collection<int, Tool>
     */
    public function getTools(): Collection
    {
        return $this->tools;
    }

    public function addTool(Tool $tool): self
    {
        if (!$this->tools->contains($tool)) {
            $this->tools->add($tool);
            $tool->addPotion($this);
        }

        return $this;
    }

    public function removeTool(Tool $tool): self
    {
        if ($this->tools->removeElement($tool)) {
            $tool->removePotion($this);
        }

        return $this;
    }
}
