<?php
//Incluimos la clase del PhpMailer
  require_once("../class/class.phpmailer.php");
//Validaciones Mensaje
  if(isset($_POST['nombre']) && $_POST['nombre'] == ''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escribir su nombre");
        $("#nombre").focus();
      });
      </script>';
  }elseif(isset($_POST['nombre']) && $_POST['correo'] == ''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escribir un correo electrónico");
        $("#correo").focus();
      });
      </script>';
  }elseif(isset($_POST['nombre']) && !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['correo'])){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escribir un correo electrónico válido");
        $("#correo").focus();
      });
      </script>';
  }elseif($_POST['asunto'] == ''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escribir un asunto para su mensaje");
        $("#asunto").focus();
      });
      </script>';
  }elseif($_POST['mensaje'] == ''){
    echo '<script type="text/javascript">
      $(document).ready(function() {
        toastr.warning("Debe escribir un mensaje");
        $("#mensaje").focus();
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
      $body .= "<tr><td colspan='2'><img src='".$_SERVER['SERVER_NAME']."images/LOGO.png' alt='Tiendas Shalom' width='200' height='80'/></td></tr>";
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
        echo '<script type="text/javascript">
          $(document).ready(function() {
            toastr.error("El mensaje no pudo ser enviado");
            $("#respuesta").html("<h2>El Mensaje No Pudo Ser Enviado</h2>");
          })
        </script>';
      }else{
        echo '<script type="text/javascript">
          $(document).ready(function(){
            toastr.success("Mensaje Enviado");
            $("#respuesta").html("<h2 class=\"msj-correcto\">Mensaje Enviado</h2>");
            setTimeout(function(){
              location.reload();
            }, 5000);
          })
        </script>';
      }
      //Termina Envio Mensaje
    }
?>
