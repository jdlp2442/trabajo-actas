<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json');

require_once "Controlador/Controlador.php";
require_once "Modelo/Modelo.php";

$model = new Modelo();
$controller = new Controlador($model);

$method = $_SERVER["REQUEST_METHOD"];
$table = $_GET['table'];

if ($method == "GET") {
    $id = $_GET['id'];
    if ($table == "register" && isset($_GET['action'])) {
        $action = $_GET['action'];
        $sql = "select * from $table";
        return $controller->$method($sql);
    } else if ($table == "account" && isset($_GET['action'])) {
        $action = $_GET['action'];
        $sql = "select * from $table";
        return $controller->$method($sql);
    }
    if ($table == 'account') {
        $sql = "select * from $table where username = '$id'";
    } else if ($table == "register") {
        $sql = "select * from $table where idregister = $id";
    }

    return $controller->$method($sql);
}
else if ($method == "DELETE") {
    $id = $_GET['id'];

    if ($table == 'account') {
        $sql = "delete from $table where username = '$id'";
    } else if ($table == "register") {
        $sql = "delete from $table where idregister = '$id'";
    }

    $controller->$method($sql);
} else if ($method == "POST") {
    $rawJson = file_get_contents('php://input');
    $array = json_decode($rawJson, true);
    if (isset($array['password_2'])) {
        $contrasenia_encriptada = password_hash($array['password_2'], PASSWORD_DEFAULT);
        $array['password_2'] = $contrasenia_encriptada;
    }
    
    $controller->$method($table, $array);
} else if ($method == "PUT") {
    $id = $_GET['id'];
    $rawJson = file_get_contents('php://input');
    $array = json_decode($rawJson, true);

    if (isset($array['password_2'])) {
        $contrasenia_encriptada = password_hash($array['password_2'], PASSWORD_DEFAULT);
        $array['password_2'] = $contrasenia_encriptada;
    }
    $controller->$method($table, $id, $array);
}




