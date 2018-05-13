<?php
namespace AppBundle\Entity\Game\Play\Turn;

use ApiPlatform\Core\Annotation\{ApiProperty, ApiResource, ApiSubresource};
use AppBundle\Entity\Game\Play\Turn\Turn;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Turn with a score
 *
 * @ORM\Entity
 *
 * @ApiResource(attributes={"normalization_context"={"groups"={"turn"}}})
 */
class ScoredTurn extends Turn
{
	/**
	 * Score
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="score", type="integer")
	 *
	 * @Groups({"play", "turn"})
	 */
	protected $score = 0;

	/**
	 * Gets its score
	 *
	 * @return integer
	 */
	public function getScore(): int
	{
		return $this->score;
	}

	/**
	 * Sets its score
	 *
	 * @param integer $score
	 *
	 * @return integer
	 */
	public function setScore(int $score): ScoredTurn
	{
		$this->score = $score;

		return $this;
	}
}
