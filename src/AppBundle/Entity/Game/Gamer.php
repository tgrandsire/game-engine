<?php
namespace AppBundle\Entity\Game;

use AppBundle\Entity\User;

/**
 * Un joueur (compte de jeu)
 */
class Gamer
{
	/**
	 * Id
	 *
	 * @var integer
	 */
	protected $id;

	/**
	 * Pseudo
	 *
	 * @var string
	 */
	protected $pseudo;

	/**
	 * User
	 *
	 * @var User
	 */
	protected $user;

	/**
	 * Gets its id
	 *
	 * @return integer
	 */
	public function getId(): integer
	{
		return $this->id;
	}

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
