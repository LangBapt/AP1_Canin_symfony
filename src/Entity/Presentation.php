<?php

namespace App\Entity;

use App\Repository\PresentationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PresentationRepository::class)]
class Presentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $textePresentation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titrePresentation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextePresentation(): ?string
    {
        return $this->textePresentation;
    }

    public function setTextePresentation(?string $textePresentation): static
    {
        $this->textePresentation = $textePresentation;

        return $this;
    }

    public function getTitrePresentation(): ?string
    {
        return $this->titrePresentation;
    }

    public function setTitrePresentation(?string $titrePresentation): static
    {
        $this->titrePresentation = $titrePresentation;

        return $this;
    }
}
