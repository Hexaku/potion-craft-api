<?php

namespace App\DataFixtures;

use App\Entity\Potion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PotionFixtures extends Fixture implements DependentFixtureInterface
{
    public const POTIONS = [
        // Acid potions
        [
            'level' => 'weak',
            'price' => 160,
            'effect' => 'acid',
            'tools' => ['cauldron', 'mortar']
        ],
        [
            'level' => 'medium',
            'price' => 176,
            'effect' => 'acid',
            'tools' => ['cauldron', 'mortar']
        ],
        [
            'level' => 'strong',
            'price' => 132,
            'effect' => 'acid',
            'tools' => ['cauldron', 'mortar', 'ladle']
        ],
        // Berseker potions
        [
            'level' => 'strong',
            'price' => 172,
            'effect' => 'berserker',
            'tools' => ['cauldron', 'mortar', 'ladle']
        ],
        // Bounce potions
        [
            'level' => 'weak',
            'price' => 128,
            'effect' => 'bounce',
            'tools' => ['cauldron', 'mortar']
        ],
        [
            'level' => 'medium',
            'price' => 128,
            'effect' => 'bounce',
            'tools' => ['cauldron', 'mortar']
        ],
        [
            'level' => 'strong',
            'price' => 148,
            'effect' => 'bounce',
            'tools' => ['cauldron', 'mortar', 'ladle']
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::POTIONS as $potion){
            $newPotion = (new Potion())
                ->setLevel($potion['level'])
                ->setPrice($potion['price'])
                ->setEffect($this->getReference('effect_' . $potion['effect']));

            foreach($potion['tools'] as $tool){
                $newPotion->addTool($this->getReference('tool_' . $tool));
            }

            // Potion name like : Weak Potion of Fire
            $newPotion->setName(ucfirst($newPotion->getLevel()) . ' Potion of ' . $newPotion->getEffect()->getName());

            $manager->persist($newPotion);
            $this->addReference('potion_' . $potion['level'] . '_' . $potion['effect'], $newPotion);
        }
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ToolFixtures::class
        ];
    }
}
