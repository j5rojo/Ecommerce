<!-- Formulario de Registro -->
  <div class="col-xs-12">
    <form id="formRegistro" class="form" method="POST" autocomplete="off">
      <div class="row center-xs">
        <div class="col-xs-12" id="respuesta">
          <h2>Rellene los Datos para Registrarse</h2>
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
            <button type="button" class="col-xs-6" name="btn-enviar">Registrarse</button>
            <button type="button" class="col-xs-6" name="btn-reset">Reestablecer</button>
          </div>
        </div>
      </div>
    </form>
    <script type="text/javascript">
      toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-center",
        "extendedTimeOut": "6000",
        "escapeHtml": true,
      }
      $("button[name='btn-enviar']").click(function(){
        var formulario = new FormData(document.getElementById("formRegistro"));
        $.ajax({
          url: "includes/registroAccion.php",
          type: "POST",
          data: formulario,
          processData: false,  // tell jQuery not to process the data
          contentType: false,   // tell jQuery not to set contentType
          success: function(response){
            $("#respuesta").append(response);
          }
        });
      });
      $("button[name='btn-reset']").click(function(){
        location.reload();
      });
    </script>
  </div>
<!-- Fin del Formulario de Registro -->
