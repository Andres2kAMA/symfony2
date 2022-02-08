<?php
//src/Controller/EjemploRutaBase.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use App\Entity\Equipo;


class EjemploRutaBase extends AbstractController
{

    /**
     * @Route("/mostrar_equipo")
     */
    public function mostrar_equipo()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $eq = $entityManager->find(Equipo::class, 1);
        $nombre = $eq->getNombre();
        return new Response('<html><body>' . $nombre . '</body></html>');
    }

    /**
     * @Route("/mostrar_equipo2")
     */
    public function mostrar_equipo2()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $eq = $entityManager->find(Equipo::class, 4);
        $nombre = $eq->getNombre();
        $fundacion = $eq->getFundacion();
        $socios = $eq->getSocios();
        $ciudad = $eq->getCiudad();
        return new Response('<html><body>' . $nombre . ' | ' . $fundacion . '</body></html>');
    }
}
