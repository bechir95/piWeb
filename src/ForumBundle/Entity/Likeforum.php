<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Likeforum
 *
 * @ORM\Table(name="likeforum", indexes={@ORM\Index(name="fk_forum_liked", columns={"forum_id"}), @ORM\Index(name="fk_user_liked", columns={"user_id"})})
 * @ORM\Entity
 */
class Likeforum
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
     * @var \ForumBundle\Entity\Forum
     *
     * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Forum")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forum_id", referencedColumnName="id")
     * })
     */
    private $forum;

    /**
     * @var \AppBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @return int
     */
    public function getLikedId()
    {
        return $this->likedId;
    }

    /**
     * @param int $likedId
     */
    public function setLikedId($likedId)
    {
        $this->likedId = $likedId;
    }

    /**
     * @return Forum
     */
    public function getForum()
    {
        return $this->forum;
    }

    /**
     * @param Forum $forum
     */
    public function setForum($forum)
    {
        $this->forum = $forum;
    }

    /**
     * @return \AppBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \AppBundle\Entity\FosUser $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


}

