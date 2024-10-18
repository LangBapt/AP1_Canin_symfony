<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestationRepository::class)]
class Prestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titrePresta = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $textePresta = null;

    #[ORM\Column(nullable: true)]
    private ?float $prixHorairePresta = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrePresta(): ?string
    {
        return $this->titrePresta;
    }

    public function setTitrePresta(?string $titrePresta): static
    {
        $this->titrePresta = $titrePresta;

        return $this;
    }

    public function getTextePresta(): ?string
    {
        return $this->textePresta;
    }

    public function setTextePresta(?string $textePresta): static
    {
        $this->textePresta = $textePresta;

        return $this;
    }

    public function getPrixHorairePresta(): ?float
    {
        return $this->prixHorairePresta;
    }

    public function setPrixHorairePresta(?float $prixHorairePresta): static
    {
        $this->prixHorairePresta = $prixHorairePresta;

        return $this;
    }
}
