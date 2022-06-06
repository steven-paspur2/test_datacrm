<?php 
    /*
        @AUTHOR: Jeison Steven Paspur

        *Controlador encargado de realizar la peticion al model.
    */
    require_once('../models/model.php');
    $data = getData();
    if(!empty($data)){
        echo json_encode($data);
      }else{
        echo json_encode([]);
      }
?>