<?php

namespace DsCorp\General\GeneralBundle\Entity;

/**
 * pais
 */
class pais
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombrePais;


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
     * Set nombrePais
     *
     * @param string $nombrePais
     *
     * @return pais
     */
    public function setNombrePais($nombrePais)
    {
        $this->nombrePais = $nombrePais;

        return $this;
    }

    /**
     * Get nombrePais
     *
     * @return string
     */
    public function getNombrePais()
    {
        return $this->nombrePais;
    }
}

