<?php

namespace App\Controller;

use App\Entity\Providers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TransportsController extends AbstractController
{
    /**
     * @Route("/transports", name="transports")
     */
    public function index()
    {
        $providers = $this->getDoctrine()->getRepository(Providers::class)->findAll();
        return $this->render('transports/index.html.twig', [
            'controller_name' => 'TransportsController',
            'activePresentations'=>false,
            'liens'=>false,
            'providers'=>$providers,
            'liens2'=>'transports'
        ]);
    }
}
