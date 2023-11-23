<?php

namespace App\Controller;


use App\Entity\LesMatieres;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\LesMatieresType;
use Symfony\Contracts\Translation\TranslatorInterface;


class MatieresController extends AbstractController
{
    #[Route('/matieres', name: 'app_matieres')]
    public function index(EntityManagerInterface $em,Request $request): Response
    {
      
        $mtr =  $em->getRepository(LesMatieres::class)->findAll();
        $matiere = new LesMatieres();
        $form = $this->createForm(LesMatieresType::class, $matiere);
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
        
         $em->persist($matiere); 
         $em->flush();  

         $this->addFlash('success','Form submitted'); 
            return $this->redirectToRoute("app_matieres");
     
         }
        return $this->render('matieres/index.html.twig', [
            'matieres' => $mtr,
            'form' => $form->createView(),
        ]);
    }
   

    #[Route('/matiere/{id}', name:'app_matiere')]
    public function detail(EntityManagerInterface $em, $id, Request $request)
    {
        $matiere = $em->getRepository(LesMatieres::class)->find($id); 
        $form = $this->createForm(LesMatieresType::class, $matiere);
        $form->handleRequest($request);
    
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($matiere);
            $em->flush();
            
            $this->addFlash('warning','Form submitted'); 
            return $this->redirectToRoute("app_matieres"); 
            
        }      
       return $this->render('matieres/edit.html.twig', [
            'form' => $form->createView(),
            'matiere' => $matiere         
        ] );   
}





#[Route('/delete/{id}', name:'deletem')] 

public function remove(EntityManagerInterface $em,$id)

{

  $matiere = $em->getRepository(LesMatieres::class)->find($id);
   $em->remove($matiere);
   $em->flush();

    return $this->redirectToRoute("app_matieres"); 
}



}
