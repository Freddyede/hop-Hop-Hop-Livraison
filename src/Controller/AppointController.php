<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fr")
 */
class AppointController extends AbstractController
{
    /**
     * @Route("/appoint", name="french_rdv")
     */
    public function index()
    {
        return $this->render('appoint/index.html.twig', [
            'controller_name' => 'AppointController',
            'activePresentations'=>false
        ]);
    }
}
