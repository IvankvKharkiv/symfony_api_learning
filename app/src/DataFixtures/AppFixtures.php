<?php

namespace App\DataFixtures;

use App\Entity\ApiPlatformTest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 20; $i++) {
            $apiTest = new ApiPlatformTest();
            $apiTest->setTitle('Title_' . $this->generateRandomString(5));
            $apiTest->setDescription('Descr_' . $this->generateRandomString(5));
            $apiTest->setInStock(($i % 2 == 0) ? true : false);
            $apiTest->setPrice(mt_rand(10, 100));
            $apiTest->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($apiTest);
        }

        $manager->flush();
    }


    protected function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
