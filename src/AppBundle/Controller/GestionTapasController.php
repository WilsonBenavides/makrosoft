<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Tapa;
use AppBundle\Form\TapaType;
use AppBundle\Form\CategoriaType;
use AppBundle\Entity\Categoria;

/**
     * @Route("/gestionTapas")
     */
class GestionTapasController extends Controller
{
    /**
     * @Route("/nuevaTapa", name="nuevaTapa")
     */
    public function nuevaTapaAction(Request $request)
    {
        
        $tapa = new Tapa();
        //contruyendo el formulario
        $form = $this->createForm( TapaType::class, $tapa );    

        //recogemos la informacion
        $form->handleRequest( $request );
        if ( $form->isSubmitted() && $form->isValid() ) {
            //rellenar el Entity Tapa
            $tapa = $form->getData();
            $fotoFile = $tapa->getFoto();
            $fileName = $this->generateUniqueFileName().'.'.$fotoFile->guessExtension();
            $fotoFile->move(
                $this->getParameter( 'tapas_directory' ),
                $fileName
            );
            $tapa->setFoto( $fileName );            
            $tapa->setFechaCreacion(new \DateTime()  );

            //almacenar nueva tapa
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist( $tapa );
            $entityManager->flush();
            return $this->redirectToRoute( 'tapa', array( 'id' => $tapa->getId() ) );
        }
        
        return $this->render('gestionTapas/nuevaTapa.html.twig', array( 'form' => $form->createView() ));
    }

     /**
     * @Route("/nuevaCategoria", name="nuevaCategoria")
     */
    public function nuevaCategoriaAction(Request $request)
    {
        $categoria = new Categoria();
        //contruyendo el formulario
        $form = $this->createForm( CategoriaType::class, $categoria );    

        //recogemos la informacion
        $form->handleRequest( $request );
        if ( $form->isSubmitted() && $form->isValid() ) {
            //rellenar el Entity Tapa
            $categoria = $form->getData();
            $fotoFile = $categoria->getFoto();
            $fileName = $this->generateUniqueFileName().'.'.$fotoFile->guessExtension();
            $fotoFile->move(
                $this->getParameter( 'tapas_directory' ),
                $fileName
            );
            $categoria->setFoto( $fileName );            

            //almacenar nueva categoria
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist( $categoria );
            $entityManager->flush();
            return $this->redirectToRoute( 'categoria', array( 'id' => $categoria->getId() ) );
        }
        
        return $this->render('gestionTapas/nuevaCategoria.html.twig', array( 'form' => $form->createView() ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName() 
    {
        return md5( uniqid() );
    }
}