<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['get_ingredients_collection']]
        ]
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['get_ingredient_item']]
        ]
    ],
    order: ['name' => 'ASC']
)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['get_ingredients_collection', 'get_ingredient_item', 'get_potion_item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get_ingredients_collection', 'get_ingredient_item', 'get_potion_item'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['get_ingredients_collection', 'get_ingredient_item'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['get_ingredients_collection', 'get_ingredient_item', 'get_potion_item'])]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get_ingredients_collection', 'get_ingredient_item', 'get_potion_item'])]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'ingredient', targetEntity: PotionIngredient::class)]
    #[Groups(['get_ingredients_collection', 'get_ingredient_item'])]
    private Collection $potionIngredients;

    #[ORM\ManyToOne(inversedBy: 'ingredients')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['get_ingredients_collection', 'get_ingredient_item'])]
    private ?IngredientType $ingredientType = null;

    public function __construct()
    {
        $this->potionIngredients = new ArrayCollection();
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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
            $potionIngredient->setIngredient($this);
        }

        return $this;
    }

    public function removePotionIngredient(PotionIngredient $potionIngredient): self
    {
        if ($this->potionIngredients->removeElement($potionIngredient)) {
            // set the owning side to null (unless already changed)
            if ($potionIngredient->getIngredient() === $this) {
                $potionIngredient->setIngredient(null);
            }
        }

        return $this;
    }

    public function getIngredientType(): ?IngredientType
    {
        return $this->ingredientType;
    }

    public function setIngredientType(?IngredientType $ingredientType): self
    {
        $this->ingredientType = $ingredientType;

        return $this;
    }
}
