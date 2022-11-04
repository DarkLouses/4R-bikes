<?php

class productos_class
{
    public $id_producto;
    public $tipo_producto;
    public $nombre_producto;
    public $descripcion_producto;
    public $stock_producto;
    public $precio_producto;
    public $img_producto;
    public $proveedorID;
    /**
     * @return mixed
     */
    public function getId_producto()
    {
        return $this->id_producto;
    }

    /**
     * @return mixed
     */
    public function getTipo_producto()
    {
        return $this->tipo_producto;
    }

    /**
     * @return mixed
     */
    public function getNombre_producto()
    {
        return $this->nombre_producto;
    }

    /**
     * @return mixed
     */
    public function getDescripcion_producto()
    {
        return $this->descripcion_producto;
    }

    /**
     * @return mixed
     */
    public function getStock_producto()
    {
        return $this->stock_producto;
    }

    /**
     * @return mixed
     */
    public function getPrecio_producto()
    {
        return $this->precio_producto;
    }

    /**
     * @return mixed
     */
    public function getImg_producto()
    {
        return $this->img_producto;
    }

    /**
     * @return mixed
     */
    public function getProveedorID()
    {
        return $this->proveedorID;
    }

    /**
     * @param mixed $id_producto
     */
    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    /**
     * @param mixed $tipo_producto
     */
    public function setTipo_producto($tipo_producto)
    {
        $this->tipo_producto = $tipo_producto;
    }

    /**
     * @param mixed $nombre_producto
     */
    public function setNombre_producto($nombre_producto)
    {
        $this->nombre_producto = $nombre_producto;
    }

    /**
     * @param mixed $descripcion_producto
     */
    public function setDescripcion_producto($descripcion_producto)
    {
        $this->descripcion_producto = $descripcion_producto;
    }

    /**
     * @param mixed $stock_producto
     */
    public function setStock_producto($stock_producto)
    {
        $this->stock_producto = $stock_producto;
    }

    /**
     * @param mixed $precio_producto
     */
    public function setPrecio_producto($precio_producto)
    {
        $this->precio_producto = $precio_producto;
    }

    /**
     * @param mixed $img_producto
     */
    public function setImg_producto($img_producto)
    {
        $this->img_producto = $img_producto;
    }

    /**
     * @param mixed $proveedorID
     */
    public function setProveedorID($proveedorID)
    {
        $this->proveedorID = $proveedorID;
    }


}