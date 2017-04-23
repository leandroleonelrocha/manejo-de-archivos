<?php

//cors
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS");
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === 'GET'){


  if ($_REQUEST['ruta-archivo']){
      $file = unlink($_REQUEST['ruta-archivo']);
      
  echo ("archivo $file borrado");
  }else
  {
  echo ("Error $file");
  }

}else{

    echo 'asd';
}

?>