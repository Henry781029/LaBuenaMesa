<?php
class Bdata
{
    public $bd;
    public function getConnection()
    {
        $this->bd = null;
        try{
            $this->bd = new mysqli('localhost', 'root', '', 'restaurante');
        }catch(Exception $e){
            echo "La base de datos no se conecto" . $e->getMessage();
        }

        return $this->bd;

    }

}