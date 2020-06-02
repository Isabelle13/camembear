<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder=$encoder;
    }


    public function load(ObjectManager $manager)
    {
        $userPerson = new User();
        $userPerson->setEmail("test@mail.com");
        $userPerson->setPassword($this->encoder->encodePassword($userPerson, 'password'));
        $manager->persist($userPerson);

        $manager->flush();
    }
}
