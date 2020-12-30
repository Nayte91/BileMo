<?php

namespace App\DataFixtures;

use App\Entity\Consumer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConsumerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getConsumersDataset() as $consumerData) {
            $consumer = new Consumer;
            $consumer->setGivenName($consumerData['givenName']);
            $consumer->setFamilyName($consumerData['familyName']);
            $consumer->setEmail($consumerData['email']);
            $consumer->setProvider($this->getReference(CustomerFixtures::ORANGE));
            $manager->persist($consumer);
        }

        $manager->flush();
    }

    public function getConsumersDataset(): array
    {
        return [
            [
                'givenName' => 'Julien',
                'familyName' => 'Robic',
                'email' => 'robic.julien@free.fr'
            ],
            [
                'givenName' => 'Mickael',
                'familyName' => 'Maillot',
                'email' => 'mickael.maillot@gmail.com'
            ],
            [
                'givenName' => 'Yann',
                'familyName' => 'Le Breton',
                'email' => 'nayn0@gmail.com'
            ],
            [
                'givenName' => 'Alan',
                'familyName' => 'Le Breton',
                'email' => 'tipiak@aol.com'
            ],
            [
                'givenName' => 'Julien',
                'familyName' => 'Chevalier',
                'email' => 'chevalier.juju@gmail.com'
            ],
            [
                'givenName' => 'Carole',
                'familyName' => 'Tessier',
                'email' => 'carole.tessier@orange.fr'
            ],
            [
                'givenName' => 'Vincent',
                'familyName' => 'Morel',
                'email' => 'morel.mail@gmail.com'
            ],
            [
                'givenName' => 'Antoine',
                'familyName' => 'Louppe',
                'email' => 'perno@free.fr'
            ],
            [
                'givenName' => 'Jérémy',
                'familyName' => 'Yardin',
                'email' => 'meuble@club-internet.fr'
            ],
            [
                'givenName' => 'Grégory',
                'familyName' => 'Girbeau',
                'email' => 'folken@altis-group.fr'
            ],
            [
                'givenName' => 'Alexandre',
                'familyName' => 'Bousquet',
                'email' => 'alexandre.kangoo@orange.fr'
            ],
            [
                'givenName' => 'Chloé',
                'familyName' => 'Huismann',
                'email' => 'poupey@orange.com'
            ],
            [
                'givenName' => 'Chloé',
                'familyName' => 'Lobre',
                'email' => 'nyoww@gmail.com'
            ],
            [
                'givenName' => 'Merwan',
                'familyName' => 'Chabane',
                'email' => 'mecanique.celeste@wanadoo.fr'
            ],
            [
                'givenName' => 'Nicolas',
                'familyName' => 'Ozoux',
                'email' => 'panpan.tkd@severac.fr'
            ],
            [
                'givenName' => 'Joanna',
                'familyName' => 'Rodary',
                'email' => 'rodary.jo@aol.com'
            ],
            [
                'givenName' => 'Lionel',
                'familyName' => 'Duhameau',
                'email' => 'bosu@wanadoo.fr'
            ],
        ];
    }

    public function getDependencies()
    {
        return array(
            CustomerFixtures::class,
        );
    }
}
