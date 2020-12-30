<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\ConsumerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ConsumerRepository::class)
 * @UniqueEntity(fields="email", message="This email address already exists.")
 * @ApiResource(
 *     normalizationContext={"groups"={"consumer:read"}},
 *     denormalizationContext={"groups"={"consumer:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"email": "partial"})
 */
class Consumer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"consumer:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups({"consumer:read", "consumer:write"})
     */
    private $givenName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups({"consumer:read", "consumer:write"})
     */
    private $familyName;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"consumer:read", "consumer:write"})
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $provider;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    public function setGivenName(?string $givenName): self
    {
        $this->givenName = $givenName;

        return $this;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function setFamilyName(?string $familyName): self
    {
        $this->familyName = $familyName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getProvider(): ?Customer
    {
        return $this->provider;
    }

    public function setProvider(?Customer $provider): self
    {
        $this->provider = $provider;

        return $this;
    }
}
