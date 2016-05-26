<?php
  function conexionBD($servidor, $usuario, $pass, $bd){
    //error_reporting(0);
    $conexion=mysqli_connect($servidor, $usuario, $pass, $bd);
    if(!$conexion){
      echo "Error: no se puede conectar a la base de datos '".$bd."'.</br>".PHP_EOL;
      echo "Error ".mysqli_connect_errno().": ".mysqli_connect_error().".".PHP_EOL;
    }else{
      return $conexion;
    }
  }
?>
