<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Customer;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CustomerFixtures extends Fixture
{
    public const ORANGE = 'orange';

    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->customersDataset() as $customerData) {
            $customer = new Customer();
            $customer->setUsername($customerData['username']);
            $customer->setPassword($this->passwordEncoder->encodePassword($customer, $customerData['password']));
            $manager->persist($customer);

            if ($customerData['username'] == 'Orange')
                $this->addReference(self::ORANGE, $customer);
        }

        $manager->flush();
    }

    public function customersDataset(): array
    {
        return [
            [
                'username' => 'Orange',
                'password' => 'azerty',
            ],
            [
                'username' => 'SFR',
                'password' => 'qwerty'
            ],
        ];
    }
}
