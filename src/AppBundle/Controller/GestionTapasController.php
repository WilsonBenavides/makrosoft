<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Tapa;
use AppBundle\Form\TapaType;

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
        if( !is_null( $request )) {
            $datos = $request->request->all();
            var_dump( $datos );
        }
        $tapa = new Tapa();
        //contruyendo el formulario
        $form = $this->createForm( TapaType::class, $tapa );    
        
        return $this->render('gestionTapas/nuevaTapa.html.twig', array( 'form' => $form->createView() ));
    }

}