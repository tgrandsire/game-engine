<?php
namespace AppBundle\DataFixtures\Game;

use AppBundle\Entity\Game\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class GameFixtures extends Fixture implements ContainerAwareInterface
{
	use ContainerAwareTrait;

    public function load(ObjectManager $manager)
    {
        $catane = (new Game())->setName('Catane');
        $manager->persist($catane);

        $risk = (new Game())->setName('Risk');
        $manager->persist($risk);

        $takenoko = (new Game())->setName('TakeNoKo');
        $manager->persist($takenoko);

        $chest = (new Game())->setName('Chest');
        $manager->persist($chest);

        $dixmille = (new Game())->setName('Le 10.000');
        $manager->persist($dixmille);

        $manager->flush();

        $this->addReference('game-catane', $catane);
        $this->addReference('game-risk', $risk);
        $this->addReference('game-takenoko', $takenoko);
        $this->addReference('game-chest', $chest);
        $this->addReference('game-dixmille', $dixmille);
    }
}
