<?php
/**
 * Created by PhpStorm.
 * User: Mouheb-PC
 * Date: 3/31/2019
 * Time: 10:00 AM
 */

namespace FaqBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="fk_keyword", columns={"keyword_id"})})
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="post_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $postId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @var integer
     *
     * @ORM\Column(name="keyword_id", type="integer", nullable=true)
     */
    private $keywordId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=true)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="liked_id", type="integer", nullable=false)
     */
    private $likedId;

    /**
     * @var integer
     *
     * @ORM\Column(name="disliked_id", type="integer", nullable=false)
     */
    private $dislikedId;

    /**
     * @return int
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
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
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

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
     * @return int
     */
    public function getKeywordId()
    {
        return $this->keywordId;
    }

    /**
     * @param int $keywordId
     */
    public function setKeywordId($keywordId)
    {
        $this->keywordId = $keywordId;
    }



}

