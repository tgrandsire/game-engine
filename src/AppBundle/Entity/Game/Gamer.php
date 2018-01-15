<?php
namespace AppBundle\Entity\Game;

use AppBundle\Entity\User;
use AppBundle\Entity\Game\Gamer;
use AppBundle\Model\{EntityInterface, EntityTrait};
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Un joueur (compte de jeu)
 *
 * @ORM\Table(name="gamer")
 * @ORM\Entity
 */
class Gamer implements EntityInterface
{
	use EntityTrait;

	/**
	 * Pseudo
	 *
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255, unique=true)
	 * @Assert\NotBlank
	 *
	 * @Groups({"play"})
	 */
	protected $name;

	/**
	 * User
	 *
	 * @var User
	 *
	 * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", inversedBy="gamer")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 */
	protected $user;

	/**
	 * Gets its name
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Sets its name
	 *
	 * @param string $name
	 *
	 * return self
	 */
	public function setName(string $name): Gamer
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Gets its user
	 *
	 * @return User
	 */
	public function getUser(): User
	{
		return $this->user;
	}

	/**
	 * Sets its user
	 *
	 * @param User $user
	 *
	 * @return self
	 */
	public function setUser(User $user): Gamer
	{
		$this->user = $user;

		return $this;
	}
}
