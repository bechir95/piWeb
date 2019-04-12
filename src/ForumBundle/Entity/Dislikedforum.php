<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dislikedforum
 *
 * @ORM\Table(name="dislikedforum", indexes={@ORM\Index(name="fk_forum_disliked", columns={"forum_id"}), @ORM\Index(name="fk_user_disliked", columns={"user_id"})})
 * @ORM\Entity
 */
class Dislikedforum
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
    public function getDislikedId()
    {
        return $this->dislikedId;
    }

    /**
     * @param int $dislikedId
     */
    public function setDislikedId($dislikedId)
    {
        $this->dislikedId = $dislikedId;
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

