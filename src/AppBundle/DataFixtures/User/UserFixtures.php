<?php
namespace AppBundle\DataFixtures\User;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class UserFixtures extends Fixture implements ContainerAwareInterface
{
	use ContainerAwareTrait;

    public function load(ObjectManager $manager)
    {
        // Get our userManager, you must implement `ContainerAwareInterface`
        $userManager = $this->container->get('fos_user.user_manager');

        // Create our admin user and set details
        $user = $userManager->createUser();
        $user->setUsername('Teddy');
        $user->setFullname('Teddy Grandsire');
        $user->setEmail('teddy@grandsire.org');
        $user->setPlainPassword('123admin');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_ADMIN'));
        // Update the user
        $userManager->updateUser($user, true);
        $this->addReference('admin-user', $user);

        // Create our gamer user and set details
        $user = $userManager->createUser();
        $user->setUsername('DraytAns');
        $user->setFullname('Logan Moad');
        $user->setEmail('gamer@grandsire.org');
        $user->setPlainPassword('123gamer');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_GAMER'));
        // Update the user
        $userManager->updateUser($user, true);
        $this->addReference('gamer-user', $user);

        // Create our simple user and set details
        $user = $userManager->createUser();
        $user->setUsername('Martin');
        $user->setFullname('Martin Olgado');
        $user->setEmail('martin@grandsire.org');
        $user->setPlainPassword('123soleil');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_USER'));
        // Update the user
        $userManager->updateUser($user, true);
        $this->addReference('simple-user', $user);
    }
}
