<?php

namespace HB\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HB\BlogBundle\Entity\Article;

/**
 * LoadArticleData est la classe de fixtures pour charger les articles en base
 *
 * @author Christian
 */
class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user= $this->getReference("user1");
        
        $article = new Article();
        $article->setTitle('Un article de test');
        $article->setContent('Contenu article de test');
        $article->setPublished(true);
        $article->setAuthor($user);
      
        $manager->persist($article);
        
         $article2 = new Article();
        $article2->setTitle('Un autre article de test');
        $article2->setContent('Contenu du nouvel article de test');
        $article2->setPublished(true);
         $article2->setAuthor($user);
       
        $manager->persist($article2);
       
      //on persiste en base
        $manager->flush();
      
    }
/**
 * Permet de définir l'ordre de chargement des fixtures
 * 
 * @return int
 */
    public function getOrder() {
        return 2;
    }

}
