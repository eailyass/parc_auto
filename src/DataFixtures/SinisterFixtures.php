<?php

namespace App\DataFixtures;

use App\Entity\Vehicle;
use App\Entity\Sinister;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SinisterFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $vehicleRepo = $manager->getRepository(Vehicle::class);
        $faker = Faker\Factory::create('fr_FR');
        
        for ($i=0; $i <10 ; $i++) { 
            $sinister[$i] = new Sinister();
            $sinister[$i]->setTitle($faker->sentence(6,true));
            $sinister[$i]->setDescription($faker->text());
            $sinister[$i]->setDateOfSinister($faker->dateTimeInInterval($startDate = '-30 years',$max = 'now'));
            $sinister[$i]->setDamageEstimation($faker->randomFloat($max=100000));
            $sinister[$i]->setVehicle($vehicleRepo->findOneById($faker->numberBetween(21,30)));
            $manager->persist($sinister[$i]);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            VehicleFixtures::class,
        );
    }
}
