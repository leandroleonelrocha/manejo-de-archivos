<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

//cors
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
header("Content-Type: application/json");

$rutaBase = '../archivos';
$ficheros = scandir($rutaBase);

$resultados = [];
foreach ($ficheros as $key => $value) {
    # code...
    $inforArchivos = [];
    $inforArchivos['nombre'] = $value;
    $inforArchivos['tipo']   = obtenerExtension($rutaBase .'/'. $value);
    $inforArchivos['tamano'] = convertirBytes(filesize($rutaBase .'/'. $value));
    $inforArchivos['ruta']   = $rutaBase;
    $inforArchivos['raiz']   = dirname($rutaBase);
    
    if($value!='.' && $value!='..')
    array_push($resultados, $inforArchivos);
}

function obtenerExtension($parameter){

    $tipo = filetype($parameter);
    if($tipo == 'file') {
        return substr($parameter, strripos($parameter, '.') + 1 );

    }else{
        return $tipo;
    }
}

function convertirBytes($parameter){
    $decimales = 0;
    $unidades  = ["B", "KB", "MB", "GB"];
    $exp       = floor(log($parameter,1024)) | 0;
    return round($parameter / (pow(1024,$exp)), $decimales).$unidades[$exp];

}

print_r(stripslashes(json_encode($resultados)));



?>