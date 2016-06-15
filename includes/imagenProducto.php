<?php
  require_once('conexbd.php');
  $con=conexionBD('localhost', 'root', '', 'shalomimportca');
  function fObtenerMime($wfParamCadena){
      $fsExtension = $wfParamCadena;
  	$mime="";
      if  ($fsExtension =='bmp'){ $mime = 'image/bmp'; }
      if  ($fsExtension =='gif' ){ $mime ='image/gif' ; }
      if  ($fsExtension =='jpe' ){ $mime ='image/jpeg' ; }
      if  ($fsExtension =='jpeg'){ $mime = 'image/jpeg' ; }
      if  ($fsExtension =='jpg' ){ $mime ='image/jpeg'; }
      if  ($fsExtension =='png' ){ $mime = 'image/png'; }
      return $mime;
  }
  	$id_producto = $_GET['id'];
    $consulta = "SELECT * FROM tbl_productos WHERE id_producto=".$id_producto;
  	$resultado = mysqli_query($con,$consulta);
  	$imagen = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
  	$mime = fObtenerMime($imagen['fotoExtension_producto']);
  	$contenido = $imagen['fotoBinario_producto'];
  	header("Content-type:$mime");
  	print $contenido;
  	mysqli_close($con);
?>
