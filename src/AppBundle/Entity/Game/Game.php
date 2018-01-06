<?php
namespace AppBundle\Entity\Game;

use ApiPlatform\Core\Annotation\ApiResource;
use AppBundle\Model\{EntityInterface, EntityTrait};
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use AppBundle\Model\Blameable\BlameableTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Un jeu (eg. catane, risk, pandemie)
 *
 * @ORM\Table(name="game")
 * @ORM\Entity
 *
 * @ApiResource(attributes={"filters"={"game.name_filter"}})
 */
class Game implements EntityInterface
{
	use EntityTrait;
	use BlameableTrait;

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
