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

$item->idplato = isset($_GET['idPlato']) ? $_GET['idPlato'] : die();

if($item->borrarPlato()){
    echo json_encode("Plato fue borrado correctamente");
}else{
    echo json_encode("El plato no pudo ser borrado");
}