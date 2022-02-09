<?php
//src/Controller/FindBy.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle;
use App\Entity\Equipo;
use App\Entity\Jugador;


class FindBy extends AbstractController
{

    /**
     * @Route("/consulta")
     */
    public function consulta()
    {
        $mensaje = "Jugadores con 12 años <br><br>";
        $entityManager = $this->getDoctrine()->getManager();
        $jugadores = $entityManager->getRepository(Jugador::class)->findBy(array('edad' => 12));

        foreach ($jugadores as $jugador) {
            $mensaje .= "Nombre: " . $jugador->getNombre() . " " . $jugador->getApellidos() . "<br>";
        }
        return new Response('<html><body>' . $mensaje . '</body></html>');
    }

    /**
     * @Route("/consulta2")
     */
    public function consulta2()
    {
        $mensaje = "Equipos de Madrid fundados en 1900 <br><br>";
        $entityManager = $this->getDoctrine()->getManager();
        $equipos = $entityManager->getRepository(Equipo::class)->findBy(array('fundacion' => 1900, 'ciudad' => "Madrid"));

        foreach ($equipos as $equipo) {
            $mensaje .= "Nombre: " . $equipo->getNombre() . "<br>";
        }

        return new Response('<html><body>' . $mensaje . '</body></html>');
    }

    /**
     * @Route("/consulta3")
     */
    public function consulta3()
    {
        $mensaje = "Equipos cuyo nombre es 'F. C. Barcelona' <br><br>";
        $entityManager = $this->getDoctrine()->getManager();
        $equipo = $entityManager->getRepository(Equipo::class)->findOneBy(array('nombre' => 'F. C. Barcelona'));

        $mensaje .= "Nombre: " . $equipo->getNombre() . "<br>";

        return new Response('<html><body>' . $mensaje . '</body></html>');
    }
}
