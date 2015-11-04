<?php

namespace DsCorp\Equipo\EquipoBundle\Entity;

/**
 * procesador
 */
class procesador
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
    private $modelo;

    /**
     * @var string
     */
    private $velocidad;


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
     * @return procesador
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
     * Set modelo
     *
     * @param string $modelo
     *
     * @return procesador
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set velocidad
     *
     * @param string $velocidad
     *
     * @return procesador
     */
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;

        return $this;
    }

    /**
     * Get velocidad
     *
     * @return string
     */
    public function getVelocidad()
    {
        return $this->velocidad;
    }
}

