<?php
namespace AppBundle\Entity\Game\Play\Turn;

use AppBundle\Entity\Game\Play\Turn\Turn;
use Doctrine\ORM\Mapping as ORM;

/**
 * Turn with a score
 *
 * @ORM\Entity
 */
class ScoredTurn extends Turn
{
	/**
	 * Score
	 *
	 * @var integer
	 */
	protected $score = 0;

	/**
	 * Gets its score
	 *
	 * @return integer
	 */
	public function getScore(): integer
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
	public function setScore(integer $score): ScoredTurn
	{
		$this->score = $score;

		return $this;
	}
}
