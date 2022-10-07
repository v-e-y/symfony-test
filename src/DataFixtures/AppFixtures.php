<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
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
        UserFactory::createOne();
        
        ProductFactory::createMany(8);

        ProductFactory::createMany(4, [
            'user_id' => UserFactory::new()
        ]);
        
    }
}
