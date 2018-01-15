<?php
namespace AppBundle\Entity\Game\Play\Player;

use ApiPlatform\Core\Annotation\{ApiProperty, ApiResource, ApiSubresource};
use AppBundle\Entity\Game\Play\Player\Player;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Un participant nommé d'une partie de jeu (Play)
 *
 * @ORM\Entity
 *
 * @ApiResource
 */
class NamedPlayer extends Player
{
	/**
	 * Name
	 *
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255, nullable=false)
	 * @Assert\Length(min=3, minMessage="Your name must be at least 3 characters long", max=100, maxMessage="Your name must be at most 100 characters long")
	 *
	 * @Groups({"play"})
	 */
	protected $name;

	/**
	 * {@inheritdoc}
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
	public function setName($name): NamedPlayer
	{
		$this->name = $name;

		return $this;
	}
}
