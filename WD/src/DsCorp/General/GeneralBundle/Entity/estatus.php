<?php

namespace DsCorp\General\GeneralBundle\Entity;

/**
 * estatus
 */
class estatus
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $estatus;


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
     * Set estatus
     *
     * @param string $estatus
     *
     * @return estatus
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return string
     */
    public function getEstatus()
    {
        return $this->estatus;
    }
}

