<?php

namespace HB\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HB\BlogBundle\Entity\user;

/**
 * Description of LoadUserDatanest la classe de fixtures pour charger les articles en base
 *
 * @author Christian
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {
       /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('User 1');
        $user->setLogin('login1');
        $user->setEmail('email@domaine.com');
        $user->setPassword('12345678');
        $user->setBirthDate(new \DateTime("02/02/1982"));
        $user->setEnabled(true);
      
        $manager->persist($user);
        /*
        $user2 = new User();
        $user2->setName('User2');
        $user2->setLogin('login2');
        $user2->setEmail('emailbis@domaine.com');
        $user2->setPassword('12345678');
        $user2->setBirthDate(new \DateTime("12/12/1992"));
        $user2->setEnabled(true);
      
        $manager->persist($user2);
        */
      //on persiste en base
        $manager->flush();
        
        //on stocke dans le repo des fixtures les objets à partager
        $this->addReference('user1', $user);
    }

    public function getOrder() {
        return 1;
    }

}
