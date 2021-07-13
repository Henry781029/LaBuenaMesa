<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-method: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Header: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With");

include_once '../Bdata.php';
include_once '../platos.php';