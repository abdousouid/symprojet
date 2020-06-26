<?php
namespace App\Controller;
use App\Entity\VilleEtape;
use App\Form\DestinationModifType;
use App\Form\VilleType;
use App\Repository\DestinationRepository;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Destination;
use App\Entity\Ville;
use App\Entity\Circuit;
use App\Entity\Etape;
class DestinationController extends AbstractController{

    /**
     * @Route("/Destination",name="Destination")
     * @return Response
     */
    private $rep_dest;
    private $rep_ville;
public function __construct(DestinationRepository $rep_dest_param ,VilleRepository $rep_ville_param)
{
    $this->rep_ville=$rep_ville_param;
    $this->rep_dest=$rep_dest_param;
}
    /**
     * @Route("/Destination",name="Destination")
     * @return Response
     */

    public function index():Response{



        $dest1=new Destination();
        $dest1->setCodeDest(217)
            ->setDesDest('Tunisie')
            ->setImg('https://i0.wp.com/24hourslayover.com/wp-content/uploads/2020/03/carthage_sidi_bou_said_photography_tunisia-05_50.jpg?resize=440%2C330&ssl=1');
        $dest2=new Destination();
        $dest2->setCodeDest(213)
            ->setDesDest('Algerie')
            ->setImg('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQaIez9YLH2EGxMRNryJIw3JX0fsCBrLMZRojxU_VGaB1o0lwRc&usqp=CAU');
        $dest3=new Destination();
        $dest3->setCodeDest(212)
            ->setDesDest('Maroc')
            ->setImg('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR9EMYeKn5fcKKsLp9CJKtuzuLcgIQj-2P-8JKISq-wyKlSanQZ&usqp=CAU');
        $dest4=new Destination();
        $dest4->setCodeDest(20)
            ->setDesDest('Turquie')
            ->setImg('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRDOYfsjlLxD628RsXankkalrzg0JIfGPwLrSHdzh0htzBe5eWN&usqp=CAU');
        $dest5=new Destination();
        $dest5->setCodeDest(90)
            ->setDesDest('Egypte')
            ->setImg('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSodT3HekVrHV5NxOFUplYwbGQhKAUNJbLEllKicYtPQk8CM19J&usqp=CAU');

        $v1=new Ville();
        $v1->setCodeVille('216_1')
            ->setDesVille('Tunis')
            ->setDestVille($dest1);
        $v2=new Ville();
        $v2->setCodeVille('216_2')
            ->setDesVille('Tozeur')
            ->setDestVille($dest1);
        $v3=new Ville();
        $v3->setCodeVille('216_3')
            ->setDesVille('Sousse')
            ->setDestVille($dest1);
        $v4=new Ville();
        $v4->setCodeVille('212_1')
            ->setDesVille('Casablanca')
            ->setDestVille($dest3);
        $v5=new Ville();
        $v5->setCodeVille('212_2')
            ->setDesVille('Rabat')
            ->setDestVille($dest3);
        $v6=new Ville();
        $v6->setCodeVille('212_3')
            ->setDesVille('Tanger')
            ->setDestVille($dest3);
        $v7=new Ville();
        $v7->setCodeVille('20_1')
            ->setDesVille('Istamboul')
            ->setDestVille($dest4);
        $v8=new Ville();
        $v8->setCodeVille('20_2')
            ->setDesVille('Ankara')
            ->setDestVille($dest4);
        $v9=new Ville();
        $v9->setCodeVille('90_1')
            ->setDesVille('LeCaire')
            ->setDestVille($dest5);
     /* $em2=$this->getDoctrine()->getManager();
        $em2->persist($dest1);
        $em2->persist($dest2);
        $em2->persist($dest3);
        $em2->persist($dest4);
        $em2->persist($dest5);
        $em2->persist($v1);
        $em2->persist($v2);
        $em2->persist($v3);
        $em2->persist($v4);
        $em2->persist($v5);
        $em2->persist($v6);
        $em2->persist($v7);
        $em2->persist($v8);
        $em2->persist($v9);*/

        $c1=new Circuit();
        $c1->setCodeCircuit('ete1_local')
            ->setDesCircuit('Tunisie_ete')
            ->setDureeCircuit(7);
        $c2=new Circuit();
        $c2->setCodeCircuit('ete2_local')
            ->setDesCircuit('Tunisie_ete')
            ->setDureeCircuit(10);
        $c3=new Circuit();
        $c3->setCodeCircuit('ete1_etranger')
            ->setDesCircuit('Turquie_ete')
            ->setDureeCircuit(8);
        $c4=new Circuit();
        $c4->setCodeCircuit('ete2_etranger')
            ->setDesCircuit('Egypte_ete')
            ->setDureeCircuit(10);
        $c5=new Circuit();
        $c5->setCodeCircuit('ete3_etranger')
            ->setDesCircuit('Maroc_ete')
            ->setDureeCircuit(10);
        $c6=new Circuit();
        $c6->setCodeCircuit('hiver1_local')
            ->setDesCircuit('Tunisie_hiver')
            ->setDureeCircuit(10);
     /*  $em1=$this->getDoctrine()->getManager();
        $em1->persist($c1);
        $em1->persist($c2);
        $em1->persist($c3);
        $em1->persist($c4);
        $em1->persist($c5);
        $em1->persist($c6);*/

       $e1=new VilleEtape();
       $e1->setVilleEtape($v1)
           ->setCircuitEtape($c1)
           ->setDureeEtape(2)
           ->setOrdreEtape(1);
        $e2=new VilleEtape();
        $e2->setVilleEtape($v3)
            ->setCircuitEtape($c1)
            ->setDureeEtape(5)
            ->setOrdreEtape(2);
        $e3=new VilleEtape();
        $e3->setVilleEtape($v1)
            ->setCircuitEtape($c2)
            ->setDureeEtape(5)
            ->setOrdreEtape(1);
        $e4=new VilleEtape();
        $e4->setVilleEtape($v3)
            ->setCircuitEtape($c2)
            ->setDureeEtape(5)
            ->setOrdreEtape(2);
        $e5=new VilleEtape();
        $e5->setVilleEtape($v8)
            ->setCircuitEtape($c4)
            ->setDureeEtape(3)
            ->setOrdreEtape(1);
        $e6=new VilleEtape();
        $e6->setVilleEtape($v7)
            ->setCircuitEtape($c3)
            ->setDureeEtape(5)
            ->setOrdreEtape(2);
        $e7=new VilleEtape();
        $e7->setVilleEtape($v9)
            ->setCircuitEtape($c4)
            ->setDureeEtape(3)
            ->setOrdreEtape(1);
      /*  $em=$this->getDoctrine()->getManager();
        $em->persist($e1);
        $em->persist($e2);
        $em->persist($e3);
        $em->persist($e4);
        $em->persist($e5);
        $em->persist($e6);
        $em->persist($e7);
        $em->flush();*/



    $destinations=$this->rep_dest->findAll();
    return $this->render('destination.html.twig',['controller_name'=>'DestinationController','destinations'=>$destinations]);
}
/**
 * @Route("/editDestination/{id}",name="editerdestination")
 * @param Destination $dest
 * @param Request $request
 * @return Response
 */
public function modifier(Destination $dest,Request $request){
    $form=$this->createForm(DestinationModifType::class,$dest);
    $form->handleRequest($request);
    $villes=$this->rep_ville->findByDestinations($dest);
    if($form->isSubmitted() && $form->isValid()){
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute("Destination");
    }
    return $this->render('editer.html.twig',['destination'=>$dest,'villes'=>$villes,'form'=>$form->createView()]);
}

