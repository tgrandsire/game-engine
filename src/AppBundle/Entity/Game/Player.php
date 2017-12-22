<?php
namespace AppBundle\Entity\Game;

use AppBundle\Entity\Game\{Game, Gamer};

/**
 * Un participant d'une partie de jeu (Play)
 */
class Player
{
	/**
	 * Id
	 *
	 * @var integer
	 */
	protected $id;

	/**
	 * Gamer
	 *
	 * @var Gamer
	 */
	protected $gamer;

	/**
	 * Play
	 *
	 * @var Play
	 */
	protected $play;

	/**
	 * Sets its id
	 *
	 * @return integer
	 */
	public function getId(): integer
	{
		return $this->id;
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
	 * Sets its Gamer
	 *
	 * @param Gamer $gamer
	 *
	 * @return self
	 */
	public function setGamer(Gamer $gamer): Player
	{
		$this->gamer = $gamer;

		return $this;
	}

	/**
	 * Gets its play
	 *
	 * @return Play
	 */
	public function getPlay(): Play
	{
		return $this->play;
	}

	/**
	 * Sets its play
	 *
	 * @param Play $play
	 *
	 * @return self
	 */
	public function setPlay(Play $play): Player
	{
		$this->play = $play;

		return $this;
	}
}
