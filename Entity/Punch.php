<?php
namespace ProjectPunchclock\Bundle\PunchclockBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Symfony\Component\Validator\Constraints as Assert;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Doctrine\Common\Collections\ArrayCollection;

use \ProjectPunchclock\CoreBundle\Traits\TimestampableTrait;
use \ProjectPunchclock\CoreBundle\Traits\SluggableTrait;
use \ProjectPunchclock\CoreBundle\Traits\CreatedByTrait;

/**
 * @ORM\Table(name="punch")
 * @ORM\Entity(repositoryClass="\ProjectPunchclock\Bundle\PunchclockBundle\Repository\PunchRepository")
 */
class Punch
{
    use TimestampableTrait;
    use SluggableTrait;
    use BlameableTrait;
    
    /**
     * Id
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Name
     * @var string $name
     * @ORM\Column(name="name", type="string", length=150)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * Timestamp
     * @var datetime $timestamp
     * @ORM\Column(name="timestamp", type="timestamp")
     */
    protected $timestamp;

    /**
     * Punch type
     * @var \ProjectPunchclockBundle\Bundle\PunchclockBundle\Entity\Type $type
     * @ORM\ManyToOne(targetEntity="\ProjectPunchclockBundle\Bundle\PunchclockBundle\Entity\Type", inversedBy="punch")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     */
    protected $type;

    /**
     * Message
     * @var string
     * @ORM\Column(name="message", type="text") 
     */
    protected $message;

    /**
     * Project
     * @var \ProjectPunchclockBundle\Bundle\ProjectBundle\Entity\Project $project
     * @ORM\ManyToOne(targetEntity="\ProjectPunchclockBundle\Bundle\ProjectBundle\Entity\Project", inversedBy="punch")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * Punch details
     * @var \Doctrine\Common\Collections\DoctrineCollection $details
     * @ORM\OneToMany(targetEntity="\ProjectPunchclockBundle\Bundle\PunchclockBundle\Entity\Detail", mappedBy="punch")
     */
    protected $details;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->details = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     * @param string $name
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set timestamp
     * @param Timestamp $timestamp
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        
        return $this;
    }

    /**
     * Get timestamp
     * @return timestamp
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set message
     * @param string $message
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch
     */
    public function setMessage($message)
    {
        $this->message = $message;
        
        return $this;
    }

    /**
     * Get message
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set type
     * @param \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Type $type
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch
     */
    public function setType(\ProjectPunchclock\Bundle\PunchclockBundle\Entity\Type $type)
    {
        $this->type = $type;
        
        return $this;
    }

    /**
     * Get type
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set project
     * @param ProjectPunchclock\PunchclockBundle\Entity\Project $project
     * @return Punch
     */
    public function setProject(\ProjectPunchclock\Bundle\ProjectBundle\Entity\Project $project)
    {
        $this->project = $project;
        
        return $this;
    }

    /**
     * Get project
     * @return ProjectPunchclock\PunchclockBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add detail
     * @param \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Detail $detail
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch
     */
    public function addDetail(\ProjectPunchclock\Bundle\PunchclockBundle\Entity\Detail $detail)
    {
        $this->details->add($detail);
        
        return $this;
    }

    /**
     * Remove detail
     * @param ProjectPunchclock\Bundle\PunchclockBundle\Entity\Detail $detail
     */
    public function removeDetail(\ProjectPunchclock\Bundle\PunchclockBundle\Entity\Detail $detail)
    {
        $this->details->remove($detail);
    }

    /**
     * Get details
     * @return ArrayCollection
     */
    public function getDetails()
    {
        return $this->details;
    }
    
    /**
     * Set details
     * @param array $details
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch
     */
    public function setDetails(array $details)
    {
        $this->details = $details;
        
        return $this;
    }
    
    /**
     * Has detail
     * @param string $detail
     * @return boolean
     */
    public function hasDetail($detail)
    {
        return $this->details->contains($detail);
    }
    
    /**
     * Get detail
     * @param string $detail
     * @return boolean
     */
    public function getDetail($detail)
    {
        if ($this->hasDetail($detail)) {
            return $this->deatils[$detail];
        }
        
        return false;
    }
}
