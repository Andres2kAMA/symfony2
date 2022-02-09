<?php
//src/Controller/ProbarBidireccional.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use App\Entity\EquipoBidireccional;
use App\Entity\JugadorBidireccional;


class ProbarBidireccional extends AbstractController
{

    /**
     * @Route("/bidireccional/{id}")
     */
    public function bidireccional($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $eq = $entityManager->find(EquipoBidireccional::class, $id);
        if (!$eq) {
            return new Response('<html><body><p>Equipo no encontrado</p></body></html>');
        } else {
            $lista = "Nombre del equipo: " . $eq->getNombre() . "<br>";
            $jugadores = $eq->getJugadores();
            $lista .= "Lista de jugadores<br>";
            foreach ($jugadores as $jugador) {
                $lista .= "Nombre: " . $jugador->getNombre() . "<br>";
            }
            return new Response('<html><body>' . $lista . '</body></html>');
        }
    }
}
