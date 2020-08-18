<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DaysRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PlanningController extends AbstractController
{
    /**
     * @Route("/fr/planning", name="planning")
     */
    public function index()
    {
        return $this->render('planning/index.html.twig', [
            'controller_name' => 'HomeController',
            'liens'=>true,
            'liens2'=>'planning',
        ]);
    }
     /**
     * @Route("/fr/planning/search", name="planning_search")
    */
    public function searchDays(Request $request, DaysRepository $reposity){
        if($request->headers->get('keys') == 'eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.L-rGW6vBurI8Pe58DD38uR0WzMmoPl9qZIOj_V9fMmxW1bVfrxhqVJdIZoYtOGgNiW5wl6LlAksGpSTsVU3yEg'){
            $day = $request->request->get('days');
            $idDays = $reposity->findDays($day);
            $arrayDay = null;
            if(count($idDays) > 1){
                foreach ($idDays as $value) {
                    $arrayDay[] = [
                        'background'=>$this->getDoctrine()->getRepository(Days::class)->find($value)->getZone()->getBackground(),
                        'color'=>$this->getDoctrine()->getRepository(Days::class)->find($value)->getZone()->getColors()
                    ];
                }
            }else{
                foreach ($idDays as $value) {
                    $arrayDay[] = [
                        'background'=>$this->getDoctrine()->getRepository(Days::class)->find($value)->getZone()->getBackground(),
                        'color'=>$this->getDoctrine()->getRepository(Days::class)->find($value)->getZone()->getColors()
                    ];
                }
            }
            return new Response(json_encode($arrayDay));
        }
    }

}