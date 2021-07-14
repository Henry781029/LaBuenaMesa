<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../Bdata.php';
include_once '../platos.php';

$basedatos = new Bdata();
$db = $basedatos->getConnection();
$item = new platos($db);

$item->idplato = isset($_GET['idPlato']) ? $_GET['idPlato'] : die();
$item->recuperarRegistroplato();
if ($item->nombre != null) {

    $emp_arr = array(
        "idPlato" => $item->idplato,
        "nombre" => $item->nombre,
        "descripcion" => $item->descripcion,
        "precio" => $item->precio,
        "created" => $item->created
    );

    http_response_code(200);
    echo json_encode($emp_arr);
} else {
    http_response_code(404);
    echo json_encode("plato no encontrado.");
}