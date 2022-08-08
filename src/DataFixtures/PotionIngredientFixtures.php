<?php

namespace App\DataFixtures;

use App\Entity\PotionIngredient;
use App\Service\Slugifier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PotionIngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public const POTION_INGREDIENTS = [
        // Acid potions
        [
            'ingredient' => 'firebell',
            'ingredient_quantity' => 5,
            'potion' => 'weak_acid'
        ],
        [
            'ingredient' => 'terraria',
            'ingredient_quantity' => 5,
            'potion' => 'weak_acid'
        ],
        [
            'ingredient' => 'firebell',
            'ingredient_quantity' => 2,
            'potion' => 'medium_acid'
        ],
        [
            'ingredient' => 'terraria',
            'ingredient_quantity' => 5,
            'potion' => 'medium_acid'
        ],
        [
            'ingredient' => 'red_mushroom',
            'ingredient_quantity' => 2,
            'potion' => 'medium_acid'
        ],
        [
            'ingredient' => 'firebell',
            'ingredient_quantity' => 3,
            'potion' => 'strong_acid'
        ],
        [
            'ingredient' => 'terraria',
            'ingredient_quantity' => 6,
            'potion' => 'strong_acid'
        ]
    ];

    public function __construct(private Slugifier $slugifier)
    {}

    public function load(ObjectManager $manager): void
    {
        // For each potion, add 3 to 5 random ingredients with random quantities
        for($i=1; $i<=PotionFixtures::TOTAL_POTIONS; $i++){
            $randomPotionIngredients = rand(3,5);
            for($j=0; $j<$randomPotionIngredients; $j++){
                $randomIngredientId = rand(0, count(IngredientFixtures::INGREDIENTS)-1);
                $randomQuantity = rand(1, 5);
                $newPotionIngredient = (new PotionIngredient())
                    ->setPotion($this->getReference('potion_' . $i))
                    ->setIngredient($this->getReference('ingredient_' . $this->slugifier->slugify(IngredientFixtures::INGREDIENTS[$randomIngredientId]['name'], '_')))
                    ->setIngredientQuantity($randomQuantity);
    
                $manager->persist($newPotionIngredient);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            IngredientFixtures::class,
            PotionFixtures::class
        ];
    }
}