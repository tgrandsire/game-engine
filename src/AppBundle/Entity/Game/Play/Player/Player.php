<?php
namespace AppBundle\Entity\Game\Play\Player;

use ApiPlatform\Core\Annotation\{ApiProperty, ApiResource, ApiSubresource};
use AppBundle\Entity\Game\{Game, Gamer};
use AppBundle\Entity\Game\Play\Play;
use AppBundle\Model\Game\PlayerInterface;
use AppBundle\Model\{EntityInterface, EntityTrait};
use Doctrine\ORM\Mapping as ORM;

/**
 * Un participant d'une partie de jeu (Play)
 *
 * @ORM\Table(name="player")
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({
 * 		"named" = "AppBundle\Entity\Game\Play\Player\NamedPlayer",
 * 		"gamer" = "AppBundle\Entity\Game\Play\Player\GamerPlayer"
 * })
 */
abstract class Player implements
	EntityInterface,
	PlayerInterface
{
	use EntityTrait;

	/**
	 * Play
	 *
	 * @var Play
	 *
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game\Play\Play", inversedBy="players")
     * @ORM\JoinColumn(name="play_id", referencedColumnName="id")
	 */
	protected $play;

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
