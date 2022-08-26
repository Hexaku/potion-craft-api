<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public const ADMIN_EMAIL = 'admin@potioncraft.api';

    public function __construct(private UserPasswordHasherInterface $userPasswordHasherInterface)
    {}

    public function load(ObjectManager $manager): void
    {
        $admin = (new User())
            ->setUsername('admin')
            ->setEmail(self::ADMIN_EMAIL)
            ->setRoles(['ROLE_ADMIN']);
        $adminPlainPassword = 'admin';
        $adminHashedPassword = $this->userPasswordHasherInterface->hashPassword($admin, $adminPlainPassword);
        $admin->setPassword($adminHashedPassword);

        $manager->persist($admin);
        $this->addReference('user_admin', $admin);

        $manager->flush();
    }
}
