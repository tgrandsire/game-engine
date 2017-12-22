<?php
namespace AppBundle\Entity\Game;

use AppBundle\Model\EntityInterface;
use AppBundle\Model\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Turn of a player in a play
 */
abstract class Turn implements EntityInterface
{
	use EntityTrait;
}
