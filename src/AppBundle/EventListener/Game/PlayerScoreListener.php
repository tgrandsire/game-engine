<?php
namespace AppBundle\EventListener\Game;

use AppBundle\Entity\Game\Play\Turn\ScoredTurn;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Listener to maintain the player score
 */
class PlayerScoreListener
{
	/**
     * Adjusts the player score while persisting a scoredTurn
     *
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
    	if (! ($scoredTurn = $args->getEntity()) instanceof ScoredTurn) {
    		return;
    	}

    	$scoredTurn->getPlayer()->setScore($scoredTurn->getPlayer()->getScore() + $scoredTurn->getScore());
    }

    /**
     * Adjusts the player score while removing a scoredTurn
     *
     * @param LifecycleEventArgs $args
     */
    public function preRemove(LifecycleEventArgs $args)
    {
    	if (! ($scoredTurn = $args->getEntity()) instanceof ScoredTurn) {
    		return;
    	}

    	$scoredTurn->getPlayer()->setScore($scoredTurn->getPlayer()->getScore() - $scoredTurn->getScore());
    }
}
