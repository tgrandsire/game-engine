<?php
namespace AppBundle\EventListener\Game;

use AppBundle\Entity\Game\Play\Turn\ScoredTurn;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Listener to maintain the player score turn to turn
 */
class PlayerScoreListener
{
	/**
     * Adjusts the player score while persisting a scoredTurn
     *
     * @param LifecycleEventArgs $args
     *
     * @return void
     */
    public function prePersist(LifecycleEventArgs $args): void
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
     *
     * @return void
     */
    public function preRemove(LifecycleEventArgs $args): void
    {
    	if (! ($scoredTurn = $args->getEntity()) instanceof ScoredTurn) {
    		return;
    	}

    	$scoredTurn->getPlayer()->setScore($scoredTurn->getPlayer()->getScore() - $scoredTurn->getScore());
    }
}
