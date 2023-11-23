<?php

namespace App\Controller;


use App\Service\CalculMethode;
use App\Entity\Notes;
use App\Form\NotesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;




class AcceuilController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuil')]
    public function index(EntityManagerInterface $em, Request $request): Response
    {

        $n =  $em->getRepository(Notes::class)->findAll();
        $note = new Notes();
        $form = $this->createForm(NotesType::class, $note);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
        
         $em->persist($note);
         $em->flush(); 

         $this->addFlash('success','Form submitted'); 
         return $this->redirectToRoute("app_acceuil");

        }

        return $this->render('acceuil/index.html.twig', [
            'notes' => $n,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/acceuil/{id}', name:'app_acceuil')]
    public function detail(EntityManagerInterface $em, $id, Request $request)
    {
        $note = $em->getRepository(Note::class)->find($id); 
        $form = $this->createForm(NotesTypeType::class, $note);
        $form->handleRequest($request);
    
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($note);
            $em->flush();
            
            $this->addFlash('warning','Form submitted'); 
            return $this->redirectToRoute("app_acceuil"); 
            
        }      
       return $this->render('acceuil/index.html.twig', [
            'form' => $form->createView(),
            'note' => $note         
        ] );   
}

    

   /*  #[Route('/acceuil', name: 'app_acceuil')]
    public function new(CalculMethode $calculmethode): Response
    {
        
        $moyenne = $calculmethode->getCalculNote();
        $this->addFlash('success', $moyenne);
        
    }
 */
/* 
#[Route('/acceuil', name: 'app_acceuil')]
public function translate(TranslatorInterface $translator)
$translator -> $trans()
 */

    

 
}





