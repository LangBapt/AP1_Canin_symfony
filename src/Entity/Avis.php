<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descAvis = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?utilisateur $numUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescAvis(): ?string
    {
        return $this->descAvis;
    }

    public function setDescAvis(?string $descAvis): static
    {
        $this->descAvis = $descAvis;

        return $this;
    }

    public function getNumUser(): ?utilisateur
    {
        return $this->numUser;
    }

    public function setNumUser(?utilisateur $numUser): static
    {
        $this->numUser = $numUser;

        return $this;
    }
}
