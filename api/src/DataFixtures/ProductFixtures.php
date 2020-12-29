<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->ProductsDataset() as $productData) {
            $product = new Product;
            $product->setName($productData['name']);
            $product->setBrand($productData['brand']);
            $product->setReleasedAt($productData['releasedAt']);
            $product->setIsAvailable((bool)random_int(0, 1));
            $manager->persist($product);
        }
        $manager->flush();
    }

    public function ProductsDataset(): array
    {
        return [
            [
                'name' => 'Galaxy S5',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2014-04-11')
            ],
            [
                'name' => 'iPhone 12',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2020-10-23')
            ],
            [
                'name' => 'P30 Pro',
                'brand' => 'Huawei',
                'releasedAt' => new \DateTimeImmutable('2019-03-26')
            ],
            [
                'name' => 'iPhone 5',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2012-09-21')
            ],
            [
                'name' => 'Mi 10T Pro',
                'brand' => 'Xiaomi',
                'releasedAt' => new \DateTimeImmutable('2020-09-30')
            ],
            [
                'name' => 'Galaxy S20',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2020-02-11')
            ],
            [
                'name' => 'Pixel 5',
                'brand' => 'Google',
                'releasedAt' => new \DateTimeImmutable('2020-10-15')
            ],
            [
                'name' => 'Xperia 1 mark II',
                'brand' => 'Sony',
                'releasedAt' => new \DateTimeImmutable('2020-05-22')
            ],
        ];
    }
}
