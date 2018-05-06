<?php
namespace AppBundle\EventListener\Game;

use Doctrine\ORM\Event\OnFlushEventArgs;

use AppBundle\Entity\Game\Play\Player\NamedPlayer;

class UniqueNamedPlayerNamePerPlayListener
{
	/**
     * Pre persist listener based on doctrine common.
     *
     * @param OnFlushEventArgs $args
     */
    public function onFlush(OnFlushEventArgs $args)
    {
    	$uow = $args->getEntityManager()->getUnitOfWork();

    	foreach($uow->getScheduledEntityInsertions() as $entity) {
	        if ($entity instanceof NamedPlayer) {
	            foreach ($entity->getPlay()->getPlayers() as $player) {
	            	if (strtolower($entity->getName()) == strtolower($player->getName())) {
	        			$em = $args->getEntityManager();

	        			$em->detach($entity);
	        			throw new \Exception('Player name must be unique for a play');
	            	}
	            }
	        }
    	}
    }
}
