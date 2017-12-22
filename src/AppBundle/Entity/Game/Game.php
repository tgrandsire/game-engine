<?php
namespace AppBundle\Entity\Game;

use AppBundle\Model\EntityInterface;
use AppBundle\Model\EntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Un jeu (eg. catane, risk, pandemie)
 *
 * @ORM\Table(name="game")
 * @ORM\Entity
 */
class Game implements EntityInterface
{
	use EntityTrait;

	/**
	 * Name
	 *
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255, unique=true)
	 * @Assert\NotBlank
	 */
	protected $name;

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
	public function setName(string $name): Game
	{
		$this->name = $name;

		return $this;
	}
}
