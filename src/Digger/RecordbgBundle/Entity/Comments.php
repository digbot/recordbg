<?php

namespace Digger\RecordbgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Digger\RecordbgBundle\Entity\Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity
 */
class Comments
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $comment
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var \DateTime $created
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var string $ip
     *
     * @ORM\Column(name="ip", type="string", length=20, nullable=true)
     */
    private $ip;

    /**
     * @var integer $statcode
     *
     * @ORM\Column(name="statcode", type="integer", nullable=true)
     */
    private $statcode;

    /**
     * @var Objects
     *
     * @ORM\ManyToOne(targetEntity="Objects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     * })
     */
    private $object;




    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Comments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Comments
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Comments
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set statcode
     *
     * @param integer $statcode
     * @return Comments
     */
    public function setStatcode($statcode)
    {
        $this->statcode = $statcode;
    
        return $this;
    }

    /**
     * Get statcode
     *
     * @return integer 
     */
    public function getStatcode()
    {
        return $this->statcode;
    }

    /**
     * Set object
     *
     * @param Digger\RecordbgBundle\Entity\Objects $object
     * @return Comments
     */
    public function setObject(\Digger\RecordbgBundle\Entity\Objects $object = null)
    {
        $this->object = $object;
    
        return $this;
    }

    /**
     * Get object
     *
     * @return Digger\RecordbgBundle\Entity\Objects 
     */
    public function getObject()
    {
        return $this->object;
    }
  
}