<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $normalUser = new User();
        $normalUser->setFirstName('normal')
        ->setLastName('user')
        ->setEmail('n@a.fr')
        ->setPassword($this->passwordEncoder->encodePassword($normalUser,"normalUser"))
        ->setUsername('normalUser')
        ->setRoles(['ROLE_NORMAL']);
        $manager->persist($normalUser);
        $adminUser = new User();
        $adminUser->setFirstName('admin')
        ->setLastName('user')
        ->setEmail('a@a.fr')
        ->setPassword($this->passwordEncoder->encodePassword($adminUser,"adminUser"))
        ->setUsername('adminUser')
        ->setRoles(['ROLE_ADMIN']);
        $manager->persist($adminUser);
        $superUser = new User();
        $superUser->setFirstName('super')
        ->setLastName('user')
        ->setEmail('s@a.fr')
        ->setPassword($this->passwordEncoder->encodePassword($superUser,"superUser"))
        ->setUsername('superUser')
        ->setRoles(['ROLE_SUPER']);
        $manager->persist($superUser);
        $manager->flush();
    }
}
