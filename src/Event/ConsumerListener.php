<?php


namespace App\Event;

use App\Entity\Consumer;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Security;

class ConsumerListener
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function putProviderToConsumer(Consumer $consumer, LifecycleEventArgs $event)
    {
        if ('cli' == php_sapi_name()) return;

        $consumer->setProvider($this->security->getUser());
    }
}