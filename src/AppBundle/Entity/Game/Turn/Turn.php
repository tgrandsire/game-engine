<?php
namespace AppBundle\Entity\Game\Turn;

use AppBundle\Model\EntityInterface;
use AppBundle\Model\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Turn of a player in a play
 *
 * @ORM\Table(name="turn")
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({
 * 		"turn"   = "AppBundle\Entity\Game\Turn\Turn",
 * 		"scored" = "AppBundle\Entity\Game\Turn\ScoredTurn"
 * })
 */
abstract class Turn implements EntityInterface
{
	use EntityTrait;

	/**
	 * Play
	 *
	 * @var Play
	 */
	protected $play;

	/**
	 * Player
	 *
	 * @var Player
	 */
	protected $player;

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
	public function setPlay(Play $play): Turn
	{
		$this->play = $play;

		return $this;
	}

	/**
	 * Gets its player
	 *
	 * @return Player
	 */
	public function getPlayer(): Player
	{
		return $this->player;
	}

	/**
	 * Sets its player
	 *
	 * @param Player $player
	 *
	 * @return self
	 */
	public function setPlayer(Player $player): Turn
	{
		$this->player = $player;

		return $this;
	}
}
