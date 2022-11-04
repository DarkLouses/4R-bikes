<?php

class proveedor_class
{
    public $id_proveedor;
    public $nombre;
    public $telefono;
    public $email;

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of id_proveedor
     */ 
    public function getId_proveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * Set the value of id_proveedor
     *
     * @return  self
     */ 
    public function setId_proveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}