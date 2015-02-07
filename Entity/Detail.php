<?php
namespace ProjectPunchclock\Bundle\PunchclockBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Symfony\Component\Validator\Constraints as Assert;
use \Gedmo\Mapping\Annotation as Gedmo;

use \ProjectPunchclock\Bundle\CoreBundle\Traits\BlameableTrait;
use \ProjectPunchclock\Bundle\CoreBundle\Traits\TimestampableTrait;
use \ProjectPunchclock\Bundle\CoreBundle\Traits\SluggableTrait;

/**
 * @ORM\Table(name="punch_detail")
 * @ORM\Entity(repositoryClass="\ProjectPunchclock\Bundle\PunchclockBundle\Repository\DetailRepository")
 */
class Detail
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
     * @var string
     * @ORM\Column(name="name", type="string")
     */
    protected $name;
    
    /**
     * Value
     * @var string
     * @ORM\Column(name="value", type="string")
     */
    protected $value;
    
    /**
     * Punch
     * @var \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch
     * @ORM\ManyToOne(targetEntity="\ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch", inversedBy="detail")
     * @ORM\JoinColumn(name="punch_id", referencedColumnName="id")
     */
    protected $punch;
    
    /**
     * Get id
     * @return integer
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
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Detail
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * Get value
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * Set value
     * @param string $value
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Detail
     */
    public function setValue($value)
    {
        $this->value = $value;
        
        return $this;
    }
    
    /**
     * Get punch
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Punch
     */
    public function getPunch()
    {
        return $this->punch;
    }
    
    /**
     * Set punch
     * @param \ProjctPunchclock\Bundle\PunchclockBuncle\Entity\Punch $punch
     * @return \ProjectPunchclock\Bundle\PunchclockBundle\Entity\Detail
     */
    public function setPunch(\ProjctPunchclock\Bundle\PunchclockBuncle\Entity\Punch $punch)
    {
        $this->punch = $punch;
        
        return $this;
    }
}
