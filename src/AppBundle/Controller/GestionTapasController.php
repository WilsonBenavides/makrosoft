<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Tapa;

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
        $formBuilder = $this->createFormBuilder( $tapa );
        $form = $formBuilder->getForm();
        
        return $this->render('gestionTapas/nuevaTapa.html.twig', array( 'form' => $form->createView() ));
    }

}