<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenomContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseContact = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $cpContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $villeContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mailContact = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $numTelContact = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $messageContact = null;

    #[ORM\ManyToOne(inversedBy: 'contacts')]
    private ?user $numUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(?string $nomContact): static
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(?string $prenomContact): static
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getAdresseContact(): ?string
    {
        return $this->adresseContact;
    }

    public function setAdresseContact(?string $adresseContact): static
    {
        $this->adresseContact = $adresseContact;

        return $this;
    }

    public function getCpContact(): ?string
    {
        return $this->cpContact;
    }

    public function setCpContact(?string $cpContact): static
    {
        $this->cpContact = $cpContact;

        return $this;
    }

    public function getVilleContact(): ?string
    {
        return $this->villeContact;
    }

    public function setVilleContact(?string $villeContact): static
    {
        $this->villeContact = $villeContact;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->mailContact;
    }

    public function setMailContact(?string $mailContact): static
    {
        $this->mailContact = $mailContact;

        return $this;
    }

    public function getNumTelContact(): ?string
    {
        return $this->numTelContact;
    }

    public function setNumTelContact(?string $numTelContact): static
    {
        $this->numTelContact = $numTelContact;

        return $this;
    }

    public function getMessageContact(): ?string
    {
        return $this->messageContact;
    }

    public function setMessageContact(?string $messageContact): static
    {
        $this->messageContact = $messageContact;

        return $this;
    }

    public function getNumUser(): ?user
    {
        return $this->numUser;
    }

    public function setNumUser(?user $numUser): static
    {
        $this->numUser = $numUser;

        return $this;
    }
}
