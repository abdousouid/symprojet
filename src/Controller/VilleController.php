<?php

namespace App\Controller;

use App\Form\VilleType;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ville;

class VilleController extends AbstractController
{

    /**
     * @var VilleRepository
     */
    private $ville;
    public function __construct(VilleRepository $ville)
    {
        $this->ville=$ville;
    }


    /**
     * @Route("/ville", name="ville")
     */
    public function index()
    {
        return $this->render('ville/index.html.twig', [
            'controller_name' => 'VilleController',
        ]);
    }
/**
 * @Route("/editerville/{id}",name="editerville")
 * @param Ville $v
 * @param Request $request
 */
    public function modifier(Request $request,Ville $v){
    $form=$this->createForm(VilleType::class,$v);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $this->getDoctrine()->getManager()->flush();
    }
    return $this->render('ville/editer.html.twig',['ville'=>$v,
        'form'=>$form->createView()]);
    }
    /**
     * @Route("/deleteville/{id}",name="deleteville")
     * @param Ville $v
     * @param Request $request
     */
    public function delete(Request $request,Ville $v){
        $em=$this->getDoctrine()->getManager();
        $ville=$this->ville->find($v);
        $em->remove($ville);
        $em->flush();
        return $this->redirectToRoute('Destination') ;
    }
}
