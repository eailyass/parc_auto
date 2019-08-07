<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Vehicle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Provider\Fakecar;

class VehicleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        for ($i=0; $i <10 ; $i++) { 
            $vehicle[$i] = new Vehicle();
            $vehicle[$i]->setMake($faker->vehicleBrand);
            $vehicle[$i]->setModel($faker->vehicleModel);
            $vehicle[$i]->setDateOfCirculation($faker->dateTime($max = 'now', $timezone = null));
            $vehicle[$i]->setDateOfAcquisition($faker->dateTime($max = $vehicle[$i]->getDateOfCirculation(), $timezone = null));
            $vehicle[$i]->setImmatriculationNumber($faker->vehicleRegistration);
            $vehicle[$i]->setGreyCardNumber($faker->vehicleModel);
            $vehicle[$i]->setType($faker->vehicleType);
            $vehicle[$i]->setAvailability($faker->boolean);
            $manager->persist($vehicle[$i]);
        }

        $manager->flush();
    }
}
