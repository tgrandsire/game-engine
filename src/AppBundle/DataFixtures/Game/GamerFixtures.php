<?php
namespace AppBundle\DataFixtures\Game;

use AppBundle\DataFixtures\User\UserFixtures;
use AppBundle\Entity\Game\Gamer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixture for gamers
 */
class GamerFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $gamer = (new Gamer())
            ->setName('DraytAns')
            ->setUser($this->getReference('user-gamer'))
        ;
        $manager->persist($gamer);

        $manager->flush();

        $this->addReference('gamer-draytans', $gamer);
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
