<?php

namespace App\DataFixtures;

use App\Entity\VehicleCheckout;
use Faker;
use App\Entity\Vehicle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class VehicleCheckoutFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $vehicleRepo = $manager->getRepository(Vehicle::class);
        for ($i=0; $i < 10 ; $i++) { 

            $checkout[$i] = new VehicleCheckout();
            $checkout[$i]->setDateOfCheckout($faker->dateTime($max="now"))
            ->setDescription($faker->text())
            ->setType($faker->numberBetween(1,4))
            ->setMileage($faker->randomNumber($nbDigits =5))
            ->setVehicle($vehicleRepo->findOneById($faker->numberBetween(21,30)));
            $manager->persist($checkout[$i]);
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
