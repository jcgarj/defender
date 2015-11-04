<?php

namespace DsCorp\Equipo\EquipoBundle\Entity;

/**
 * producto
 */
class producto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $termino;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return producto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set termino
     *
     * @param string $termino
     *
     * @return producto
     */
    public function setTermino($termino)
    {
        $this->termino = $termino;

        return $this;
    }

    /**
     * Get termino
     *
     * @return string
     */
    public function getTermino()
    {
        return $this->termino;
    }
}

