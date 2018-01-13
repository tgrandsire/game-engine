<?php
namespace AppBundle\DataFixtures\Game;

use AppBundle\DataFixtures\User\UserFixtures;
use AppBundle\Entity\Game\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class GameFixtures extends Fixture implements
    ContainerAwareInterface,
    DependentFixtureInterface
{
	use ContainerAwareTrait;

    public function load(ObjectManager $manager)
    {
        $catane = (new Game())
            ->setName('Catane')
            ->setCreatedBy($this->getReference('admin-user'))
            ->setUpdatedBy($this->getReference('admin-user'))
        ;
        $manager->persist($catane);

        $risk = (new Game())
            ->setName('Risk')
            ->setCreatedBy($this->getReference('admin-user'))
            ->setUpdatedBy($this->getReference('admin-user'))
        ;
        $manager->persist($risk);

        $takenoko = (new Game())
            ->setName('TakeNoKo')
            ->setCreatedBy($this->getReference('admin-user'))
            ->setUpdatedBy($this->getReference('admin-user'))
        ;
        $manager->persist($takenoko);

        $chest = (new Game())
            ->setName('Chest')
            ->setCreatedBy($this->getReference('admin-user'))
            ->setUpdatedBy($this->getReference('admin-user'))
        ;
        $manager->persist($chest);

        $dixmille = (new Game())
            ->setName('Le 10.000')
            ->setCreatedBy($this->getReference('admin-user'))
            ->setUpdatedBy($this->getReference('admin-user'))
        ;
        $manager->persist($dixmille);

        $manager->flush();

        $this->addReference('game-catane', $catane);
        $this->addReference('game-risk', $risk);
        $this->addReference('game-takenoko', $takenoko);
        $this->addReference('game-chest', $chest);
        $this->addReference('game-dixmille', $dixmille);
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
