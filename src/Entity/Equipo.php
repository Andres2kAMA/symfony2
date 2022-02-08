<?php
// src/Entity/Equipo.php
namespace App\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="equipo")
 * @ORM\Entity(repositoryClass="EquipoRepository")
 */

class Equipo
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;
    /** @ORM\Column(type="string") **/
    private $nombre;
    /** @ORM\Column(type="integer") **/
    private $fundacion;
    /** @ORM\Column(type="integer") **/
    private $socios;
    /** @ORM\Column(type="string") **/
    private $ciudad;

    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getFundacion()
    {
        return $this->nombre;
    }
    public function setFundacion($fundacion)
    {
        $this->nombre = $fundacion;
    }
    public function getSocios()
    {
        return $this->nombre;
    }
    public function setSocios($socios)
    {
        $this->nombre = $socios;
    }
    public function getCiudad()
    {
        return $this->nombre;
    }
    public function setCiudad($ciudad)
    {
        $this->nombre = $ciudad;
    }
}