<?php

namespace App\DataFixtures;

use App\Entity\Potion;
use App\Service\Slugifier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PotionFixtures extends Fixture implements DependentFixtureInterface
{
    public const POTION_LEVELS = ['weak', 'medium', 'strong'];
    public const TOTAL_POTIONS = 69;

    public function __construct(private Slugifier $slugifier)
    {}

    public function load(ObjectManager $manager): void
    {
        $incr = 1;
        // Create 3 potions per effect, each one with a different level
        foreach(EffectFixtures::EFFECTS as $effect){
            foreach(self::POTION_LEVELS as $level){
                $slugEffect = $this->slugifier->slugify($effect['name'], '_');
                $newPotion = (new Potion())
                    ->setLevel($level)
                    ->setEffect($this->getReference('effect_' . $slugEffect))
                    ->addTool($this->getReference('tool_cauldron'))
                    ->setImage('potion_' . $slugEffect . '.jpg');

                // Add 1 tool for medium potion and 2 tools for strong potions
                switch($newPotion->getLevel()){
                    case 'medium':
                        $newPotion->addTool($this->getReference('tool_mortar'));
                        break;
                    case 'strong':
                        $newPotion->addTool($this->getReference('tool_mortar'));
                        $newPotion->addTool($this->getReference('tool_ladle'));
                        break;
                }
                
                // Potion name like : Weak Potion of Fire
                $newPotion->setName(ucfirst($newPotion->getLevel()) . ' Potion of ' . $newPotion->getEffect()->getName());

                $manager->persist($newPotion);
                $this->addReference('potion_' . $incr, $newPotion);
                $incr++;
            }
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
