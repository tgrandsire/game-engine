<?php
namespace AppBundle\Entity\Game;

use AppBundle\Entity\Game\{Game, Player};
use AppBundle\Model\EntityInterface;
use AppBundle\Model\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Une partie de jeu
 *
 * @ORM\Table(name="play")
 * @ORM\Entity
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
	 */
	protected $game;

	/**
	 * Collection of players
	 *
	 * @var ArrayCollection<Player>
	 *
	 * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game\Player", mappedBy="play")
	 */
	protected $players;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->players = new ArrayCollection();
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
}
