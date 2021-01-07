<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Customer;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CustomerFixtures extends Fixture
{
    public const ORANGE = 'orange';
    public const SFR = 'SFR';

    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->customersDataset() as $customerData) {

            $customer = $this->hydrateCustomer($customerData);
            $manager->persist($customer);
            $this->referenceCustomer($customerData['username'], $customer);
        }

        $manager->flush();
    }

    private function referenceCustomer(string $username, Customer $customer): void
    {
        if ($username == 'Orange')
            $this->addReference(self::ORANGE, $customer);

        if ($username == 'SFR')
            $this->addReference(self::SFR, $customer);
    }

    private function hydrateCustomer(array $customerData): Customer
    {
        $customer = new Customer;
        $customer->setUsername($customerData['username']);
        $customer->setPassword($this->passwordEncoder->encodePassword($customer, $customerData['password']));

        return $customer;
    }

    private function customersDataset(): array
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
