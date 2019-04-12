<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disliked
 *
 * @ORM\Table(name="disliked", indexes={@ORM\Index(name="fk_disliked", columns={"post_id"})})
 * @ORM\Entity
 */
class Disliked
{
    /**
     * @var integer
     *
     * @ORM\Column(name="disliked_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dislikedId;

    /**
     * @var integer
     *
     * @ORM\Column(name="post_id", type="integer", nullable=false)
     */
    private $postId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;


}

