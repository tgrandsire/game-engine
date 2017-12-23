<?php
namespace AppBundle\Entity\Game;

use AppBundle\Entity\Game\{Game, Gamer};
use AppBundle\Model\{EntityInterface, EntityTrait};
use Doctrine\ORM\Mapping as ORM;

/**
 * Un participant d'une partie de jeu (Play)
 *
 * @ORM\Table(name="player")
 * @ORM\Entity
 */
class Player implements EntityInterface
{
	use EntityTrait;

	/**
	 * Gamer
	 *
	 * @var Gamer
	 *
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game\Gamer")
     * @ORM\JoinColumn(name="gamer_id", referencedColumnName="id")
	 */
	protected $gamer;

	/**
	 * Play
	 *
	 * @var Play
	 *
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game\Play", inversedBy="players")
     * @ORM\JoinColumn(name="play_id", referencedColumnName="id")
	 */
	protected $play;

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
	public function setPlay(Play $play = null): Player
	{
		$this->play = $play;

		return $this;
	}
}
