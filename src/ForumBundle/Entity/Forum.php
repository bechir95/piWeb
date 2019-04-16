<?php

namespace ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Forum
 *
 * @ORM\Table(name="forum", indexes={@ORM\Index(name="fk_user", columns={"user_id"}), @ORM\Index(name="fk_user_liked_form", columns={"liked_id"}), @ORM\Index(name="fk_user_disliked_form", columns={"disliked_id"})})
 * @ORM\Entity(repositoryClass="ForumBundle\Repository\ForumRepository")
 */
class Forum
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return \ForumBundle\Entity\Category
     */
    public function getCategoryId()
    {
        return $this->category;
    }

    /**
     * @param \ForumBundle\Entity\Category $category
     */
    public function setCategoryId($category)
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getSubcategoryId()
    {
        return $this->subcategoryId;
    }

    /**
     * @param int $subcategoryId
     */
    public function setSubcategoryId($subcategoryId)
    {
        $this->subcategoryId = $subcategoryId;
    }

    /**
     * @return int
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param int $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * @return int
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param int $notification
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param int $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \UserBundle\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \ForumBundle\Entity\Dislikedforum
     */
    public function getDisliked()
    {
        return $this->disliked;
    }

    /**
     * @param \ForumBundle\Entity\Dislikedforum $disliked
     */
    public function setDisliked($disliked)
    {
        $this->disliked = $disliked;
    }

    /**
     * @return \ForumBundle\Entity\Likeforum
     */
    public function getLiked()
    {
        return $this->liked;
    }

    /**
     * @param \ForumBundle\Entity\Likeforum $liked
     */
    public function setLiked($liked)
    {
        $this->liked = $liked;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=11, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @var \ForumBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="subcategory_id", type="integer", nullable=true)
     */
    private $subcategoryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="visibility", type="integer", nullable=true)
     */
    private $visibility;

    /**
     * @var integer
     *
     * @ORM\Column(name="notification", type="integer", nullable=true)
     */
    private $notification;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=true)
     */
    private $views;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \ForumBundle\Entity\Dislikedforum
     *
     * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Dislikedforum")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disliked_id", referencedColumnName="disliked_id")
     * })
     */
    private $disliked;

    /**
     * @var \ForumBundle\Entity\Likeforum
     *
     * @ORM\ManyToOne(targetEntity="ForumBundle\Entity\Likeforum")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="liked_id", referencedColumnName="liked_id")
     * })
     */

    private $liked;


    public function __toString() {
        return $this->title;
    }
}

