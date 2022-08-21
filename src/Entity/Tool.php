<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ToolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ToolRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['get_tools_collection']]
        ]
    ]
)]
class Tool
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['get_tools_collection'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get_tools_collection', 'get_potion_item'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['get_tools_collection'])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get_tools_collection', 'get_potion_item'])]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Potion::class, inversedBy: 'tools')]
    private Collection $potions;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
        }

        return $this;
    }

    public function removePotion(Potion $potion): self
    {
        $this->potions->removeElement($potion);

        return $this;
    }
}
