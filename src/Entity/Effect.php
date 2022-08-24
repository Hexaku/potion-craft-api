<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EffectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EffectRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['get_effects_collection']]
        ]
    ],
    itemOperations: ['get'],
    order: ['name' => 'ASC']
)]
class Effect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['get_effects_collection', 'get_potions_collection'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get_effects_collection', 'get_potions_collection', 'get_potion_item'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get_effects_collection', 'get_potions_collection', 'get_potion_item'])]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'effect', targetEntity: Potion::class)]
    #[Groups(['get_effects_collection'])]
    private Collection $potions;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['get_effects_collection', 'get_potion_item'])]
    private ?string $description = null;

    public function __construct()
    {
        $this->potions = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Potion>
     */
    public function getPotions(): Collection
    {
        return $this->potions;
    }

    public function addPotion(Potion $potion): self
    {
        if (!$this->potions->contains($potion)) {
            $this->potions->add($potion);
            $potion->setEffect($this);
        }

        return $this;
    }

    public function removePotion(Potion $potion): self
    {
        if ($this->potions->removeElement($potion)) {
            // set the owning side to null (unless already changed)
            if ($potion->getEffect() === $this) {
                $potion->setEffect(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
