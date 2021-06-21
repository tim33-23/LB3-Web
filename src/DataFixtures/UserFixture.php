<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user ->setEmail('tim'.$i.'@mail.ru');
            $user ->setRoles(['ROLE_USER']);
            $user ->setPassword($i);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
