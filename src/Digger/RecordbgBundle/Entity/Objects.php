<?php

namespace Digger\RecordbgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Digger\RecordbgBundle\Entity\Objects
 *
 * @ORM\Table(name="objects")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Digger\RecordbgBundle\Repository\RecordbgRepository")
 */
class Objects
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=true)
     */
    private $title;

    /**
     * @var string $info
     *
     * @ORM\Column(name="info", type="text", nullable=true)
     */
    private $info;

    /**
     * @var integer $hits
     *
     * @ORM\Column(name="hits", type="integer", nullable=true)
     */
    private $hits;

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
     * @var string $from
     *
     * @ORM\Column(name="from", type="string", length=255, nullable=false)
     */
    private $from;

    /**
     * @var Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cat_id", referencedColumnName="id")
     * })
     */
    private $cat;
    
    /**
     * @ORM\OneToMany(targetEntity="Comments", mappedBy="object")
     **/
    private $comments;
   
    public function getComments()
    {
        return $this->comments;
    }

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
     * Set title
     *
     * @param string $title
     * @return Objects
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return Objects
     */
    public function setInfo($info)
    {
        $this->info = $info;
    
        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set hits
     *
     * @param integer $hits
     * @return Objects
     */
    public function setHits($hits)
    {
        $this->hits = $hits;
    
        return $this;
    }

    /**
     * Get hits
     *
     * @return integer 
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Objects
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
     * @return Objects
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
     * @return Objects
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
     * Set from
     *
     * @param string $from
     * @return Objects
     */
    public function setFrom($from)
    {
        $this->from = $from;
    
        return $this;
    }

    /**
     * Get from
     *
     * @return string 
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set cat
     *
     * @param Digger\RecordbgBundle\Entity\Categories $cat
     * @return Objects
     */
    public function setCat(\Digger\RecordbgBundle\Entity\Categories $cat = null)
    {
        $this->cat = $cat;
    
        return $this;
    }

    /**
     * Get cat
     *
     * @return Digger\RecordbgBundle\Entity\Categories 
     */
    public function getCat()
    {
        return $this->cat;
    }
    	
	public function getShortInfo()
    {
		return substr(iconv('UTF-8', 'UTF-8', $this->info),0,200);
    }
    
    public function count()
    {
        return 0;
    } 
}