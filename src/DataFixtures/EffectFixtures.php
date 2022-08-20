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
            'description' => 'This effect will easily melt flesh, metal and even dragon scales. A little lifehack: if you water it down (like, an absolute ton), it will make a tremendous anti-rust liquid !'
        ],
        [
            'name' => 'Berserker',
            'image' => 'Berserker.png',
            'description' => "Have you ever wondered what kind of concoction Vikings drank before going into battle ? Wonder no more. This effect temporally grants you inhuman strength, reflexes and nums the pain. As a side effect, you'll go crazy for a while (but that's okay)."
        ],
        [
            'name' => 'Bounce',
            'image' => 'Bounce.png',
            'description' => "With this effect, you get the ability to jump up to great heights. It can be helpful when trying to save that princess locked in the tower. Just make sure not to miss the jump to the balcony. This potion won't fix any broken bones, you know."
        ],
        [
            'name' => 'Charm',
            'image' => 'Charm.png',
            'description' => "It will make people fall in love with you ! Or become quite attracted to you, at the very least. Great for unrequited love cases, or making friends in general, if you are not into socializing that much."
        ],
        [
            'name' => 'Explosion',
            'image' => 'Explosion.png',
            'description' => "This effect goes boom. Just boom. But the boom is big. Seriously. Make sure to throw the bottle far enough. Otherwise, even the best healing potions won't save you. But you could always use a Necromancy one, right ?"
        ],
        [
            'name' => 'Fast Growth',
            'image' => 'Fast_Growth.png',
            'description' => "This effect makes any vegetation grow many times faster. Pretty useful, so it's always in demand. Fun fact: some people use this potion to grow their hair quicker. That's not exactly a safe thing to do, but the customer is always right , yeah ?"
        ],
        [
            'name' => 'Fire',
            'image' => 'Fire.png',
            'description' => "Use this if you need to set something, well, on fire. Works with pretty much anything: wet wood, ghouls, heretics, witches... The fire this effect produces is magical, so it doesn't require oxygen and should probably work even underwater."
        ],
        [
            'name' => 'Frost',
            'image' => 'Frost.png',
            'description' => "This effect is a cool one, no pun intended. Not only you can freeze your enemies or put out fires with it, but you can also mix it with any beverage to instantly make it ice-cold and then chill..."
        ],
        [
            'name' => 'Hallucinations',
            'image' => 'Hallucinations.png',
            'description' => "Originally used to disorient, confuse, and terrify, this potion later became a means for some people looking for new experiences despite the risk of going permanently bonkers. Don't be those people."
        ],
        [
            'name' => 'Healing',
            'image' => 'Healing.png',
            'description' => "This effect will heal any wound, well as long as it is not too critical. Count 30 seconds to recover !"
        ],
        [
            'name' => 'Invisibility',
            'image' => 'Invisibility.png',
            'description' => "Who wouldn't want to become invisible once in a while ? With this effect, you can do just that ! Just make sure to pour the potion over your clothes too. But you could straight drink it if you intend to run around naked."
        ],
        [
            'name' => 'Levitation',
            'image' => 'Levitation.png',
            'description' => "Use this and go flying in the sky ! Awesome, right ? Just remember that the effect will only last for so long and tens to wear off when least expected. So, please, keep your expectations down to earth, okay ?"
        ],
        [
            'name' => 'Libido',
            'image' => 'Libido.png',
            'description' => "This effect grants you unimaginable powers. Awakens your 'inner beast'. Bestows upon you the might only a few ever possessed. This effect... Hell, I'm running out of metaphors ! You already know what this potion does, don't you ?"
        ],
        [
            'name' => 'Light',
            'image' => 'Light.png',
            'description' => "This one will brighten up your day (or night). Pour this potion on anything, and it will start glowing with warm light. The light is magical, so the concoction is cold to the touch and safe to use as a lamp in your bedroom."
        ],
        [
            'name' => 'Lightning',
            'image' => 'Lightning.png',
            'description' => "An effect with the power of lightning. Highly effective in battle, especially when dealing with armored knights or iron golems. It can be applied to your weapon as a buff, but you better wear leather armor, just in case."
        ],
        [
            'name' => 'Magical Vision',
            'image' => 'Magical_Vision.png',
            'description' => "This effect helps with bad sight and makes your vision more acute. But it also reveals some stuff that was never meant to be seen by mortal eyes. Year we're talking about that monster under your bed. And another one in the close, too."
        ],
        [
            'name' => 'Mana',
            'image' => 'Mana.png',
            'description' => "Whether you are a healer, a battlemage, or a humble necromancer, you'll need one of these. Not only does it restore your magical powers, but it also tastes good and gives you a fresh breath."
        ],
        [
            'name' => 'Necromancy',
            'image' => 'Necromancy.png',
            'description' => 'Being immortal is the oldest human dream, well with this effect you can revive somebody to life ! The problem is that it will mostly be a zombie, but hey better than nothing no ?'
        ],
        [
            'name' => 'Poisoning',
            'image' => 'Poisoning.png',
            'description' => "Very popular among all kind of folks: knights, assassins, vengeful wives... If made by a skillful alchemist, this potion is able to kill a dragon, let alone a man."
        ],
        [
            'name' => 'Rich Harvest',
            'image' => 'Rich_Harvest.png',
            'description' => "This is the ultimate fertilizer. Are you having a hard time growing vegetables, fruits, or berries ? Pour a couple of bottles in your backyard, and you are good to go. Just make sure there are no weeds first."
        ],
        [
            'name' => 'Sleep',
            'image' => 'Sleep.png',
            'description' => 'This effect makes you, well, fall asleep. Is it safe to use ? Of course, it is ! Why would you even question that ? Are you afraid that this potion is too strong for you ? Fret not, traveler, you can handle this potions, for once. Trust your potion seller, okay ?'
        ],
        [
            'name' => 'Slow Down',
            'image' => 'Slow_Down.png',
            'description' => "This effect makes everything and everyone slower. It comes in handy when setting up traps or trying to shake off some pursuers. Also, never try to drink it, even as a bet. Just don't, okay ?"
        ],
        [
            'name' => 'Stone Skin',
            'image' => 'Stone_Skin.png',
            'description' => "It makes you rock-hard ! Well, just your skin, to be exact. Protects user from all kinds of damage, be it a bandit axe or a random fireball. Your skin will feel a bit numb, and your movements will become clumsier than usual, but it's worth it, right ?"
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
