<?php
namespace AppBundle\Entity\Game;

use AppBundle\Entity\Game\{Game, Player};

/**
 * Une partie de jeu
 */
class Play
{
	/**
	 * Id
	 *
	 * @var integer
	 */
	protected $id;

	/**
	 * Game
	 *
	 * @var Game
	 */
	protected $game;

	/**
	 * Collection of players
	 *
	 * @var ArrayCollection<Player>
	 */
	protected $players;

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
