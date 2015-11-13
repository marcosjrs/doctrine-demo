<?php
namespace Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 */
class User
{
     
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;
     
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;
    
    /**
     * 
     * @ORM\OneToOne(targetEntity="Address", mappedBy="user", cascade="persist")
     * @var Address|null 
     */
    private $address=null;

    public function __construct($name) {
        $this->setName($name);
    }
     
    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }
     
    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }
     
    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = (string) $name;
    }
    
    /**
     * @param Address $name
     */
    public function setAddress($address) { 
        $this->address = $address;
    }
    
    public function setAddressName($addressName) {        
         $this->address->setName($addressName);
    }
    
    public function getAddress() {        
        return $this->address;
    }
    
    public function getAddressName() {        
        return $this->address->getName();
    }
     
}