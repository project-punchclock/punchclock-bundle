<?php
namespace ProjectPunchclock\Bundle\PunchclockBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Symfony\Component\Validator\Constraints as Assert;
use \Gedmo\Mapping\Annotation as Gedmo;
use \ProjectPunchclock\Bundle\CoreBundle\Traits\BlameableTrait;
use \ProjectPunchclock\Bundle\CoreBundle\Traits\TimestampableTrait;
use \ProjectPunchclock\Bundle\CoreBundle\Traits\SlugableTrait;

/**
 * @ORM\Table(name="punch_type")
 * @ORM\Entity(repositoryClass="\ProjectPunchclock\Bundle\PunchclockBundle\Repsoitory\TypeRepository")
 */
class Type
{
    use BlameableTrait;
    use TimestampableTrait;
    use SluggableTrait;
    
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
     * Description
     * @var string $description
     */
    protected $description;
    
    /**
     * Punches
     * @var \Doctrine\Common\Collections\DoctrineCollection $punches
     * @ORM\OneToMany(targetEntity="\ProjectPunchclockBundle\Bundle\PunchclockBundle\Entity\Punch", mappedBy="type")
     */
    protected $punches;
    
    public function __construct()
    {
        $this->description = null;
        $this->punched = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     * @return type
     */
    public function getId()
    {
        return $this->id;
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
     * Set name
     * @param string $name
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Type
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * Get description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set description
     * @var string $description
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Type
     */
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * Get punches
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPunches()
    {
        return $this->punches;
    }
    
    /**
     * Set punches
     * @param array $punches
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Type
     */
    public function setPunches(array $punches)
    {
        $this->punches = $punches;
        
        return $this;
    }
    
    /**
     * Get punch
     * @param string $punch
     * @return boolean
     */
    public function getPunch($punch)
    {
        if ($this->hasPunch($punch)) {
            return $this->punches[$punch];
        }
        
        return false;
    }
    
    /**
     * Add punch
     * @param \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch $punch
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Type
     */
    public function addPunch(\ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch $punch)
    {
        $this->punches->add($punch);
        
        return $this;
    }
    
    /**
     * Has punch
     * @param string $punch
     * @return boolean
     */
    public function hasPunch($punch)
    {
        return $this->punches->contains($punch);
    }
    
    public function removePunch($punch)
    {
        $this->punches->remove($punch);
    }
}
