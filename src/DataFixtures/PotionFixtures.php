<?php

namespace App\DataFixtures;

use App\Entity\Potion;
use App\Service\Slugifier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PotionFixtures extends Fixture implements DependentFixtureInterface
{
    public const TOTAL_POTIONS = 23;

    public function __construct(private Slugifier $slugifier)
    {}

    public function load(ObjectManager $manager): void
    {
        $incr = 1;
        // Create 1 potion per effect, with medium level
        foreach(EffectFixtures::EFFECTS as $effect){
                $slugEffect = $this->slugifier->slugify($effect['name'], '_');
                $randomLevel = rand(1, 3);
                $randomTool = rand(1, 3);
                $newPotion = (new Potion())
                    ->setLevel($randomLevel)
                    ->setEffect($this->getReference('effect_' . $slugEffect))
                    // Add cauldron tool by default for all recepes
                    ->addTool($this->getReference('tool_0'))
                    ->addTool($this->getReference('tool_' . $randomTool))
                    ->setImage('potion_' . $slugEffect . '.jpg');

                $newPotion->setName('Potion of ' . $newPotion->getEffect()->getName());

                $manager->persist($newPotion);
                $this->addReference('potion_' . $incr, $newPotion);
                $incr++;
            
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
