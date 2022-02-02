<?php
//src/Controller/Ejemplo1.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Ejemplo1 extends AbstractController
{
    /**
     * @Route("/hola", name="hola")
     */
    public function home()
    {
        return new Response('<html><body>Hola</body></html>');
    }

    /**
     * @Route("/producto/{num1}/{num2}", name="producto")
     */
    public function producto($num1, $num2)
    {
        $producto = $num1 * $num2;
        return new Response("<html><body>   " . $producto . "   </body></html>");
    }

    /**
     * @Route("/defecto1/{num}", name="defecto1")
     */
    public function defecto1($num = 3)
    {
        return new Response("<html><body>" . $num . "</body></html>");
    }

    /**
     * @Route("/defecto2/{num?4}", name="defecto2")
     */
    public function defecto2($num)
    {
        return new Response("<html><body>" . $num . "</body></html>");
    }

    /**
     * @Route("/testRequest", name="test")
     */
    public function testRequest(Request $request)
    {
        $ip = $request->getClientIp();

        return new Response(('<html><body>IP:' . $ip . '</body></html>'));
    }

    /** */
}
