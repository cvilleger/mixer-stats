<?php

namespace App\Controller;

use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(DocumentManager $documentManager)
    {
//        $queryBuilder = $documentManager->createQueryBuilder(Channel::class);
//        $queryBuilder
//            ->readOnly()
//            ->limit(100)
//        ;
//        $results = $queryBuilder->getQuery()->execute()->toArray();
//        dd($results);

        return $this->render('home/index.html.twig');
    }
}
