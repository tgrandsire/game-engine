<?php
namespace AppBundle\Entity\Game\Play\Player;

use ApiPlatform\Core\Annotation\{ApiProperty, ApiResource, ApiSubresource};
use AppBundle\Entity\Game\Gamer;
use AppBundle\Entity\Game\Play\Player\Player;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Un participant Gamer d'une partie de jeu (Play)
 *
 * @ORM\Entity
 *
 * @ApiResource
 */
class GamerPlayer extends Player
{
	/**
	 * Gamer
	 *
	 * @var Gamer
	 *
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game\Gamer")
     * @ORM\JoinColumn(name="gamer_id", referencedColumnName="id")
     *
     * @Groups({"play"})
	 */
	protected $gamer;

	/**
	 * Gets its gamer
	 *
	 * @return Gamer
	 */
	public function getGamer(): Gamer
	{
		return $this->gamer;
	}

	/**
	 * Sets its Gamer
	 *
	 * @param Gamer $gamer
	 *
	 * @return self
	 */
	public function setGamer(Gamer $gamer): Player
	{
		$this->gamer = $gamer;

		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getName()
	{
		return $this->gamer->getName();
	}
}
