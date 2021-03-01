<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $temperature;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $duree_fonctionnement;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $donnees_envoyees;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat_de_marche;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(?float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getDureeFonctionnement(): ?float
    {
        return $this->duree_fonctionnement;
    }

    public function setDureeFonctionnement(?float $duree_fonctionnement): self
    {
        $this->duree_fonctionnement = $duree_fonctionnement;

        return $this;
    }

    public function getDonneesEnvoyees(): ?float
    {
        return $this->donnees_envoyees;
    }

    public function setDonneesEnvoyees(?float $donnees_envoyees): self
    {
        $this->donnees_envoyees = $donnees_envoyees;

        return $this;
    }

    public function getEtatDeMarche(): ?bool
    {
        return $this->etat_de_marche;
    }

    public function setEtatDeMarche(bool $etat_de_marche): self
    {
        $this->etat_de_marche = $etat_de_marche;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
