<?php

namespace HB\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BlogController extends Controller {

    /**
     * @Route("/", name="blog_index")
     * @Route("/page/{page}", name="blog_index_page")
     * @Template()
     */
    public function indexAction($page = 1) {
        // on récupère l'entity manager à l'aide du service Doctrine
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('HBBlogBundle:Article');
        $articles = $repo->getHomepageArticles();
        /* // on récupère le repository de Article et on lui demande  tous les articles
          //$articles = $em->getRepository('HBBlogBundle:Article')->findAll();
          $articles = $em->getRepository('HBBlogBundle:Article')->getHomepageArticles($page-1);

          $nombredepage = $em->getRepository('HBBlogBundle:Article')->getHomepageCountPage();

          $lienPageSuivante = $page < $nombredepage ?
          $this->generateUrl("blog_index_page", array("page" => $page+1))
          : null ;

          $lienPagePrecedente = $page > 1 ?
          $this->generateUrl("blog_index_page", array("page" => $page-1))
          : null;

          $paginator  = $this->get('knp_paginator');
          $pagination = $paginator->paginate(
          $query,
          $request->query->get('page', 1) ,
          10
          );

          // on transmet la liste d'article au template en la nommant entities
          return array(
          'articles' => $articles,
          'lienPageSuivante'=>$lienPageSuivante,
          'lienPagePrecedente'=>$lienPagePrecedente,
          'nombredepage'=>$nombredepage,
          ); */
        $paginator = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
                $articles, $page, 1
        );
        
        $pagination->setUsedRoute("blog_index_page");
        
        return array(
            'pagination' => $pagination,
          
        );
    }

}
