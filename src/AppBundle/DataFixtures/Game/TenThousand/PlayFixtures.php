<?php
namespace AppBundle\DataFixtures\Game\TenThousand;

use AppBundle\DataFixtures\Game\GameFixtures;
use AppBundle\DataFixtures\User\UserFixtures;
use AppBundle\Entity\Game\Play\Play;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixture for ten thousand game play
 */
class PlayFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $play = (new Play())
            ->setGame($this->getReference('game-ten-thousand'))
            ->setCreatedBy($this->getReference('user-gamer'))
            ->setUpdatedBy($this->getReference('user-gamer'))
        ;
        $manager->persist($play);

        $manager->flush();

        $this->addReference('ten-thousand-play', $play);
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            GameFixtures::class,
        );
    }
}
