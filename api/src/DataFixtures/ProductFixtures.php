<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getProductsDataset() as $productData) {
            $product = new Product;
            $product->setName($productData['name']);
            $product->setBrand($productData['brand']);
            $product->setReleasedAt($productData['releasedAt']);
            $product->setIsAvailable(!(date_diff($productData['releasedAt'], new \DateTime)->days > 365));
            $manager->persist($product);
        }
        $manager->flush();
    }

    public function getProductsDataset(): array
    {
        return [
            [
                'name' => 'Galaxy S',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2010-06-04')
            ],
            [
                'name' => 'Galaxy S2',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2011-05-02')
            ],
            [
                'name' => 'Galaxy S3',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2012-05-29')
            ],
            [
                'name' => 'Galaxy S4',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2013-04-27')
            ],
            [
                'name' => 'Galaxy S5',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2014-04-11')
            ],
            [
                'name' => 'Galaxy S6',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2015-04-10')
            ],
            [
                'name' => 'Galaxy S7',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2016-02-21')
            ],
            [
                'name' => 'Galaxy S8',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2017-04-21')
            ],
            [
                'name' => 'Galaxy S9',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2018-03-16')
            ],
            [
                'name' => 'Galaxy S10',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2019-03-04')
            ],
            [
                'name' => 'Galaxy S20',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2020-02-11')
            ],
            [
                'name' => 'Galaxy S20 Ultra',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2020-02-11')
            ],
            [
                'name' => 'Galaxy Note 20 Ultra 5G',
                'brand' => 'Samsung',
                'releasedAt' => new \DateTimeImmutable('2020-08-21')
            ],
            [
                'name' => 'iPhone',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2008-08-11')
            ],
            [
                'name' => 'iPhone 4S',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2011-10-14')
            ],
            [
                'name' => 'iPhone 5',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2012-09-21')
            ],
            [
                'name' => 'iPhone 5S',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2013-09-20')
            ],
            [
                'name' => 'iPhone 6S',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2015-09-25')
            ],
            [
                'name' => 'iPhone 7',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2016-09-16')
            ],
            [
                'name' => 'iPhone 8',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2017-09-22')
            ],
            [
                'name' => 'iPhone 12',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2020-10-23')
            ],
            [
                'name' => 'iPhone 12 Pro Max',
                'brand' => 'Apple',
                'releasedAt' => new \DateTimeImmutable('2020-11-13')
            ],
            [
                'name' => 'P30 Pro',
                'brand' => 'Huawei',
                'releasedAt' => new \DateTimeImmutable('2019-03-26')
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
            [
                'name' => 'Honor 6X',
                'brand' => 'Huawei',
                'releasedAt' => new \DateTimeImmutable('2017-02-02')
            ],
            [
                'name' => 'Find X2 Lite',
                'brand' => 'Oppo',
                'releasedAt' => new \DateTimeImmutable('2020-07-19')
            ],
            [
                'name' => 'Poco F2 Pro',
                'brand' => 'Xiaomi',
                'releasedAt' => new \DateTimeImmutable('2020-08-09')
            ],
            [
                'name' => '8 Pro',
                'brand' => 'OnePlus',
                'releasedAt' => new \DateTimeImmutable('2020-04-21')
            ],
        ];
    }
}
