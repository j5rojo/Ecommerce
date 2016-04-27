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
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#telefono").attr("value", "'.$_POST['telefono'].'");
                          $("#correo").attr("value", "'.$_POST['correo'].'");
                          $("#usuario").attr("value", "'.$_POST['usuario'].'");
                          $("#contrasenia").attr("value", "'.$_POST['contrasenia'].'");
                          $("#recontrasenia").attr("value", "'.$_POST['recontrasenia'].'");
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
                          $("#telefono").attr("value", "'.$_POST['telefono'].'");
                          $("#correo").attr("value", "'.$_POST['correo'].'");
                          $("#usuario").attr("value", "'.$_POST['usuario'].'");
                          $("#contrasenia").attr("value", "'.$_POST['contrasenia'].'");
                          $("#recontrasenia").attr("value", "'.$_POST['recontrasenia'].'");
                          $("#apellido").removeClass("placeholder");
                          $("#apellido").addClass("placeholder-error");
                          $("#apellido").focus().css("border-color", "#dd4b39");
                          $("#apellido").focus().css("color", "#dd4b39");
          								$("#error").addClass("msj-error");
          							});
          						</script>';
          		}elseif($_POST['telefono'] == ''){
                echo '<h2 id="error">Debes Escribir tu Número Teléfonico</h2>';
          			echo '<script type="text/javascript">
          						  $(document).ready(function() {
                          $("#nombre").attr("value", "'.$_POST['nombre'].'");
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#correo").attr("value", "'.$_POST['correo'].'");
                          $("#usuario").attr("value", "'.$_POST['usuario'].'");
                          $("#contrasenia").attr("value", "'.$_POST['contrasenia'].'");
                          $("#recontrasenia").attr("value", "'.$_POST['recontrasenia'].'");
                          $("#telefono").removeClass("placeholder");
                          $("#telefono").addClass("placeholder-error");
                          $("#telefono").focus().css("border-color", "#dd4b39");
                          $("#telefono").focus().css("color", "#dd4b39");
          								$("#error").addClass("msj-error");
          							});
          						</script>';
          		}elseif(!preg_match("/^[0-9]*$/", $_POST['telefono'])){
                echo '<h2 id="error">Debes Escribir un Número Teléfonico Válido</h2>';
          			echo '<script type="text/javascript">
          						  $(document).ready(function() {
                          $("#nombre").attr("value", "'.$_POST['nombre'].'");
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#telefono").attr("value", "'.$_POST['telefono'].'");
                          $("#correo").attr("value", "'.$_POST['correo'].'");
                          $("#usuario").attr("value", "'.$_POST['usuario'].'");
                          $("#contrasenia").attr("value", "'.$_POST['contrasenia'].'");
                          $("#recontrasenia").attr("value", "'.$_POST['recontrasenia'].'");
                          $("#telefono").removeClass("placeholder");
                          $("#telefono").addClass("placeholder-error");
                          $("#telefono").focus().css("border-color", "#dd4b39");
                          $("#telefono").focus().css("color", "#dd4b39");
          								$("#error").addClass("msj-error");
          							});
          						</script>';
          		}elseif($_POST['correo'] == ''){
                echo '<h2 id="error">Debe Escribir su Correo Electrónico</h2>';
                echo '<script type="text/javascript">
                        $(document).ready(function() {
                          $("#nombre").attr("value", "'.$_POST['nombre'].'");
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#telefono").attr("value", "'.$_POST['telefono'].'");
                          $("#usuario").attr("value", "'.$_POST['usuario'].'");
                          $("#contrasenia").attr("value", "'.$_POST['contrasenia'].'");
                          $("#recontrasenia").attr("value", "'.$_POST['recontrasenia'].'");
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
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#telefono").attr("value", "'.$_POST['telefono'].'");
                          $("#correo").attr("value", "'.$_POST['correo'].'");
                          $("#usuario").attr("value", "'.$_POST['usuario'].'");
                          $("#contrasenia").attr("value", "'.$_POST['contrasenia'].'");
                          $("#recontrasenia").attr("value", "'.$_POST['recontrasenia'].'");
                          $("#correo").removeClass("placeholder");
                          $("#correo").addClass("placeholder-error");
                          $("#correo").focus().css("border-color", "#dd4b39");
                          $("#correo").focus().css("color", "#dd4b39");
                          $("#error").addClass("msj-error");
                        });
                      </script>';
              }elseif($_POST['usuario'] == ''){
                echo '<h2 id="error">Debe Escribir un Nombre de Usuario</h2>';
                echo '<script type="text/javascript">
                        $(document).ready(function() {
                          $("#nombre").attr("value", "'.$_POST['nombre'].'");
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#telefono").attr("value", "'.$_POST['telefono'].'");
                          $("#correo").attr("value", "'.$_POST['correo'].'");
                          $("#contrasenia").attr("value", "'.$_POST['contrasenia'].'");
                          $("#recontrasenia").attr("value", "'.$_POST['recontrasenia'].'");
                          $("#usuario").removeClass("placeholder");
                          $("#usuario").addClass("placeholder-error");
                          $("#usuario").focus().css("border-color", "#dd4b39");
                          $("#usuario").focus().css("color", "#dd4b39");
                          $("#error").addClass("msj-error");
                        });
                      </script>';
              }elseif($_POST['contrasenia'] == ''){
                echo '<h2 id="error">Debe Escribir una Contraseña</h2>';
                echo '<script type="text/javascript">
                        $(document).ready(function() {
                          $("#nombre").attr("value", "'.$_POST['nombre'].'");
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#telefono").attr("value", "'.$_POST['telefono'].'");
                          $("#correo").attr("value", "'.$_POST['correo'].'");
                          $("#usuario").attr("value", "'.$_POST['usuario'].'");
                          $("#recontrasenia").attr("value", "'.$_POST['recontrasenia'].'");
                          $("#contrasenia").removeClass("placeholder");
                          $("#contrasenia").addClass("placeholder-error");
                          $("#contrasenia").focus().css("border-color", "#dd4b39");
                          $("#contrasenia").focus().css("color", "#dd4b39");
                          $("#error").addClass("msj-error");
                        });
                      </script>';
              }elseif($_POST['recontrasenia'] == ''){
                echo '<h2 id="error">Debe Repetir la Contraseña</h2>';
                echo '<script type="text/javascript">
                        $(document).ready(function() {
                          $("#nombre").attr("value", "'.$_POST['nombre'].'");
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#telefono").attr("value", "'.$_POST['telefono'].'");
                          $("#correo").attr("value", "'.$_POST['correo'].'");
                          $("#usuario").attr("value", "'.$_POST['usuario'].'");
                          $("#contrasenia").attr("value", "'.$_POST['contrasenia'].'");
                          $("#recontrasenia").removeClass("placeholder");
                          $("#recontrasenia").addClass("placeholder-error");
                          $("#recontrasenia").focus().css("border-color", "#dd4b39");
                          $("#recontrasenia").focus().css("color", "#dd4b39");
                          $("#error").addClass("msj-error");
                        });
                      </script>';
              }elseif($_POST['recontrasenia'] != $_POST['contrasenia']){
                echo '<h2 id="error">Las Contraseñas No Coinciden</h2>';
                echo '<script type="text/javascript">
                        $(document).ready(function() {
                          $("#nombre").attr("value", "'.$_POST['nombre'].'");
                          $("#apellido").attr("value", "'.$_POST['apellido'].'");
                          $("#telefono").attr("value", "'.$_POST['telefono'].'");
                          $("#correo").attr("value", "'.$_POST['correo'].'");
                          $("#usuario").attr("value", "'.$_POST['usuario'].'");
                          $("#contrasenia").attr("value", "'.$_POST['contrasenia'].'");
                          $("#recontrasenia").attr("value", "'.$_POST['recontrasenia'].'");
                          $("#recontrasenia").removeClass("placeholder");
                          $("#recontrasenia").addClass("placeholder-error");
                          $("#recontrasenia").focus().css("border-color", "#dd4b39");
                          $("#recontrasenia").focus().css("color", "#dd4b39");
                          $("#error").addClass("msj-error");
                        });
                      </script>';
              //Termina Validaciones Registro
              }else{
                echo "<h2 class='msj-correcto'>Se ha Registrado Satisfactoriamente</h2>";
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
