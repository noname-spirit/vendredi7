<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Employe;

class EmployeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");

        for ($i = 0; $i < 30; $i++) {
            $employe = new Employe();
            $employe->setEmail($faker->unique()->safeEmail())
                ->setPoste($faker->jobTitle())
                ->setAdresse($faker->address())
                ->setNom($faker->lastName())
                ->setPrenom($faker->firstName())
                ->setTelephone($faker->randomNumber(9, true)) // Génère un numéro entier de 9 chiffres
                ->setSalaire($faker->numberBetween(1500, 5000)) // Salaire aléatoire entre 1500 et 5000 €
                ->setDtnaissance($faker->dateTimeBetween('-60 years', '-18 years')) // Date de naissance plausible
                ->setIsactive($faker->boolean()); // True ou False

            $manager->persist($employe);
        }

        $manager->flush();
    }
}
