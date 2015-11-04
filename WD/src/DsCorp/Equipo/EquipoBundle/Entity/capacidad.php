<?php

namespace DsCorp\Equipo\EquipoBundle\Entity;

/**
 * capacidad
 */
class capacidad
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $capacidad;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set capacidad
     *
     * @param string $capacidad
     *
     * @return capacidad
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get capacidad
     *
     * @return string
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }
}

