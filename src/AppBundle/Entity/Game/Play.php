<?php
namespace AppBundle\Entity\Game;

use ApiPlatform\Core\Annotation\{ApiProperty, ApiResource, ApiSubresource};
use AppBundle\Entity\Game\{Game, Player};
use AppBundle\Model\{EntityInterface, EntityTrait};
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Une partie de jeu
 *
 * @ORM\Table(name="play")
 * @ORM\Entity
 *
 */

/*
 * @ApiResource(
 * 	collectionOperations={
 *  	"get"={"method"="GET"},
 *   	"post"={"method"="POST", "access_control"="is_granted('ROLE_GAMER')"}
 *  },
 *  itemOperations={
 *  	"get"={"method"="GET", "access_control"="is_granted('ROLE_USER')"}
 *  }
 * )
 */
class Play implements EntityInterface
{
	use EntityTrait;

	/**
	 * Game
	 *
	 * @var Game
	 *
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game\Game")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     *
     * @ApiSubresource
	 */
	protected $game;

	/**
	 * Collection of players
	 *
	 * @var ArrayCollection<Player>
	 *
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game\Player", mappedBy="play")
	 *
	 * @ApiSubresource
	 */
	protected $players;

	/**
	 * Turns
	 *
	 * @var ArrayCollection<Turn>
	 *
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game\Turn\Turn", mappedBy="play")
	 * @ORM\OrderBy({"id" = "ASC"})
	 */
	protected $turns;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->players = new ArrayCollection();
		$this->turns = new ArrayCollection();
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
	 * @param Game $game
	 *
	 * @return self
	 */
	public function setGame(Game $game): Play
	{
		$this->game = $game;

		return $this;
	}

	/**
	 * Gets its players
	 *
	 * @return ArrayColletion
	 */
	public function getPlayers(): ArrayCollection
	{
		return $this->players;
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
	 * @return ArrayCollection<Turn>
	 */
	public function getTurns(): ArrayCollection
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
	 * @param  Turn   $turn
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
}
