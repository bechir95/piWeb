<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liked
 *
 * @ORM\Table(name="liked", indexes={@ORM\Index(name="fk_liked", columns={"post_id"})})
 * @ORM\Entity
 */
class Liked
{
    /**
     * @var integer
     *
     * @ORM\Column(name="liked_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $likedId;

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

