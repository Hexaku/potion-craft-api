<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PotionIngredientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PotionIngredientRepository::class)]
#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get']
)]
class PotionIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'potionIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['get_potion_item'])]
    private ?Ingredient $ingredient = null;

    #[ORM\Column]
    #[Groups(['get_ingredient_item', 'get_potion_item'])]
    private ?int $ingredientQuantity = null;

    #[ORM\ManyToOne(inversedBy: 'potionIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['get_ingredient_item'])]
    private ?Potion $potion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getIngredientQuantity(): ?int
    {
        return $this->ingredientQuantity;
    }

    public function setIngredientQuantity(int $ingredientQuantity): self
    {
        $this->ingredientQuantity = $ingredientQuantity;

        return $this;
    }

    public function getPotion(): ?Potion
    {
        return $this->potion;
    }

    public function setPotion(?Potion $potion): self
    {
        $this->potion = $potion;

        return $this;
    }
}
