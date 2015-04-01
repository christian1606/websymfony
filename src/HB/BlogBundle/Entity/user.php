<?php
namespace HB\BlogBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * user
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HB\BlogBundle\Entity\userRepository")
 */
class user
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Length(
     *      min = "2",
     *      max = "120",
     *      minMessage = "Votre nom doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255)
     * @Assert\Length(
     *      min = "2",
     *      max = "12",
     *      minMessage = "Votre login doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre login ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\Length(
     *      min = "8",
     *      max = "20",
     *      minMessage = "Votre mot de passe doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre mot de passe ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date")
     * @Assert\Date()
     */
    private $birthDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     * @Assert\DateTime()
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastEditTime", type="datetime")
     * @Assert\DateTime()
     */
    private $lastEditTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     *  
     */
    private $enabled;
    
    
     /**
     * @var Article[]
     * 
     * @ORM\OneToMany(targetEntity="Article", mappedBy="author")
     * articles du user
     */
    private $articles;

     /**
     * 
     * 
     * 
     */
    public function __construct() {
        //valeur par defaut ds le formulaire
        $this->creationDate = new \DateTime();
        //$this->lastEditTime = new \DateTime();
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
     * Set name
     *
     * @param string $name
     * @return user
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return user
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return user
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return user
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return user
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return user
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set lastEditTime
     *
     * @param \DateTime $lastEditTime
     * @return user
     */
    public function setLastEditTime($lastEditTime)
    {
        $this->lastEditTime = $lastEditTime;

        return $this;
    }

    /**
     * Get lastEditTime
     *
     * @return \DateTime 
     */
    public function getLastEditTime()
    {
        return $this->lastEditTime;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return user
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Add article
     *
     * @param \HB\BlogBundle\Entity\Article $article
     * @return user
     */
    public function addArticle(\HB\BlogBundle\Entity\Article $article)
    {
        $article->setAuthor($this);
        $this->articles[] = $article;     

        return $this;
    }

    /**
     * Remove article
     *
     * @param \HB\BlogBundle\Entity\Article $article
     */
    public function removeArticle(\HB\BlogBundle\Entity\Article $article)
    {
        $article->setAuthor(null);
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArticles()
    {
        return $this->articles;
    }
}
