<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="residences", type="string", length=255, nullable=false)
     */
    private $residences;

    /**
     * @var bool
     *
     * @ORM\Column(name="ascenseurs", type="boolean", nullable=true)
     */
    private $ascenseurs;

    /**
     * @var bool
     *
     * @ORM\Column(name="digicode", type="boolean", nullable=true)
     */
    private $digicode;

    /**
     * @var string
     *
     * @ORM\Column(name="number_digicodes", type="string", length=255, nullable=true)
     */
    private $numberDigicodes;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=15, nullable=false)
     */
    private $tel;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Villes", inversedBy="commandes")
     */
    private $id_villes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etage;
    private $Client;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commandes")
     */
    private $client;

    public function __construct()
    {
        $this->id_villes = new ArrayCollection();
        $this->client = new ArrayCollection();
        $this->Client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResidences(): ?string
    {
        return $this->residences;
    }

    public function setResidences(string $residences): self
    {
        $this->residences = $residences;

        return $this;
    }

    public function getAscenseurs(): ?bool
    {
        return $this->ascenseurs;
    }

    public function setAscenseurs(bool $ascenseurs): self
    {
        $this->ascenseurs = $ascenseurs;

        return $this;
    }

    public function getDigicode(): ?bool
    {
        return $this->digicode;
    }

    public function setDigicode(bool $digicode): self
    {
        $this->digicode = $digicode;

        return $this;
    }

    public function getNumberDigicodes(): ?string
    {
        return $this->numberDigicodes;
    }

    public function setNumberDigicodes(string $numberDigicodes): self
    {
        $this->numberDigicodes = $numberDigicodes;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection|Villes[]
     */
    public function getIdVilles(): Collection
    {
        return $this->id_villes;
    }

    public function addIdVille(Villes $idVille): self
    {
        if (!$this->id_villes->contains($idVille)) {
            $this->id_villes[] = $idVille;
        }

        return $this;
    }

    public function removeIdVille(Villes $idVille): self
    {
        if ($this->id_villes->contains($idVille)) {
            $this->id_villes->removeElement($idVille);
        }
        return $this;
    }

    public function getEtage(): ?string
    {
        return $this->etage;
    }

    public function setEtage(?string $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getClient() {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }
}
