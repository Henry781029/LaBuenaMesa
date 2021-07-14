<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-method: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Header: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With");

include_once '../Bdata.php';
include_once '../platos.php';

$basedatos = new Bdata();
$bd = $basedatos->getConnection();
$item = new platos($bd);

$item->nombre = $_GET['nombre'];
$item->descripcion = $_GET['descripcion'];
$item->precio = $_GET['precio'];
$item->created = date('Y-m-d H:i:s');
if($item->crearplato()){
    echo 'el plato fue creado satisfactoriamente';
}else{
    echo 'El plato no pudo der creado';
}