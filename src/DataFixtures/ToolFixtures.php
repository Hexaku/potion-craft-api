<?php

namespace App\DataFixtures;

use App\Entity\Tool;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ToolFixtures extends Fixture
{
    public const TOOLS = [
        [
            'name' => 'Bellows',
            'description' => 'Heat up the potion, causing the current effect to stick',
            'image' => 'Bellows.png'
        ],
        [
            'name' => 'Cauldron',
            'description' => 'Mix the ingredients to push the potion along its path',
            'image' => 'Cauldron.png'
        ],
        [
            'name' => 'Ladle',
            'description' => 'Bring the potion back towards the center of the Alchemy Map',
            'image' => 'Ladle.png'
        ],
        [
            'name' => 'Mortar',
            'description' => 'Grind up ingredients and bring out their full potential',
            'image' => 'Mortar.png'
        ],
    ];
    
    public function load(ObjectManager $manager): void
    {
        foreach(self::TOOLS as $tool){
            $newTool = (new Tool())
                ->setName($tool['name'])
                ->setDescription($tool['description'])
                ->setImage($tool['image']);

            $manager->persist($newTool);
        }

        $manager->flush();
    }
}
