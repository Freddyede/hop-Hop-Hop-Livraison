<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_6EEAA67DB2B59251", columns={"code_postal_id"})})
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
     * @ORM\Column(name="ascenseurs", type="boolean", nullable=false)
     */
    private $ascenseurs;

    /**
     * @var bool
     *
     * @ORM\Column(name="digicode", type="boolean", nullable=false)
     */
    private $digicode;

    /**
     * @var string
     *
     * @ORM\Column(name="number_digicodes", type="string", length=255, nullable=false)
     */
    private $numberDigicodes;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=15, nullable=false)
     */
    private $tel;

    /**
     * @var \Villes
     *
     * @ORM\ManyToOne(targetEntity="Villes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="code_postal_id", referencedColumnName="id")
     * })
     */
    private $codePostal;

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

    public function getCodePostal(): ?Villes
    {
        return $this->codePostal;
    }

    public function setCodePostal(?Villes $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }


}
