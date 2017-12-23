<?php
namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use AppBundle\Entity\Game\Gamer;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 *
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"user", "user-read"}},
 *     "denormalization_context"={"groups"={"user", "user-write"}}
 * })
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Gamer
     *
     * @var Gamer
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Game\Gamer", mappedBy="user")
     */
    protected $gamer = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Gets its gamer
     *
     * @return Gamer
     */
    public function getGamer(): Gamer
    {
        return $this->gamer;
    }

    /**
     * Sets its gamer
     *
     * @param Gamer $gamer
     *
     * @return self
     */
    public function setGamer(Gamer $gamer): User
    {
        $this->gamer = $gamer;

        return $this;
    }
}
