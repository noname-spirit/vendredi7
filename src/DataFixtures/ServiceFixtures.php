<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Service;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");

        for ($i = 0; $i < 30; $i++) {
            $service = new Service();
            $service->setDescription($faker->sentence())
                ->setNom($faker->company())
                ->setDtCreation($faker->dateTimeBetween('-20 years', 'now'));

            $manager->persist($service);
        }

        $manager->flush();
    }
}
