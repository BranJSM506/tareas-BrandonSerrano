<?php

require_once "../src/controllers/UsuariosController.php";

$method = $_SERVER["REQUEST_METHOD"];

// Verifica si PATH_INFO está definido, si no, asigna una cadena vacía
$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], '/') : '';

$segmentos = explode("/", $path);

$queryString = $_SERVER['QUERY_STRING'];
parse_str($queryString, $queryParams);

if ($path == "usuarios") {
    $usuariosController = new UsuariosController();
    switch ($method) {
        case 'GET':
            $id = isset($queryParams['id']) ? $queryParams['id'] : null;

            if ($id != null) {
                $usuariosController->ObtenerPorId($id);
            } else {
                $usuariosController->ObtenerTodos();
            }
            break;
        
        default:
            echo json_encode(["Error" => "Método no implementado todavía para usuarios."]);
    }
}

?>
