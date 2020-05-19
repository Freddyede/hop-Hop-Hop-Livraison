<?php

namespace App\Controller;

use App\Entity\Providers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        $providers = $this->getDoctrine()->getRepository(Providers::class)->findAll();
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'activePresentations'=>false,
            'providers'=>$providers,
            'liens'=>true,
            'liens2'=>'contact',
        ]);
    }
}
