<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail($faker->email());
            $password = $this->hasher->hashPassword($user, 'user');
            $user->setPassword($password);
            $user->setRoles(['ROLE_USER']);
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->Lastname());
            $user->setBirth($faker->date('d-m-Y'));
            $user->setPhone($faker->phoneNumber());

            $manager->persist($user);    
        }

        $user = new User();
        $user->setEmail($faker->email());
        $password = $this->hasher->hashPassword($user, 'admin');
        $user->setPassword($password);
        $user->setRoles(['ROLE_ADMIN']);
        $user->setFirstname($faker->firstName());
        $user->setLastname($faker->Lastname());
        $user->setBirth($faker->date('d-m-Y'));
        $user->setPhone($faker->phoneNumber());

        $manager->persist($user); 

        $manager->flush();
    }
}
