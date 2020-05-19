<?php

namespace App\Controller;

use App\Entity\Providers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


    /**
     * @Route("/fr")
    */
class DevisController extends AbstractController
{
    /**
     * @Route("/devis", name="devis")
     */
    public function index()
    {
        $providers = $this->getDoctrine()->getRepository(Providers::class)->findAll();
        return $this->render('devis/index.html.twig', [
            'controller_name' => 'DevisController',
            'activePresentations'=>false,
            'providers'=>$providers,
            'liens'=>false,
            'liens2'=>'devis',
        ]);
    }
}
