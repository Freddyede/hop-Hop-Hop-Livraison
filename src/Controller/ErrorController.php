<?php

namespace App\Controller;

use App\Entity\Providers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/error", name="error")
     */
    public function show()
    {
        $providers = $this->getDoctrine()->getRepository(Providers::class)->findAll();
        return $this->render('error/index.html.twig', [
            'controller_name' => 'ErrorController',
            'activePresentations'=>false,
            'liens'=>false,
            'providers'=>$providers,
            'liens2'=>'error',
        ]);
    }
}
