<?php
namespace AppBundle\DataFixtures\Game;

use AppBundle\DataFixtures\User\UserFixtures;
use AppBundle\Entity\Game\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $catane = (new Game())
            ->setName('Catane')
            ->setCreatedBy($this->getReference('user-admin'))
            ->setUpdatedBy($this->getReference('user-admin'))
        ;
        $manager->persist($catane);

        $risk = (new Game())
            ->setName('Risk')
            ->setCreatedBy($this->getReference('user-admin'))
            ->setUpdatedBy($this->getReference('user-admin'))
        ;
        $manager->persist($risk);

        $takenoko = (new Game())
            ->setName('TakeNoKo')
            ->setCreatedBy($this->getReference('user-admin'))
            ->setUpdatedBy($this->getReference('user-admin'))
        ;
        $manager->persist($takenoko);

        $chest = (new Game())
            ->setName('Chest')
            ->setCreatedBy($this->getReference('user-admin'))
            ->setUpdatedBy($this->getReference('user-admin'))
        ;
        $manager->persist($chest);

        $tenThousand = (new Game())
            ->setName('Le 10.000')
            ->setCreatedBy($this->getReference('user-admin'))
            ->setUpdatedBy($this->getReference('user-admin'))
        ;
        $manager->persist($tenThousand);

        $manager->flush();

        $this->addReference('game-catane', $catane);
        $this->addReference('game-risk', $risk);
        $this->addReference('game-takenoko', $takenoko);
        $this->addReference('game-chest', $chest);
        $this->addReference('game-ten-thousand', $tenThousand);
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