    /**
     * @Route("/ajouterDestination",name="ajouterDestination")
     * @param Request $request
     * @return Response |RedirectResponse
     */
public function ajouter(Request $request){
    $dest=new Destination();
    $form =$this->createForm(DestinationModifType::class,$dest);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $em=$this->getDoctrine()->getManager();
        $em->persist($dest);
        $em->flush();
        return $this->redirectToRoute("Destination");
    }
    return $this->render('ajouter.html.twig',['form'=>$form->createView()]);

}
/**
 * @Route("/deleteDestination/{id}",name="deleteDestination")
 * @param Destination $dest
 * @param Request $request
 */
public function delete(Destination $dest, Request $request){
    $em=$this->getDoctrine()->getManager();
    $destination=$this->rep_dest->find($dest);
    $em->remove($destination);
    $em->flush();
    return $this->redirectToRoute('Destination');
}
    /**
     * @Route("/ajouterville",name="ajouterville")
     * @param Request $request
     * @return string
     */
    public function ajouterville(Request $request){
        $v=new Ville();
        $form=$this->createForm(VilleType::class,$v);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() ){
            $em=$this->getDoctrine()->getManager();
            $em->persist($v);
            $em->flush();
        }
        return $this->render( 'ville/index.html.twig',['form'=>$form->createView()]);
    }
}