<?php
namespace AppBundle\Entity\Game\Play\Player;

use ApiPlatform\Core\Annotation\{ApiProperty, ApiResource, ApiSubresource};
use AppBundle\Entity\Game\Play\Play;
use AppBundle\Entity\Game\Play\Turn\Turn;
use AppBundle\Entity\Game\{Game, Gamer};
use AppBundle\Model\Game\PlayerInterface;
use AppBundle\Model\{EntityInterface, EntityTrait};
use Doctrine\Common\Collections\{Collection, ArrayCollection};
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
	 * Turns
	 *
	 * @var ArrayCollection
	 *
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game\Play\Turn\Turn", mappedBy="player")
	 *
	 * @Groups({"play"})
	 */
	protected $turns;

	/**
	 * Score
	 *
	 * @var int
	 *
	 * @ORM\Column(name="score", type="integer", nullable=false)
	 *
	 * @Groups({"play"})
	 */
	protected $score = 0;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->turns = new ArrayCollection();
	}

	/**
	 * Gets its play
	 *
	 * @return Play
	 */
	public function getPlay(): ?Play
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

	/**
	 * Gets its turns
	 *
	 * @return ArrayCollection<Turn>
	 */
	public function getTurns(): Collection
	{
		return $this->turns;
	}

	/**
	 * Adds a turn
	 *
	 * @param Turn $turn
	 *
	 * @return self
	 */
	public function addTurn(Turn $turn): Player
	{
		if (! $this->turns->contains($turn)) {
			$this->turns->add($turn);
		}

		return $this;
	}

	/**
	 * Removes a turn
	 *
	 * @param  Turn   $turn
	 *
	 * @return self
	 */
	public function removeTurn(Turn $turn): Player
	{
		if ($this->turns->contains($turn)) {
			$this->turns->removeElement($turn);
		}

		return $this;
	}

	/**
	 * Gets its score
	 *
	 * @return int
	 */
	public function getScore(): int
	{
		return $this->score;
	}

	/**
	 * Sets its score
	 *
	 * @param int $score
	 *
	 * @return self
	 */
	public function setScore(int $score): Player
	{
		$this->score = $score;

		return $this;
	}
}
