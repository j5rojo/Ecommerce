<?php
//Incluimos la clase del PhpMailer
  require_once("class/class.phpmailer.php");
//Validaciones Mensaje
  if(isset($_POST['btn-enviar'])){
    if($_POST['nombre'] == ''){
      echo '<h2 id="error">Debe Escribir su Nombre</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombre").removeClass("placeholder");
                $("#nombre").addClass("placeholder-error");
                $("#nombre").focus().css("border-color", "#dd4b39");
                $("#nombre").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif($_POST['correo'] == ''){
      echo '<h2 id="error">Debe Escribir su Correo Electrónico</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombre").attr("value", "'.$_POST['nombre'].'");
                $("#correo").removeClass("placeholder");
                $("#correo").addClass("placeholder-error");
                $("#correo").focus().css("border-color", "#dd4b39");
                $("#correo").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif(!preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['correo'])){
      echo '<h2 id="error">Debe Escribir un Correo Electrónico Válido</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombre").attr("value", "'.$_POST['nombre'].'");
                $("#correo").removeClass("placeholder");
                $("#correo").addClass("placeholder-error");
                $("#correo").focus().css("border-color", "#dd4b39");
                $("#correo").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif($_POST['asunto'] == ''){
      echo '<h2 id="error">Debe Escribir un Asunto para su Mensaje</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombre").attr("value", "'.$_POST['nombre'].'");
                $("#correo").attr("value", "'.$_POST['correo'].'");
                $("#asunto").removeClass("placeholder");
                $("#asunto").addClass("placeholder-error");
                $("#asunto").focus().css("border-color", "#dd4b39");
                $("#asunto").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
    }elseif($_POST['mensaje'] == ''){
      echo '<h2 id="error">Debe Escribir un Mensaje</h2>';
      echo '<script type="text/javascript">
              $(document).ready(function() {
                $("#nombre").attr("value", "'.$_POST['nombre'].'");
                $("#correo").attr("value", "'.$_POST['correo'].'");
                $("#asunto").attr("value", "'.$_POST['asunto'].'");
                $("#mensaje").removeClass("placeholder");
                $("#mensaje").addClass("placeholder-error");
                $("#mensaje").focus().css("border-color", "#dd4b39");
                $("#mensaje").focus().css("color", "#dd4b39");
                $("#error").addClass("msj-error");
              });
            </script>';
  //Termina Validaciones Mensaje
    }else{
    //Envio Mensaje
      //Datos del mensaje
        $datos = array(
            "para" => "j5rojo94@gmail.com",
          "nombre" => $_POST['nombre'],
              "de" => $_POST['correo'],
          "asunto" => $_POST['asunto'],
         "mensaje" => $_POST['mensaje']
        );

      //Cuerpo del Mensaje
        $body = "<table border='0' style='font-size:18px'>";
        $body .= "<tr><td colspan='2'><img src='images/LOGO.png' alt='Tiendas Shalom' width='200' height='80'/></td></tr>";
        $body .= "<tr><td colspan='2'><strong>Mensaje para Shalom Import C.A.</strong></td></tr>";
        $body .= "<tr><td colspan='2'>&nbsp;</td></tr>";
        $body .= "<tr><td><strong>De:</strong>&nbsp;</td><td>".$datos['nombre']."</td></tr>";
        $body .= "<tr><td><strong>Correo:</strong>&nbsp;</td><td>".$datos['de']."</td></tr>";
        $body .= "<tr><td><strong>Asunto:</strong>&nbsp;</td><td>".$datos['asunto']."</td></tr>";
        $body .= "<tr><td colspan='2'><strong>Mensaje:</strong>&nbsp;</td></tr>";
        $body .= "<tr><td colspan='2'>".$datos['mensaje']."</td></tr>";
        $body .= "</table>";

      //Creacion del Mensaje
        $mail = new PHPMailer();
        $mail->setFrom($datos['de'], $datos['nombre']);
        $mail->addReplyTo($datos['de'], $datos['nombre']);
        $mail->addAddress($datos['para'], "Shalom Import C.A.");
        $mail->Subject = $datos['asunto'];
        $mail->msgHTML($body);

      if(!$mail->send()){
        echo "<h2 class='msj-error'>El Mensaje No Pudo Ser Enviado</h2>";
      }else{
        echo "<h2 class='msj-correcto'>Mensaje Enviado</h2>";
      }
    //Termina Envio Mensaje
    }
  }else{
    echo "<h2>Envíanos un Mensaje</h2>";
  }
?>
