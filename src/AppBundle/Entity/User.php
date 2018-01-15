<?php
namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use AppBundle\Entity\Game\Gamer;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * ! CANNOT implements EntityInterface neither use EntityTrait !
 *
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 *
 * @ApiResource(
 *     attributes={
 *         "normalization_context"={"groups"={"user", "user-read"}},
 *         "denormalization_context"={"groups"={"user", "user-write"}}
 *     },
 *     collectionOperations={
 *         "get"={"method"="GET", "access_control"="is_granted('ROLE_ADMIN')"}
 *     },
 *     itemOperations={
 *         "get"={"method"="GET", "access_control"="is_granted('ROLE_ADMIN') or object.getId() == user.getId()"}
 *     }
 * )
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Assert\Length(min=3, minMessage="Your name must be at least 3 characters long", max=100, maxMessage="Your name must be at most 100 characters long")
     *
     * @Groups({"user", "game"})
     */
    protected $fullname;

    /**
     * @Groups({"user"})
     */
    protected $email;

    /**
     * @Groups({"user-write"})
     */
    protected $plainPassword;

    /**
     * @Groups({"user"})
     */
    protected $username;

    /**
     * Gamer
     *
     * @var Gamer
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Game\Gamer", mappedBy="user")
     */
    protected $gamer = null;

    /**
     * Gets its id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Sets its fullname
     *
     * @param string $fullname
     *
     * @return self
     */
    public function setFullname($fullname): User
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Gets its fullname
     *
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * Returns whether is a User
     *
     * @param  UserInterface|null $user
     *
     * @return boolean
     */
    public function isUser(UserInterface $user = null): bool
    {
        return $user instanceof self && $user->id === $this->id;
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
