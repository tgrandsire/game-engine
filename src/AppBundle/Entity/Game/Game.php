<?php
namespace AppBundle\Entity\Game;

use ApiPlatform\Core\Annotation\ApiResource;
use AppBundle\Model\Blameable\BlameableTrait;
use AppBundle\Model\Timestampable\TimestampableTrait;
use AppBundle\Model\{EntityInterface, EntityTrait};
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Un jeu (eg. catane, risk, pandemie)
 *
 * @ORM\Table(name="game")
 * @ORM\Entity
 *
 * @ApiResource(
 * 	attributes={
 * 		"normalization_context"={"groups"={"game"}},
 * 		"filters"={"game.name_filter"}
 * 	},
 * 	collectionOperations={
 *  	"get"={"method"="GET"},
 *   	"post"={"method"="POST", "access_control"="is_granted('ROLE_ADMIN')"}
 *  },
 *  itemOperations={
 *  	"get"={"method"="GET", "access_control"="is_granted('ROLE_USER')"}
 *  }
 * )
 */
class Game implements EntityInterface
{
	use EntityTrait;
	use BlameableTrait;
	use TimestampableTrait;

	/**
	 * Name
	 *
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255, unique=true)
	 * @Assert\NotBlank
	 *
	 * @Groups({"game"})
	 */
	protected $name;

	/**
	 * whether this is a turn based game
	 *
	 * @var boolean
	 *
	 * @ORM\Column(name="turn_based", type="boolean", nullable=false)
	 */
	protected $turnBasedGame = true;

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

	/**
	 * Sets whether this is a turn based game
	 *
	 * @param boolean $turnBasedGame
	 *
	 * @return self
	 */
	public function setTurnBasedGame($turnBasedGame): Game
	{
		$this->turnBasedGame = $turnBasedGame;

		return $this;
	}

	/**
	 * Returns whether this is a turn based game
	 *
	 * @return boolean
	 */
	public function isTurnBasedGame(): bool
	{
		return $this->turnBasedGame;
	}
}
