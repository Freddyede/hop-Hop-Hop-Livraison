<?php

namespace App\Controller;

use App\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CommandeFormsType;

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
        $commande = new Commande();
        $forms = $this->createForm(CommandeFormsType::class, $commande);
        return $this->render('appoint/index.html.twig', [
            'controller_name' => 'AppointController',
            'activePresentations'=>false,
            'forms'=>$forms->createView()
        ]);
    }
}
