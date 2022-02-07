<?php
//src/Controller/Tarea1.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Tarea1 extends AbstractController
{
    //EJERCICIO 1

    /**
     * @Route("/calculadora/{num1}/{num2}", name="calculadora")
     */
    public function calculadora($num1, $num2)
    {
        $resta = $num1 - $num2;
        $suma = $num1 + $num2;
        $multiplicacion = $num1 * $num2;
        $division = $num1 / $num2;
        $modulo = $num1 % $num2;

        return new Response("<html>
                                <body>
                                    <p>Resta: " . $resta . "</p>
                                    <p>Suma: " . $suma . "</p>
                                    <p>Multiplicación: " . $multiplicacion . "</p>
                                    <p>División: " . $division . "</p>
                                    <p>Módulo: " . $modulo . "</p>
                                </body>
                            </html>");
    }


    //EJERCICIO 2

    /**
     * @Route("/factorial/{num1}", name="factorial")
     */
    public function factorial($num1)
    {

        if ($num1 >= 0 && ctype_digit($num1)) {
            $factorial = 1;

            for ($i = $num1; $i > 0; $i--) {
                $factorial *= $i;
            }
            return new Response("<html><body>" . $factorial . "</body></html>");
        } else {
            return new Response("<html><body><p>¡ERROR!</p></body></html>");
        }
    }


    //EJERCICIO 3

    /**
     * @Route("/aleatorio", name="aleatorio")
     */
    public function aleatorio()
    {
        $numAleatorio = rand(1, 100);

        if ($numAleatorio <= 50) {
            return new Response("<html><body> El número " . $numAleatorio . " es menor o igual que 50</body></html>");
        } else {
            return new Response("<html><body> El número " . $numAleatorio . " es mayor que 50</body></html>");
        }
    }


    //EJERCICIO 4

    /**
     * @Route("/areatriangulo/{num1}/{num2}", name="areatriangulo")
     */
    public function areatriangulo($num1, $num2)
    {
        return new Response("<html><body>El área del triángulo es " . ($num1 * $num2) / 2 . "</body></html>");
    }


    //EJERCICIO 5


    /**
     * @Route("/palindromo/{texto}", name="palindromo")
     */
    public function palindromo($texto)
    {
        $textoInvertido = strrev($texto);

        if (strcmp($texto, $textoInvertido) == 0) {
            return new Response(('<html><body>La palabra ' . $texto . '  es una palabra palíndroma</body></html>'));
        } else {
            return new Response(('<html><body>La palabra ' . $texto . '  no es una palabra palíndroma</body></html>'));
        }
    }


    //EJERCICIO 6


    /**
     * @Route("/sumatorio", name="sumatorio")
     */
    public function sumatorio()
    {
        $numAleatorio = rand(1, 20);

        $sumatorio = 0;

        for ($i = 1; $i <= $numAleatorio; $i++) {
            $sumatorio += $i;
        }

        return new Response(('<html><body>El sumatorio de ' . $numAleatorio . '  es ' . $sumatorio . '</body></html>'));
    }



    //EJERCICIO 7


    /**
     * @Route("/ecuacion/{a}/{b}/{c}", name="ecuacion")
     */
    public function ecuacion($a, $b, $c)
    {
        $menosB = $b * -1;

        $bCuadrado = pow($b, 2);
        $menos4ac =  (4 * $a * $c);
        $restaRaiz = $bCuadrado - $menos4ac;

        if ($restaRaiz >= 0) {
            $raiz = pow($restaRaiz, (1 / 2));

            $dobleA = 2 * $a;

            $resultado1 = ($menosB + $raiz) / $dobleA;
            $resultado2 = ($menosB - $raiz) / $dobleA;


            return new Response("<html><body><p>Resultado 1: " . $resultado1 . "</p><p>Resultado 2: " . $resultado2 . "</p></body></html>");
        } else {
            return new Response("<html><body><p>¡ERROR!</p></body></html>");
        }
    }


    //EJERCICIO 8


    /**
     * @Route("/esPrimo/{num}", name="esPrimo")
     */
    public function esPrimo($num)
    {
        if ($num == 2 || $num == 3 || $num == 5 || $num == 7) {
            return new Response("<html><body><p>El número " . $num . " es primo</p></body></html>");
        } else {
            if ($num % 2 != 0) {
                for ($i = 3; $i <= sqrt($num); $i += 2) {
                    if ($num % $i == 0) {
                        return new Response("<html><body><p>El número " . $num . " NO es primo</p></body></html>");
                    }
                }
                return new Response("<html><body><p>El número " . $num . " es primo</p></body></html>");
            }
        }
        return new Response("<html><body><p>El número " . $num . " NO es primo</p></body></html>");
    }
}
