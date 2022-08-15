<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use App\Service\Slugifier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public const INGREDIENTS = [
        // Herbs
        [
            'name' => 'Bloodthorn',
            'description' => 'Covered in a sticky red goo that resembles blood',
            'image' => 'Bloodthorn.png',
            'price' => 56,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Firebell',
            'description' => 'Slightly hot to the touch',
            'image' => 'Firebell.png',
            'price' => 20,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Goldthorn',
            'description' => 'Very hard and dry. It also rolls',
            'image' => 'Goldthorn.png',
            'price' => 50,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Hairy Banana',
            'description' => 'Like a fuzzy pod, a banana, and a boomerang all in one. Can you shave this banana? You sure can',
            'image' => 'Hairy_Banana.png',
            'price' => 50,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Ice Fruit',
            'description' => 'According to legend, it\'s an ice dragon\'s favorite delicacy',
            'image' => 'Ice_Fruit.png',
            'price' => 36,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Lava Root',
            'description' => 'This root warms the surrounding soil even in winter',
            'image' => 'Lava_Root.png',
            'price' => 46,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Tangleweed',
            'description' => 'Wet and slippery',
            'image' => 'Tangleweed.png',
            'price' => 34,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Terraria',
            'description' => 'Terraria is one of the most famous alchemy ingredients. It got its name for magical properties best revealed in earth element recipes',
            'image' => 'Terraria.png',
            'price' => 12,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Thornstick',
            'description' => 'Thorny and ouchie',
            'image' => 'Thornstick.png',
            'price' => 32,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Thunder Thistle',
            'description' => 'Lightning crackles around this flower during storms',
            'image' => 'Thunder_Thistle.png',
            'price' => 36,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Waterbloom',
            'description' => 'It seems to have something to do with water',
            'image' => 'Waterbloom.png',
            'price' => 16,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Windbloom',
            'description' => 'Use it like a fan to cool off',
            'image' => 'Windbloom.png',
            'price' => 24,
            'ingredient_type' => 'herb'
        ],
        [
            'name' => 'Lumpy Beet',
            'description' => 'It is said that this particular type of beet is used to produce an unusual "sugar"',
            'image' => 'Lumpy_Beet.png',
            'price' => 36,
            'ingredient_type' => 'herb'
        ],
        // Mushrooms
        [
            'name' => 'Brown Mushroom',
            'description' => 'These mushrooms are quite bitter. They\'re best used in potions for disobedient children',
            'image' => 'Brown_Mushroom.png',
            'price' => 24,
            'ingredient_type' => 'mushroom'
        ],
        [
            'name' => 'Dryad\'s Saddle',
            'description' => 'According to legend, the dryads of the forest rode these mushrooms as mounts. That can’t be right',
            'image' => 'Dryads_Saddle.png',
            'price' => 22,
            'ingredient_type' => 'mushroom'
        ],
        [
            'name' => 'Goblin Shroom',
            'description' => 'Contrary to popular belief, goblins do not cook with these mushrooms',
            'image' => 'Goblin_Shroom.png',
            'price' => 20,
            'ingredient_type' => 'mushroom'
        ],
        [
            'name' => 'Marshroom',
            'description' => 'A mushroom that usually grows in swampy places',
            'image' => 'Marshroom.png',
            'price' => 28,
            'ingredient_type' => 'mushroom'
        ],
        [
            'name' => 'Red Mushroom',
            'description' => 'Thick and hot. Sometimes added to food for a touch of spice',
            'image' => 'Red_Mushroom.png',
            'price' => 38,
            'ingredient_type' => 'mushroom'
        ],
        [
            'name' => 'Shadow Chanterelle',
            'description' => 'Does this mushroom have a shadow? Indeed, it does',
            'image' => 'Shadow_Chanterelle.png',
            'price' => 40,
            'ingredient_type' => 'mushroom'
        ],
        [
            'name' => 'Sulphur Shelf',
            'description' => 'This mushroom owes its name to a specific smell produced when ground in a mortar',
            'image' => 'Sulphur_Shelf.png',
            'price' => 44,
            'ingredient_type' => 'mushroom'
        ],
        [
            'name' => 'Weirdshroom',
            'description' => 'Looks like a very strange mushroom. Is it even a mushroom ?',
            'image' => 'Weirdshroom.png',
            'price' => 34,
            'ingredient_type' => 'mushroom'
        ],
        [
            'name' => 'Witch Mushroom',
            'description' => 'This fungus is popular among sorcerers and alchemists because of its valuable magical properties',
            'image' => 'Witch_Mushroom.png',
            'price' => 52,
            'ingredient_type' => 'mushroom'
        ],
        [
            'name' => 'Grave Truffle',
            'description' => 'The favorite treat for necromancers',
            'image' => 'Grave_Truffle.png',
            'price' => 40,
            'ingredient_type' => 'mushroom'
        ],
        // Minerals
        [
            'name' => 'Cloud Crystal',
            'description' => 'Cloudy like a cloud, crystal like... crystal',
            'image' => 'Cloud_Crystal.png',
            'price' => 240,
            'ingredient_type' => 'mineral'
        ],
        [
            'name' => 'Earth Pyrite',
            'description' => 'Looks like cookies. Tastes like dirt',
            'image' => 'Earth_Pyrite.png',
            'price' => 120,
            'ingredient_type' => 'mineral'
        ],
        [
            'name' => 'Frost Sapphire',
            'description' => 'Always cold. Do not lick',
            'image' => 'Frost_Sapphire.png',
            'price' => 160,
            'ingredient_type' => 'mineral'
        ],
        [
            'name' => 'Fire Citrine',
            'description' => 'Warm to the touch and glows slightly in the dark',
            'image' => 'Fire_Citrine.png',
            'price' => 200,
            'ingredient_type' => 'mineral'
        ],
        [
            'name' => 'Blood Ruby',
            'description' => 'Legend says this is the crystallized blood of fallen heroes of the past',
            'image' => 'Blood_Ruby.png',
            'price' => 360,
            'ingredient_type' => 'mineral'
        ]
    ];

    public function __construct(private Slugifier $slugifier)
    {}

    public function load(ObjectManager $manager): void
    {
        foreach(self::INGREDIENTS as $ingredient){
            $newIngredient = (new Ingredient())
                ->setName($ingredient['name'])
                ->setDescription($ingredient['description'])
                ->setImage($ingredient['image'])
                ->setPrice($ingredient['price'])
                ->setIngredientType($this->getReference("ingredient_type_" . $ingredient['ingredient_type']));
            
            $manager->persist($newIngredient);
            $this->addReference('ingredient_' . $this->slugifier->slugify($ingredient['name'], '_'), $newIngredient);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            IngredientTypeFixtures::class
        ];
    }
}
