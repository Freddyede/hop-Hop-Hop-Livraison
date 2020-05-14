<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Villes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CommandeFormsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Route("/appoint/getData", name="getDataToSendingIntoBdd")
     * @param Request $request
     * @return Response
     */
    public function getData(Request $request){
        $logement = $request->request->get('logement');
        $hasDigicode = null;
        $codeDigicode = null;
        $etage = null;
        $ascenseur = null;
        $hasDigicode = null;
        $codeDigicode = null;
        $tel = $request->request->get('tel');
        if($logement === 'Appartements') {
            $etage = $request->request->get('etage');
            $ascenseur = $request->request->get('codeDigicode');
            $hasDigicode = $request->request->get('hasDigicode');
            $codeDigicode = $request->request->get('codeDigicode');
        }
        $villes = explode(" ", $request->request->get('villes'));
        $objVilles = null;
        foreach ($villes as $ville){
            if(preg_match('/^[0-9]{5}$/',$ville, $matches)){
                $objVilles = $this->getDoctrine()
                    ->getRepository(Villes::class)
                    ->findOneBy(['codePostal'=>$matches]);
            }
        }
        $commande = new Commande();
        $em = $this->getDoctrine()->getManager();
        if(!empty($logement) && !empty($tel)) {
            $commande->setResidences($logement)
                ->setTel($tel)
                ->addIdVille($objVilles);
        }
        if($logement === 'Appartements'){
            $commande->setResidences($logement)
                ->setAscenseurs($ascenseur)
                ->setEtage($etage)
                ->setDigicode($hasDigicode)
                ->setNumberDigicodes($codeDigicode)
                ->setTel($tel)
                ->addIdVille($objVilles);
        }
        $em->persist($commande);
        $em->flush();
        return new Response(true);
    }
}
