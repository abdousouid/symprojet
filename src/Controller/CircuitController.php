<?php

namespace App\Controller;

use App\Entity\Circuit;
use App\Entity\VilleEtape;
use App\Form\CircuitType;
use App\Form\EtapeCircuitType;
use App\Form\VillEtapeType;
use App\Repository\CircuitRepository;
use App\Repository\VilleEtapeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CircuitController extends AbstractController
{

    /**
     * @Route("/circuit", name="circuit")
     * @return Response
     */
    private $rep_circ;
    private $rep_etape;
    public function __construct(CircuitRepository $rep_circ_param,VilleEtapeRepository $rep_etape_param)
    {
        $this->rep_circ=$rep_circ_param;
        $this->rep_etape=$rep_etape_param;
    }

    /**
     * @Route("/circuit", name="circuit")
     * @return Response
     */
    public function index()
    {
        $circuit=$this->rep_circ->findAll();
        return $this->render('circuit/index.html.twig', [
            'controller_name' => 'CircuitController','circuit'=>$circuit
        ]);
    }
/**
 * @Route("/ajouterCircuit",name="ajouterCircuit")
 * @param Request $request
 * @return Response | RedirectResponse
 */
public function ajouter(Request $request){
    $circ=new Circuit();
    $form=$this->createForm(CircuitType::class,$circ);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid() ){
        $em=$this->getDoctrine()->getManager();
        $em->persist($circ);
        $em->flush();
        return $this->redirectToRoute("circuit");

    }
    return $this->render('circuit/ajouterCircuit.html.twig',['form'=>$form->createView()]);
}
/**
 * @Route("/editercircuit/{id}",name="editercircuit")
 * @param Circuit $circ
 * @param Request $request
 */
public function modifier(Request $request,Circuit $circ){
    $form=$this->createForm(CircuitType::class,$circ);
    $form->handleRequest($request);
    $etape=$this->rep_etape->findByCircuit($circ);
    if($form->isSubmitted() && $form->isValid()){
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('circuit');
    }
    return $this->render('circuit/editerCircuit.html.twig',['circuit'=>$circ,'etape'=>$etape,'form'=>$form->createView()]);
}
/**
 * @Route("/deletecircuit/{id}",name="deletecircuit")
 * @param Request $request
 * @param Circuit $circ
 */
public function delete(Circuit $circ, Request $request){
$em=$this->getDoctrine()->getManager();
$circuit=$this->rep_circ->find($circ);
$em->remove($circuit);
$em->flush();
return $this->redirectToRoute('circuit');

}
/**
 * @Route("/ajouteretape",name="ajouteretape")
 * @param Request $request
 * @return Response | RedirectResponse
 */
public function ajouteretape(Request $request){
    $c=new VilleEtape();
    $form=$this->createForm(VillEtapeType::class,$c);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($c);
        $em->flush();
        return $this->redirectToRoute('circuit');
    }
    return $this->render('circuit/ajouterEtapeCircuit.html.twig',['form'=>$form->createView()]);
}
/**
 *@Route("/editeretape/{id}",name="editeretape")
 *@param VilleEtape $ve
 *@param Request $request
 */
public function editer(Request $request,VilleEtape $ve){
    $form=$this->createForm(VillEtapeType::class,$ve);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $this->getDoctrine()->getManager()->flush();

    }
    return $this->render('circuit/editerEtapeCircuit.html.twig',['etape'=>$ve,'form'=>$form->createView()]);
}
/**
 * @Route("/deleteetape/{id}",name="deleteetape")
 * @param Request $request
 * @param VilleEtape $ve
 */
public function deleteetape(VilleEtape $ve,Request $request){
    $em=$this->getDoctrine()->getManager();
    $etape=$this->rep_etape->find($ve);
    $em->remove($etape);
    $em->flush();
    return $this->redirectToRoute('circuit');
}
}
