<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Tapa;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
        $formBuilder = $this->createFormBuilder( $tapa );
        $formBuilder->add( 'nombre', TextType::class );
        $formBuilder->add( 'descripcion', TextareaType::class );
        $formBuilder->add( 'fechaCreacion', DateType::class );
        $formBuilder->add( 'salvar', SubmitType::class, array( 'label' => 'Nueva Tapa' ));
        $form = $formBuilder->getForm();
        
        return $this->render('gestionTapas/nuevaTapa.html.twig', array( 'form' => $form->createView() ));
    }

}