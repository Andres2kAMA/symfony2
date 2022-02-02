<?php
//src/Controller/Ejemplo1.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/base", name="hola")
 */
class EjemploRutaBase extends AbstractController
{
    /**
     * @Route("/hola", name="hola")
     */
    public function hola()
    {
        return new Response('<html><body>Hola</body></html>');
    }
}
