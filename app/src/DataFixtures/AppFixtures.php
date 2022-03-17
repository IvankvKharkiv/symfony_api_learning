<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\ApiPlatformTest;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\MigratingPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\NativePasswordHasher;

// use Symfony\Component\Security\Core\Encoder\MigratingPasswordEncoder;

class AppFixtures extends Fixture
{
    public function __construct()
    {
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 20; $i++) {
            $apiTest = new ApiPlatformTest();
            $apiTest->setTitle('Title_' . $this->generateRandomString(5));
            $apiTest->setDescription('Descr_' . $this->generateRandomString(5));
            $apiTest->setInStock(($i % 2 === 0) ? true : false);
            $apiTest->setPrice(mt_rand(10, 100));
            $apiTest->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($apiTest);
        }

        $user = new User();
        $user->setEmail('sometestemail@gmail.com');
        $passwordEncoder = new MigratingPasswordHasher(new NativePasswordHasher());
//        $argon2id$v=19$m=65536,t=4,p=1$GBVHgEhAIyUg9pkhQw5g4Q$/lQ4G5udeaTATiMhZXmbBodjYlnOlpvuQZKPDgfbbrY
        $user->setPassword($passwordEncoder->hash('123456789'));
        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);
        $manager->flush();
    }

    protected function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
