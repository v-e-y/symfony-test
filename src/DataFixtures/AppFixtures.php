<?php

namespace App\DataFixtures;

use App\Factory\ProductFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /*
        $product = new Product();
        $manager->persist($product);
        $manager->flush();
        */
        ProductFactory::createMany(16);
        
    }
}
