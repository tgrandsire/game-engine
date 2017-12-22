<?php
namespace AppBundle\Entity\Game;

/**
 * Un jeu (eg. catane, risk, pandemie)
 */
class Game
{
	/**
	 * Id
	 *
	 * @var integer
	 */
	protected $id;

	/**
	 * Name
	 *
	 * @var string
	 */
	protected $name;

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
	 * Gets its name
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Sets its name
	 *
	 * @param string $name
	 *
	 * @return string
	 */
	public function setName(string $name)
	{
		$this->name = $name;

		return $this;
	}
}
