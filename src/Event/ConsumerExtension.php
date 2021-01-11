<?php

namespace App\Event;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Consumer;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Security;

class ConsumerExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {
        $this->addWhereProviderIs($queryBuilder, $resourceClass);
    }

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = null, array $context = [])
    {
        $this->addWhereProviderIs($queryBuilder, $resourceClass);
    }

    public function addWhereProviderIs(QueryBuilder $queryBuilder, string $resourceClass)
    {
        if ($resourceClass !== Consumer::class) return;

        $rootAlias = $queryBuilder->getRootAliases()[0];
        $queryBuilder
            ->andWhere(sprintf('%s.provider = :provider', $rootAlias))
            ->setParameter('provider', $this->security->getUser()->getId());
    }

}
