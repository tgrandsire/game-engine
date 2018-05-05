<?php
namespace AppBundle\Entity\Game\Play;

use ApiPlatform\Core\Annotation\{ApiProperty, ApiResource, ApiSubresource};
use AppBundle\Entity\Game\Game;
use AppBundle\Entity\Game\Play\Player\Player;
use AppBundle\Entity\Game\Play\Turn\Turn;
use AppBundle\Model\Blameable\BlameableTrait;
use AppBundle\Model\Timestampable\TimestampableTrait;
use AppBundle\Model\{EntityInterface, EntityTrait};
use Doctrine\Common\Collections\{ArrayCollection, Collection};
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Une partie de jeu
 *
 * @ORM\Table(name="play")
 * @ORM\Entity
 *
 * @ApiResource(attributes={"normalization_context"={"groups"={"play"}}})
 */
class Play implements EntityInterface
{
	/**
	 * Stages
	 */
	const SETTING = 0;
	const PROGESS = 1;
	const ENDED   = 2;

	public static $stages = array(
		self::SETTING,
		self::PROGESS,
		self::ENDED,
	);

	use EntityTrait;
	use BlameableTrait;
	use TimestampableTrait;

	/**
	 * Game
	 *
	 * @var Game
	 *
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game\Game", inversedBy="plays")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     *
     * @Groups({"play"})
	 */
	protected $game;

	/**
	 * Collection of players
	 *
	 * @var Collection<Player>
	 *
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game\Play\Player\Player", mappedBy="play")
	 *
	 * @Groups({"play"})
	 */
	protected $players;

	/**
	 * Turns
	 *
	 * @var Collection<Turn>
	 *
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game\Play\Turn\Turn", mappedBy="play")
	 * @ORM\OrderBy({"id" = "ASC"})
	 */
	protected $turns;

	/**
	 * State of the game (Setting, ongoing, ended)
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="stage", type="integer")
	 *
	 * @Groups({"play"})
	 */
	protected $stage = self::SETTING;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->players = new ArrayCollection();
		$this->turns   = new ArrayCollection();
	}

	/**
	 * Gets its game
	 *
	 * @return Game
	 */
	public function getGame(): Game
	{
		return $this->game;
	}

	/**
	 * Sets its game
	 *
	 * @param Game|null $game
	 *
	 * @return self
	 */
	public function setGame(Game $game = null): Play
	{
		$this->game = $game;

		return $this;
	}

	/**
	 * Gets its players
	 *
	 * @return Colletion
	 */
	public function getPlayers(): Collection
	{
		return $this->players;
	}

	/**
	 * Sets its players
	 *
	 * @return self
	 */
	public function setPlayers($players): Play
	{
		$this->players = $players;

		return $this;
	}

	/**
	 * Adds a player
	 *
	 * @param Player $player
	 *
	 * @return self
	 */
	public function addPlayer(Player $player): Play
	{
		if (!$this->players->contains($player)) {
			$this->players->add($player);
			$player->setPlay($this);
		}

		return $this;
	}

	/**
	 * Removes a player
	 *
	 * @param  Player $player
	 *
	 * @return self
	 */
	public function removePlayer(Player $player): Play
	{
		if ($this->players->contains($player)) {
			$this->players->removeElement($player);
			$player->setPlay(null);
		}

		return $this;
	}

	/**
	 * Gets its turns
	 *
	 * @return Collection<Turn>
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
	public function addTurn(Turn $turn): Play
	{
		if ($this->isStarted() && ! $this->isEnded()) {
			throw new \LogicException('The game (play) is not in progress');
		}

		if ($this->game->isTurnBasedGame()) {
			if (!$this->turns->contains($turns)) {
				$this->turns->add($turn);
				$turn->setPlay($this);
			}
		}

		return $this;
	}

	/**
	 * Removes a turn
	 *
	 * @param Turn $turn
	 *
	 * @return self
	 */
	public function removeTurn(Turn $turn): Play
	{
		if ($this->game->isTurnBasedGame()) {
			if ($this->turns->contains($turns)) {
				$this->turns->removeElement($turn);
				$turn->setPlay(null);
			}
		}

		return $this;
	}

	/**
	 * Gets the stage
	 *
	 * @return integer
	 */
	public function getStage(): int
	{
		return $this->stage;
	}

	/**
	 * Sets the stage
	 *
	 * @param integer $stage
	 *
	 * @return self
	 */
	public function setStage(integer $stage): Play
	{
		if (! in_array($stage, self::$stages)) {
			throw new \LogicException('Stage must be of those values: 0, 1, 2.');
		}

		$this->stage = $stage;

		return $this;
	}

	/**
	 * Retuns whether the play is started
	 *
	 * @return boolean
	 */
	public function isStarted(): boolean
	{
		return $this->stage > self::SETTING;
	}

	/**
	 * Returns whether the play is in progress
	 *
	 * @return boolean
	 */
	public function isInProgress(): boolean
	{
		return $this->stage == self::PROGESS;
	}

	/**
	 * Returns whether the play is ended
	 *
	 * @return boolean
	 */
	public function isEnded(): boolean
	{
		return $this->stage >= self::ENDED;
	}
}
