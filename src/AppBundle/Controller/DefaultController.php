<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Tapa;
use AppBundle\Entity\Categoria;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        //capturar el repositorio de la Tabla contra la DB
        $tapaRepository = $this->getDoctrine()->getRepository(Tapa::class);
        $tapas = $tapaRepository->findByTop(1);

        // replace this example code with whatever you need
        return $this->render('front/index.html.twig', array('tapas' => $tapas ));
    }

    /**
     * @Route("/nosotros", name="nosotros")
     */
    public function nosotrosAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('front/nosotros.html.twig');
    }

     /**
     * @Route("/contactar/{sitio}", name="contactar")
     */
    public function contactarAction(Request $request, $sitio="todos" )
    {
        // replace this example code with whatever you need
        return $this->render('front/bares.html.twig', array("sitio" => $sitio));
    }

    /**
     * @Route("/tapa/{id}", name="tapa")
     */
    public function tapaAction(Request $request, $id = null )
    {
        if ($id != null ) {
            $tapaRepository = $this->getDoctrine()->getRepository(Tapa::class);
            $tapa = $tapaRepository->find( $id );
            return $this->render('front/tapa.html.twig', array("tapa" => $tapa));
        } else {
            return $this->redirectToRoute('homepage');
        }
    }

    /**
     * @Route("/categoria/{id}", name="categoria")
     */
    public function categoriaAction(Request $request, $id = null )
    {
        if ($id != null ) {
            $categoriaRepository = $this->getDoctrine()->getRepository(Categoria::class);
            $categoria = $categoriaRepository->find( $id );
            return $this->render('front/categoria.html.twig', array("categoria" => $categoria) );
        } else {
            return $this->redirectToRoute('homepage');
        }
    }
}
