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
        //capturar el repositorio de la Tabla contra la DB
        $tapaRepository = $this->getDoctrine()->getRepository(Tapa::class);
        $tapas = $tapaRepository->findAll( );

        // replace this example code with whatever you need
        return $this->render('front/index.html.twig', array('tapas' => $tapas ));
    }

}