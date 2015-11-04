<?php

namespace DsCorp\Empresa\EmpresaBundle\Entity;

/**
 * empresa
 */
class empresa
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $razonSocial;

    /**
     * @var string
     */
    private $rfc;

    /**
     * @var string
     */
    private $telefono1;

    /**
     * @var string
     */
    private $telefono2;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $paginaWeb;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     */
    private $fechaModificacion;

    /**
     * @var integer
     */
    private $idCreacion;

    /**
     * @var integer
     */
    private $idModificacion;


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
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return empresa
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     *
     * @return empresa
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set telefono1
     *
     * @param string $telefono1
     *
     * @return empresa
     */
    public function setTelefono1($telefono1)
    {
        $this->telefono1 = $telefono1;

        return $this;
    }

    /**
     * Get telefono1
     *
     * @return string
     */
    public function getTelefono1()
    {
        return $this->telefono1;
    }

    /**
     * Set telefono2
     *
     * @param string $telefono2
     *
     * @return empresa
     */
    public function setTelefono2($telefono2)
    {
        $this->telefono2 = $telefono2;

        return $this;
    }

    /**
     * Get telefono2
     *
     * @return string
     */
    public function getTelefono2()
    {
        return $this->telefono2;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return empresa
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set paginaWeb
     *
     * @param string $paginaWeb
     *
     * @return empresa
     */
    public function setPaginaWeb($paginaWeb)
    {
        $this->paginaWeb = $paginaWeb;

        return $this;
    }

    /**
     * Get paginaWeb
     *
     * @return string
     */
    public function getPaginaWeb()
    {
        return $this->paginaWeb;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return empresa
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     *
     * @return empresa
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    /**
     * Get fechaModificacion
     *
     * @return \DateTime
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Set idCreacion
     *
     * @param integer $idCreacion
     *
     * @return empresa
     */
    public function setIdCreacion($idCreacion)
    {
        $this->idCreacion = $idCreacion;

        return $this;
    }

    /**
     * Get idCreacion
     *
     * @return integer
     */
    public function getIdCreacion()
    {
        return $this->idCreacion;
    }

    /**
     * Set idModificacion
     *
     * @param integer $idModificacion
     *
     * @return empresa
     */
    public function setIdModificacion($idModificacion)
    {
        $this->idModificacion = $idModificacion;

        return $this;
    }

    /**
     * Get idModificacion
     *
     * @return integer
     */
    public function getIdModificacion()
    {
        return $this->idModificacion;
    }
}

