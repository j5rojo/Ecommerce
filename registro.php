<!-- Formulario de Registro -->
  <div class="col-xs-12">
    <form id="formRegistro" class="form" method="POST" autocomplete="off">
      <div class="row center-xs">
        <div class="col-xs-12">
          <?php
            //Validaciones Registro
            if(isset($_POST['btn-enviar'])){
              if($_POST['nombre'] == ''){
                echo '<h2 id="error">Debes Escribir tu Nombre</h2>';
          			echo '<script type="text/javascript">
          						  $(document).ready(function() {
                          $("#nombre").removeClass("placeholder");
                          $("#nombre").addClass("placeholder-error");
                          $("#nombre").focus().css("border-color", "#dd4b39");
                          $("#nombre").focus().css("color", "#dd4b39");
          								$("#error").addClass("msj-error");
          							});
          						</script>';
          		}elseif($_POST['apellido'] == ''){
                echo '<h2 id="error">Debes Escribir tu Apellido</h2>';
          			echo '<script type="text/javascript">
          						  $(document).ready(function() {
                          $("#nombre").attr("value", "'.$_POST['nombre'].'");
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#apellido").removeClass("placeholder");
                          $("#apellido").addClass("placeholder-error");
                          $("#apellido").focus().css("border-color", "#dd4b39");
                          $("#apellido").focus().css("color", "#dd4b39");
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
              //Termina Validaciones Registro
              }else{

              }
            }else{
              echo "<h2>Rellene los Datos para Registrarse</h2>";
            }
          ?>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="text" title="Debes Escribir tu Nombre" name="nombre" id="nombre" class="inputForm col-xs-7 placeholder" placeholder="Escriba su Nombre" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Nombre'">
          </div>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="text" title="Debes Escribir tu Apellido" name="apellido" id="apellido" class="inputForm col-xs-7 placeholder" placeholder="Escriba su Apellido" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Apellido'">
          </div>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="text" title="Debes Escribir tu Número de Teléfono" name="telefono" id="telefono" class="inputForm col-xs-7 placeholder" placeholder="Escriba su Número de Teléfono" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Número de Teléfono'">
          </div>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="text" title="Debes escribir un Correo Electrónico Válido" name="correo" id="correo" class="inputForm col-xs-7 placeholder" placeholder="Escriba su Correo Electrónico" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Correo Electrónico'">
          </div>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="text" title="Debes Escribir un Nombre de Usuario" name="usuario" id="usuario" class="inputForm col-xs-7 placeholder" placeholder="Escriba su Nombre de Usuario" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Nombre de Usuario'">
          </div>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="password" title="Debes Escribir una Contraseña" name="contrasenia" id="contrasenia" class="inputForm col-xs-7 placeholder" placeholder="Escriba su Contraseña" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Contraseña'">
          </div>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="password" title="Debes Repetir la Contraseña" name="recontrasenia" id="recontrasenia" class="inputForm col-xs-7 placeholder" placeholder="Repita la Contraseña" onfocus="this.placeholder=''" onblur="this.placeholder='Repita la Contraseña'">
          </div>
        </div>
        <div class="col-xs-6">
          <div class="row groupButton" style="margin-bottom:20px;">
            <button type="submit" role="button" class="col-xs-6" name="btn-enviar">Registrarse</button>
            <button type="reset" role="button" class="col-xs-6">Reestablecer</button>
          </div>
        </div>
      </div>
    </form>
  </div>
<!-- Fin del Formulario de Registro -->
