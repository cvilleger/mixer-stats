<?php

namespace App\Controller;

use App\Service\MixerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MixerService $mixerService)
    {
//        dump($mixerService->getData());
        return $this->render('home/index.html.twig', [
            'items' => $mixerService->getData(),
        ]);
    }
}
