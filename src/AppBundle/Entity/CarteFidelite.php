<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarteFidelite
 *
 * @ORM\Table(name="carte_fidelite")
 * @ORM\Entity
 */
class CarteFidelite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="client_id", type="integer", nullable=true)
     */
    private $clientId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Carte_fidelite_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $carteFideliteId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_points", type="integer", nullable=false)
     */
    private $nbrePoints;


}

