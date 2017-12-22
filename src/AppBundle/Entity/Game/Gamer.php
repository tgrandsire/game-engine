<?php
namespace AppBundle\Entity\Game;

use AppBundle\Entity\User;
use AppBundle\Entity\Game\Gamer;
use AppBundle\Model\EntityInterface;
use AppBundle\Model\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

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
	 * @ORM\Column(name="pasudo", type="string", length=255, unique=true)
	 */
	protected $pseudo;

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
	 * Gets its pseudo
	 *
	 * @return string
	 */
	public function getPseudo(): string
	{
		return $this->pseudo;
	}

	/**
	 * Sets its pseudo
	 *
	 * @param string $pseudo
	 *
	 * return self
	 */
	public function setPseudo(string $pseudo): Gamer
	{
		$this->pseudo = $pseudo;

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
	}
}
