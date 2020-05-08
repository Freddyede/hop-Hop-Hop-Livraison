<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Villes;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $citys = $this->getDoctrine()->getRepository(Villes::class)->findAll();
        foreach($citys as $city){
            $villes = $city->getName().' '.$city->getCodePostal().' '.$city->getZone()->getName();
        }
        return $this->render('base.html.twig', [
            'controller_name' => 'HomeController',
            'activePresentations'=>true
        ]);
    }
    /**
     * @Route("/citys/lists", name="list_city", methods={"GET"})
    */
    public function allCitys(){
        $data_encoder = null;
        $citys = $this->getDoctrine()->getRepository(Villes::class)->findAll();
        foreach($citys as $city){
            $data_encoder[] = [
                'villes'=>$city->getName().' '.$city->getCodePostal().' '.'('.$city->getZone()->getName().')'
            ];
        }
    return new Response(json_encode($data_encoder));
    }
}
