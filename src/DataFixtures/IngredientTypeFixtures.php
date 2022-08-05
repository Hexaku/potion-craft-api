<?php

namespace App\DataFixtures;

use App\Entity\IngredientType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientTypeFixtures extends Fixture
{
    public const INGREDIENT_TYPES = [
        'Herb',
        'Mushroom',
        'Mineral'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::INGREDIENT_TYPES as $ingredientType){
            $newIngredientType = (new IngredientType())
                ->setName($ingredientType);
            
            $manager->persist($newIngredientType);
            $this->addReference("ingredient_type_" . strtolower($ingredientType), $newIngredientType);
        }

        $manager->flush();
    }
}
