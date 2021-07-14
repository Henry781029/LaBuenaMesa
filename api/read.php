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

$buscar = $item->buscarplato();
$itemCount = $buscar->num_rows;
if($itemCount > 0){
    $leerplato = array();
    $leerplato['cuerpo'] = array();
    while($row = $buscar->fetch_assoc()){
        array_push($leerplato['cuerpo'], $row);
    }
    echo json_encode($leerplato);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "busqueda no realizada")
    );
}