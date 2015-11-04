<?php

namespace DsCorp\Equipo\EquipoBundle\Entity;

/**
 * disco_duro
 */
class disco_duro
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $marca;

    /**
     * @var string
     */
    private $capacidad;

    /**
     * @var string
     */
    private $tipo;


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
     * Set marca
     *
     * @param string $marca
     *
     * @return disco_duro
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set capacidad
     *
     * @param string $capacidad
     *
     * @return disco_duro
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

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return disco_duro
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}

