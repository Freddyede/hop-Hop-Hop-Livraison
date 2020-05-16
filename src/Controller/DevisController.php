<?php

namespace App\Controller;

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
        return $this->render('devis/index.html.twig', [
            'controller_name' => 'DevisController',
            'activePresentations'=>false,
            'liens'=>false,
            'liens2'=>'devis',
        ]);
    }
}
