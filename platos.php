<?php

class platos
{
    private $bd;
    private $bd_table = "plato";

    public $idplato;
    public $nombre;
    public $descripcion;
    public $precio;
    public $created;
    public $result;


    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function buscarplato()
    {
    $sqlQuery = "SELECT idPlato, nombre, descripcion, precio, created FROM " . $this->bd_table . "";
    $this->result = $this->bd->query($sqlQuery);
    return $this->result;
    }

    public function crearplato()
    {
    $this->nombre = htmlspecialchars(strip_tags($this->nombre));
    $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
    $this->precio = htmlspecialchars(strip_tags($this->precio));
    $this->created = htmlspecialchars(strip_tags($this->created));

    $consulta = "INSERT INTO ". $this->bd_table ." SET nombre = '" . $this->nombre . "', descripcion = '" . $this->descripcion . "', precio = '" . $this->precio . "', created = '" . $this->created . "'";     

    $this->bd->query($consulta);
    if($this->bd->affected_rows > 0){
        return true;
    }
    return false;

    }

    public function recuperarRegistroplato()
    {
    $consulta = "SELECT idPlato, nombre, descripcion, precio, created FROM " . $this->bd_table . " WHERE idPlato = " . $this->idplato;
    $buscar = $this->bd->query($consulta);
    $dataRow = $buscar->fetch_assoc();
    $this->nombre = $dataRow['nombre'];
    $this->descripcion = $dataRow['descripcion'];
    $this->precio = $dataRow['precio'];
    $this->created = $dataRow['created'];

    }

    public function actualizarPlato()
    {
    $this->nombre = htmlspecialchars(strip_tags($this->nombre));
    $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
    $this->precio = htmlspecialchars(strip_tags($this->precio));
    $this->created = htmlspecialchars(strip_tags($this->created));
    $this->idplato = htmlspecialchars(strip_tags($this->idplato));

    $consulta = "UPDATE ". $this->bd_table ." SET nombre = '" . $this->nombre . "', descripcion = '" . $this->descripcion . "', precio = '" . $this->precio . "', created = '" . $this->created . "', idPlato = '" . $this->idplato . "'";    

    $this->bd->query($consulta);
    if($this->bd->affected_rows > 0){
        return true;
    }
    return false;

    }

    public function borrarPlato()
    {
    $consulta = "DELETE FROM " . $this->bd_table . " WHERE idPlato = " . $this->idplato;
    $this->bd->query($consulta);
    if($this->bd->affected_rows > 0){
        return true;
    }
    return false;

    }

}