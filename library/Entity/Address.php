<?php
namespace Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 */
class Address
{
     
    /**
     * @ORM\Id()
     * @ORM\OneToOne(targetEntity="User")
     */
    private $user;
     
    /**
     * 
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;
    

     
    public function __construct($user,$name) {
        $this->setUser($user);
        $this->setName($name);
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
     * @return string
     */
    public function getUser() {
        return $this->user;
    }
     
    /**
     * @param User $name
     */
    public function setUser($user) {
        $this->user = $user;
    }
     
}