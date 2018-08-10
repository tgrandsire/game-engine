<?php
namespace AppBundle\Entity\Game\Play\Turn;

use AppBundle\Model\{EntityInterface, EntityTrait};
use AppBundle\Entity\Game\Play\Player\Player;
use Doctrine\ORM\Mapping as ORM;

/**
 * Turn of a player in a play
 *
 * @ORM\Table(name="turn")
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({
 * 		"turn"   = "AppBundle\Entity\Game\Play\Turn\Turn",
 * 		"scored" = "AppBundle\Entity\Game\Play\Turn\ScoredTurn"
 * })
 */
abstract class Turn implements EntityInterface
{
	use EntityTrait;

	/**
	 * Play
	 *
	 * @var Play
	 *
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game\Play\Play", inversedBy="turns")
     * @ORM\JoinColumn(name="play_id", referencedColumnName="id")
	 */
	protected $play;

	/**
	 * Player
	 *
	 * @var Player
	 *
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game\Play\Player\Player", inversedBy="turns", cascade={"persist"})
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
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
