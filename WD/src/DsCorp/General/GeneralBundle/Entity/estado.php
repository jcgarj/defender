<?php

namespace DsCorp\General\GeneralBundle\Entity;

/**
 * estado
 */
class estado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreEstado;


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
     * Set nombreEstado
     *
     * @param string $nombreEstado
     *
     * @return estado
     */
    public function setNombreEstado($nombreEstado)
    {
        $this->nombreEstado = $nombreEstado;

        return $this;
    }

    /**
     * Get nombreEstado
     *
     * @return string
     */
    public function getNombreEstado()
    {
        return $this->nombreEstado;
    }
}

