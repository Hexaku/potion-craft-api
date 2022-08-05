<?php

namespace App\DataFixtures;

use App\Entity\Effect;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EffectFixtures extends Fixture
{
    public const EFFECTS = [
        [
            'name' => 'Acid',
            'image' => 'Acid.png'
        ],
        [
            'name' => 'Berserker',
            'image' => 'Berserker.png'
        ],
        [
            'name' => 'Bounce',
            'image' => 'Bounce.png'
        ],
        [
            'name' => 'Charm',
            'image' => 'Charm.png'
        ],
        [
            'name' => 'Explosion',
            'image' => 'Explosion.png'
        ],
        [
            'name' => 'Fast Growth',
            'image' => 'Fast_Growth.png'
        ],
        [
            'name' => 'Fire',
            'image' => 'Fire.png'
        ],
        [
            'name' => 'Frost',
            'image' => 'Frost.png'
        ],
        [
            'name' => 'Hallucinations',
            'image' => 'Hallucinations.png'
        ],
        [
            'name' => 'Healing',
            'image' => 'Healing.png'
        ],
        [
            'name' => 'Invisibility',
            'image' => 'Invisibility.png'
        ],
        [
            'name' => 'Levitation',
            'image' => 'Levitation.png'
        ],
        [
            'name' => 'Levitation',
            'image' => 'Levitation.png'
        ],
        [
            'name' => 'Libido',
            'image' => 'Libido.png'
        ],
        [
            'name' => 'Light',
            'image' => 'Light.png'
        ],
        [
            'name' => 'Lightning',
            'image' => 'Lightning.png'
        ],
        [
            'name' => 'Magical Vision',
            'image' => 'Magical_Vision.png'
        ],
        [
            'name' => 'Mana',
            'image' => 'Mana.png'
        ],
        [
            'name' => 'Necromancy',
            'image' => 'Necromancy.png'
        ],
        [
            'name' => 'Poisoning',
            'image' => 'Poisoning.png'
        ],
        [
            'name' => 'Rich Harvest',
            'image' => 'Rich_Harvest.png'
        ],
        [
            'name' => 'Sleep',
            'image' => 'Sleep.png'
        ],
        [
            'name' => 'Slow Down',
            'image' => 'Slow_Down.png'
        ],
        [
            'name' => 'Stone Skin',
            'image' => 'Stone_Skin.png'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::EFFECTS as $effect){
            $newEffect = (new Effect())
                ->setName($effect['name'])
                ->setImage($effect['image']);
            $manager->persist($newEffect);
        }

        $manager->flush();
    }
}
