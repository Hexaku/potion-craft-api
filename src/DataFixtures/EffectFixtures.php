<?php

namespace App\DataFixtures;

use App\Entity\Effect;
use App\Service\Slugifier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EffectFixtures extends Fixture
{
    public const EFFECTS = [
        [
            'name' => 'Acid',
            'image' => 'Acid.png',
            'description' => 'Life can be simple when you can melt everything'
        ],
        [
            'name' => 'Berserker',
            'image' => 'Berserker.png',
            'description' => 'The Art of War in a flask'
        ],
        [
            'name' => 'Bounce',
            'image' => 'Bounce.png',
            'description' => 'Very useful if you wanna be the pirate king'
        ],
        [
            'name' => 'Charm',
            'image' => 'Charm.png',
            'description' => 'Perfect for Valentine\'s day'
        ],
        [
            'name' => 'Explosion',
            'image' => 'Explosion.png',
            'description' => 'Could be used as an alarm clock but i\'m not 100% sure for this one'
        ],
        [
            'name' => 'Fast Growth',
            'image' => 'Fast_Growth.png',
            'description' => 'Wanna create a forest in 1 minute ?'
        ],
        [
            'name' => 'Fire',
            'image' => 'Fire.png',
            'description' => 'Better than a lighter'
        ],
        [
            'name' => 'Frost',
            'image' => 'Frost.png',
            'description' => 'Ice is always cooler anyway'
        ],
        [
            'name' => 'Hallucinations',
            'image' => 'Hallucinations.png',
            'description' => 'Like dreaming, but in real life'
        ],
        [
            'name' => 'Healing',
            'image' => 'Healing.png',
            'description' => 'Hospitals are so outdated nowadays'
        ],
        [
            'name' => 'Invisibility',
            'image' => 'Invisibility.png',
            'description' => 'Disappear from this world, literally'
        ],
        [
            'name' => 'Levitation',
            'image' => 'Levitation.png',
            'description' => 'I don`t have potion to tranform you in bird, but this one does quite the job'
        ],
        [
            'name' => 'Libido',
            'image' => 'Libido.png',
            'description' => 'Hot but this isn\'t exactly a fire potion'
        ],
        [
            'name' => 'Light',
            'image' => 'Light.png',
            'description' => 'Lumos maxima'
        ],
        [
            'name' => 'Lightning',
            'image' => 'Lightning.png',
            'description' => 'Thunder, feel the thunder'
        ],
        [
            'name' => 'Magical Vision',
            'image' => 'Magical_Vision.png',
            'description' => 'Makes you able to see magical things'
        ],
        [
            'name' => 'Mana',
            'image' => 'Mana.png',
            'description' => 'Well, again a nerd thing'
        ],
        [
            'name' => 'Necromancy',
            'image' => 'Necromancy.png',
            'description' => 'Rest in peace was a trend'
        ],
        [
            'name' => 'Poisoning',
            'image' => 'Poisoning.png',
            'description' => 'Always useful to get rid of some people discretly'
        ],
        [
            'name' => 'Rich Harvest',
            'image' => 'Rich_Harvest.png',
            'description' => 'Why spend months gardening when this potion does all the job instantly ?'
        ],
        [
            'name' => 'Sleep',
            'image' => 'Sleep.png',
            'description' => 'Zzzzzz'
        ],
        [
            'name' => 'Slow Down',
            'image' => 'Slow_Down.png',
            'description' => 'Slow motion, but in real life'
        ],
        [
            'name' => 'Stone Skin',
            'image' => 'Stone_Skin.png',
            'description' => 'You will never lose any boxing fight with that'
        ]
    ];

    public function __construct(private Slugifier $slugifier)
    {}

    public function load(ObjectManager $manager): void
    {
        foreach(self::EFFECTS as $effect){
            $newEffect = (new Effect())
                ->setName($effect['name'])
                ->setImage($effect['image'])
                ->setDescription($effect['description']);

            $manager->persist($newEffect);
            $slug = $this->slugifier->slugify($effect['name'], '_');
            $this->addReference('effect_' . $slug, $newEffect);
        }

        $manager->flush();
    }
}
