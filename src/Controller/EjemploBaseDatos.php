<?php
//src/Controller/EjemploBaseDatos.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use App\Entity\Equipo;
use App\Entity\Jugador;


class EjemploBaseDatos extends AbstractController
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
        return new Response('<html><body>'
            . $nombre . ' | '
            . $fundacion . ' | '
            . $socios . ' | '
            . $ciudad .
            '</body></html>');
    }


    /**
     * @Route("/mostrar_equipo3")
     */
    public function mostrar_equipo3()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $eq = $entityManager->find(Equipo::class, 1);
        echo $eq->getSocios();
        $eq->setSocios(70000);
        $entityManager->flush();
        $eq = $entityManager->find(Equipo::class, 100);
        if (!$eq) {
            return new Response('<html><body><p>Equipo no encontrado</p></body></html>');
        } else {
            return new Response('<html><body><p>Equipo actualizado</p></body></html>');
        }
    }

    /**
     * @Route("/nuevo_equipo")
     */
    public function nuevo_equipo()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $nuevo = new Equipo();
        $nuevo->setNombre("Real Valladolid C.F.");
        $nuevo->setFundacion(1928);
        $nuevo->setSocios(20000);
        $nuevo->setCiudad("Valladolid");

        $entityManager->persist($nuevo);

        $entityManager->flush();

        return new Response('<html><body>Equipo insertado: ' . $nuevo->getId() . '</body></html>');
    }

    /**
     * @Route("/borrar_equipo/{id}")
     */
    public function borrar_equipo($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $equipo = $entityManager->find(Equipo::class, $id);
        if (!$equipo) {
            return new Response('<html><body>Equipo no encontrado</body></html>');
        } else {
            $entityManager->remove($equipo);
            $entityManager->flush();
            return new Response('<html><body>Equipo borrado</body></html>');
        }
    }

    /**
     * @Route("/mostrar_jugador/{id}")
     */
    public function mostrar_jugador($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $jugador = $entityManager->find(Jugador::class, $id);

        if (!$jugador) {
            return new Response('<html><body>Jugador no encontrado</body></html>');
        } else {
            $equipo = $jugador->getEquipo();
            return new Response('<html><body><h2>Nombre del jugador: '
                . $jugador->getNombre() . '</h2><p><h3>Equipo: '
                . $equipo->getNombre() . '</h3></p></body></html>');
        }
    }

    /**
     * @Route("/mostrar_jugador2/{id}")
     */
    public function mostrar_jugador2($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $jugador = $entityManager->find(Jugador::class, $id);

        if (!$jugador) {
            return new Response('<html><body>Jugador no encontrado</body></html>');
        } else {
            $nombre = $jugador->getNombre();
            $id_equipo = $jugador->getEquipo();
            $equipo = $entityManager->find(Equipo::class, $id_equipo);
            $nombre_equipo = $equipo->getNombre();

            return new Response('<html><body><h2>Nombre del jugador: '
                . $nombre . '</h2><p><h3>Equipo: '
                . $nombre_equipo . '</h3></p></body></html>');
        }
    }
}
