<?php

namespace App\Controller;

use App\Entity\Providers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services", name="services")
     */
    public function index()
    {
        $providers = $this->getDoctrine()->getRepository(Providers::class)->findAll();
        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
            'activePresentations'=>false,
            'liens'=>false,
            'providers'=>$providers,
            'liens2'=>'transports'
        ]);
    }
}
