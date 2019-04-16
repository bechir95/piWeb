<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneCommandes
 *
 * @ORM\Table(name="ligne_commandes")
 * @ORM\Entity
 */
class LigneCommandes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixTotal", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixtotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrArticle", type="integer", nullable=true)
     */
    private $nbrarticle;

    /**
     * @var integer
     *
     * @ORM\Column(name="idProduit", type="integer", nullable=true)
     */
    private $idproduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="idclient", type="integer", nullable=true)
     */
    private $idclient;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCommande", type="integer", nullable=true)
     */
    private $idcommande;


}

