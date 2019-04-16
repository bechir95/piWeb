<?php

namespace ServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Service
 *
 * @ORM\Table(name="service", indexes={@ORM\Index(name="fk_service_gardener", columns={"gardener_id"})})
 * @ORM\Entity
 */
class Servic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="service_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $serviceId;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \ServiceBundle\Entity\Gardener
     *
     * @ORM\ManyToOne(targetEntity="ServiceBundle\Entity\Gardener")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gardener_id", referencedColumnName="id")
     * })
     */
    private $gardener;

    /**
     * @return int
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * @param int $serviceId
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \ServiceBundle\Entity\Gardener
     */
    public function getGardener()
    {
        return $this->gardener;
    }

    /**
     * @param \ServiceBundle\Entity\Gardener $gardener
     */
    public function setGardener($gardener)
    {
        $this->gardener = $gardener;
    }


    public function __toString() {
        return $this->libelle;
    }
}

