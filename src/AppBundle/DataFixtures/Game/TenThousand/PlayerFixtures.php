<?php
namespace AppBundle\DataFixtures\Game\TenThousand;

use AppBundle\DataFixtures\Game\GameFixtures;
use AppBundle\DataFixtures\Game\TenThousand\PlayFixtures;
use AppBundle\DataFixtures\User\UserFixtures;
use AppBundle\Entity\Game\Play\Player\{GamerPlayer, NamedPlayer};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixture for ten thousand game players
 */
class PlayerFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $player1 = (new GamerPlayer())
            ->setGamer($this->getReference('gamer-draytans'))
            ->setPlay($this->getReference('ten-thousand-play'))
        ;
        $manager->persist($player1);

        $player2 = (new NamedPlayer())
            ->setName('player 2')
            ->setPlay($this->getReference('ten-thousand-play'))
        ;
        $manager->persist($player2);

        $player3 = (new NamedPlayer())
            ->setName('player 3')
            ->setPlay($this->getReference('ten-thousand-play'))
        ;
        $manager->persist($player3);

        $player4 = (new NamedPlayer())
            ->setName('player 4')
            ->setPlay($this->getReference('ten-thousand-play'))
        ;
        $manager->persist($player4);

        $manager->flush();

        $this->addReference('ten-thousand-player-1', $player1);
        $this->addReference('ten-thousand-player-2', $player2);
        $this->addReference('ten-thousand-player-3', $player3);
        $this->addReference('ten-thousand-player-4', $player4);
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            GameFixtures::class,
            PlayFixtures::class,
        );
    }
}
