<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Customer;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setUsername($faker->userName);
            $user->setEmail($faker->email);
            $user->setRoles(['ROLE_USER']);
            $user->setPlainPassword('password');

            $manager->persist($user);
            $manager->flush();
        }

        for ($i = 0; $i < 40; $i++) {
            $customer = new Customer();
            $customer->setFirstName($faker->firstName);
            $customer->setLastName($faker->lastName);
            $customer->setAge($faker->numberBetween($min = 18, $max = 100));
            $customer->setGender($faker->title($gender = 'male'|'female'));
            $customer->setCountry($faker->country);

            $manager->persist($customer);
            $manager->flush();
        }
        
    }
}
