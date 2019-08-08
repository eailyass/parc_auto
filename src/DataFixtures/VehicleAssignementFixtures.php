<?php

namespace App\DataFixtures;

use App\Entity\Driver;
use App\Entity\Vehicle;
use Faker;
use App\Entity\VehicleAssignement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VehicleAssignementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $vehicles = $manager->getRepository(Vehicle::class)->findAll();
        $drivers = $manager->getRepository(Driver::class)->findAll();
        $faker = Faker\Factory::create();

        for ($i=0; $i <20 ; $i++) { 
            $assignement[$i] = new VehicleAssignement();
            $assignement[$i]->setDateOfRevoking($faker->dateTime())
            ->setDateOfAssigning($faker->dateTime($max=$assignement[$i]->getDateOfRevoking()))
            ->setVehicle($vehicles[rand(0,9)])
            ->setDriver($drivers[rand(0,9)])
            ->setObservation($faker->sentence());
            $manager->persist($assignement[$i]);
        }

        $manager->flush();
    }
}
