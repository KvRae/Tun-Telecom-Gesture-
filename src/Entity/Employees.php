<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Employees
 *
 * @ORM\Table(name="employees", uniqueConstraints={@ORM\UniqueConstraint(name="matricule", columns={"matricule"})})
 * @ORM\Entity
 * @UniqueEntity(
 *     fields={"matricule"},
 *     message="الرقم الترتيبي موجود في القائمة"
 * )
 */
class Employees
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
     * @var int
     *
     * @ORM\Column(name="matricule", type="integer", nullable=false)
     * @Assert\NotBlank(message="الرقم الترتيبي مطلوب")
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="اللقب مطلوب")
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="الإسم مطلوب")
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="plan", type="string", length=255, nullable=true)
     */
    private $plan;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_break", type="string", length=255, nullable=true)
     */
    private $dateBreak;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_Eid", type="string", length=255, nullable=true)
     */
    private $dateEid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="travaux_faits", type="string", length=255, nullable=true)
     */
    private $travauxFaits;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_travaux", type="string", length=255, nullable=true)
     */
    private $dateTravaux;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse_travaux", type="string", length=255, nullable=true)
     */
    private $adresseTravaux;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?int
    {
        return $this->matricule;
    }

    public function setMatricule(int $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function setPlan(?string $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    public function getDateBreak(): ?string
    {
        return $this->dateBreak;
    }

    public function setDateBreak(?string $dateBreak): self
    {
        $this->dateBreak = $dateBreak;

        return $this;
    }

    public function getDateEid(): ?string
    {
        return $this->dateEid;
    }

    public function setDateEid(?string $dateEid): self
    {
        $this->dateEid = $dateEid;

        return $this;
    }

    public function getTravauxFaits(): ?string
    {
        return $this->travauxFaits;
    }

    public function setTravauxFaits(?string $travauxFaits): self
    {
        $this->travauxFaits = $travauxFaits;

        return $this;
    }

    public function getDateTravaux(): ?string
    {
        return $this->dateTravaux;
    }

    public function setDateTravaux(?string $dateTravaux): self
    {
        $this->dateTravaux = $dateTravaux;

        return $this;
    }

    public function getAdresseTravaux(): ?string
    {
        return $this->adresseTravaux;
    }

    public function setAdresseTravaux(?string $adresseTravaux): self
    {
        $this->adresseTravaux = $adresseTravaux;

        return $this;
    }


}
