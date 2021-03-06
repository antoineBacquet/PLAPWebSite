<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use nullx27\ESI\Models\GetCorporationsCorporationIdOk;

/**
 * user
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
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
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="char_id", type="integer", unique=true)
     */
    private $charId;

    /**
     * @var int
     *
     * @ORM\Column(name="corp_id", type="integer")
     */
    private $corpId;

    /**
     * @var int
     *
     * @ORM\ManyToMany(targetEntity="Groupe", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */

    private $groupes;

    /**
     * @var GetCorporationsCorporationIdOk
     */
    public $corp;

    /**
     * @ORM\OneToMany(targetEntity="CharApi", mappedBy="user")
     */
    private $apis;

    /**
     * @var string
     *
     * @ORM\Column(name="discord_random_string", type="string", unique=false)
     */
    private $discordRandomString;


    /**
     * @var int
     *
     * @ORM\Column(name="discord_id", type="bigint", unique=false, nullable=true)
     */
    private $discordId;

    public $isMember = false;

    public $isAdmin = false;

    public $isProdResp = false;


    public function __construct()
    {

        $this->groupes = new  ArrayCollection();
        $this->apis = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
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
     * Set charId
     *
     * @param integer $charId
     *
     * @return user
     */
    public function setCharId($charId)
    {
        $this->charId = $charId;

        return $this;
    }

    /**
     * Get charId
     *
     * @return int
     */
    public function getCharId()
    {
        return $this->charId;
    }

    /**
     * Set corpId
     *
     * @param integer $corpId
     *
     * @return user
     */
    public function setCorpId($corpId)
    {
        $this->corpId = $corpId;

        return $this;
    }

    /**
     * Get corpId
     *
     * @return int
     */
    public function getCorpId()
    {
        return $this->corpId;
    }

    /**
     * Set groupe
     *
     * @param ArrayCollection $groupes
     * @return User
     */
    public function setGroupes($groupes)
    {
        $this->groupes = $groupes;

        return $this;
    }

    /**
     * Get groupe
     *
     * @return array(Groupe)
     */
    public function getGroupes()
    {
        return $this->groupes;
    }

    public function __toString() {
        return $this->id.'';
    }

    /**
     * Add groupe
     *
     * @param \AppBundle\Entity\Groupe $groupe
     *
     * @return User
     */
    public function addGroupe(\AppBundle\Entity\Groupe $groupe)
    {
        $this->groupes[] = $groupe;

        return $this;
    }

    /**
     * Remove groupe
     *
     * @param \AppBundle\Entity\Groupe $groupe
     */
    public function removeGroupe(\AppBundle\Entity\Groupe $groupe)
    {
        $this->groupes->removeElement($groupe);
    }

    /**
     * Add api
     *
     * @param \AppBundle\Entity\CharApi $api
     *
     * @return User
     */
    public function addApi(\AppBundle\Entity\CharApi $api)
    {
        $this->apis[] = $api;

        return $this;
    }

    /**
     * Remove api
     *
     * @param \AppBundle\Entity\CharApi $api
     */
    public function removeApi(\AppBundle\Entity\CharApi $api)
    {
        $this->apis->removeElement($api);
    }

    /**
     * Get apis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApis()
    {
        return $this->apis;
    }

    /**
     * Set discordRandomString
     *
     * @param string $discordRandomString
     *
     * @return User
     */
    public function setDiscordRandomString($discordRandomString)
    {
        $this->discordRandomString = $discordRandomString;

        return $this;
    }

    /**
     * Get discordRandomString
     *
     * @return string
     */
    public function getDiscordRandomString()
    {
        return $this->discordRandomString;
    }

    /**
     * Set discordId
     *
     * @param integer $discordId
     *
     * @return User
     */
    public function setDiscordId($discordId)
    {
        $this->discordId = $discordId;

        return $this;
    }

    /**
     * Get discordId
     *
     * @return integer
     */
    public function getDiscordId()
    {
        return $this->discordId;
    }
}
