<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Driver;
use Faker;

class DriverFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        
        for ($i=0; $i <10 ; $i++) { 
            $driver[$i] = new Driver();
            $driver[$i]->setFirstName($faker->firstName());
            $driver[$i]->setLastName($faker->lastName());
            $driver[$i]->setTitle($faker->jobTitle());
            $driver[$i]->setLicenseNumber($faker->unique()->randomNumber(8));
            $driver[$i]->setBirthday($faker->dateTimeThisCentury($max='1995'));
            $manager->persist($driver[$i]);
        }

        $manager->flush();
    }
}
