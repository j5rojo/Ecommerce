<div class="row center-xs">
  <div class="col-xs-8">
    <table class="datosUsuario">
      <caption>
        <h2>Estos son tus Datos de Usuario</h2>
      </caption>
      <tr>
        <td>Nombre</td>
        <td><?php echo $_SESSION['nombre']?></td>
      </tr>
      <tr>
        <td>Apellido</td>
        <td><?php echo $_SESSION['apellido']?></td>
      </tr>
      <tr>
        <td>Tel&eacute;fono</td>
        <td><?php echo $_SESSION['telefono']?></td>
      </tr>
      <tr>
        <td>Correo Electr&oacute;nico</td>
        <td><?php echo $_SESSION['correo']?></td>
      </tr>
      <tr>
        <td>Nombre de Usuario</td>
        <td><?php echo $_SESSION['usuario']?></td>
      </tr>
    </table>
  </div>
  <div class="col-xs-7">
    <div class="row">
      <div class="col-xs-12">
        <form id="perfilCambios">
          <div class="hide perfilCambios">
            <h2>Modificar Datos de Usuario</h2>
            <div id="respuesta"></div>
            <div class="row center-xs">
              <input type="text" title="Debes Escribir tu Nombre" value="<?php echo $_SESSION['nombre']?>" name="nombre" id="nombre" class="inputForm col-xs-12 placeholder" placeholder="Escriba su Nombre" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Nombre'">
            </div>
            <div class="row center-xs">
              <input type="text" title="Debes Escribir tu Apellido" value="<?php echo $_SESSION['apellido']?>" name="apellido" id="apellido" class="inputForm col-xs-12 placeholder" placeholder="Escriba su Apellido" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Apellido'">
            </div>
            <div class="row center-xs">
              <input type="text" title="Debes Escribir tu Número de Teléfono" value="<?php echo $_SESSION['telefono']?>" name="telefono" id="telefono" class="inputForm col-xs-12 placeholder" placeholder="Escriba su Número de Teléfono" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Número de Teléfono'">
            </div>
            <div class="row center-xs">
              <input type="text" title="Debes escribir un Correo Electrónico Válido" value="<?php echo $_SESSION['correo']?>" name="correo" id="correo" class="inputForm col-xs-12 placeholder" placeholder="Escriba su Correo Electrónico" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Correo Electrónico'">
            </div>
            <div class="row center-xs">
              <input type="hidden" title="Debes Escribir un Nombre de Usuario" value="<?php echo $_SESSION['usuario']?>" name="usuario" id="usuario" class="inputForm col-xs-12 placeholder" placeholder="Escriba su Nombre de Usuario" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Nombre de Usuario'">
              <input type="hidden" name="type" value="datos">
            </div>
          </div>
          <div class="hide claveCambios">
            <h2>Modificar Contrase&ntilde;a de Usuario</h2>
            <div id="respuesta"></div>
            <div class="row center-xs">
              <input type="password" name="contrasenia" id="contrasenia" class="inputForm col-xs-12 placeholder" placeholder="Escriba su Contrase&ntilde;a" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Contrase&ntilde;a'">
            </div>
            <div class="row center-xs">
              <input type="password" name="newContrasenia" id="newContrasenia" class="inputForm col-xs-12 placeholder" placeholder="Escriba su Nueva Contrase&ntilde;a" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Nueva Contrase&ntilde;a'">
            </div>
            <div class="row center-xs">
              <input type="password" name="reNewContrasenia" id="reNewContrasenia" class="inputForm col-xs-12 placeholder" placeholder="Repita la Nueva Contrase&ntilde;a" onfocus="this.placeholder=''" onblur="this.placeholder='Repita la Nueva Contrase&ntilde;a'">
            </div>
            <div class="row center-xs">
              <input type="hidden" title="Debes Escribir un Nombre de Usuario" value="<?php echo $_SESSION['usuario']?>" name="usuario" id="usuario" class="inputForm col-xs-12 placeholder" placeholder="Escriba su Nombre de Usuario" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Nombre de Usuario'">
              <input type="hidden" name="type" value="clave">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-xs-8">
    <div class="opcionPerfil">
      <button type="button">
        <span class="fa fa-pencil"></span>
        <span class="textOption">Editar Datos</span>
      </button>
      <button type="button" class="hide check datos">
        <span class="fa fa-check"></span>
        <span class="textOption">Guardar Cambios</span>
      </button>
      <button type="button" class="hide check clave">
        <span class="fa fa-check"></span>
        <span class="textOption">Guardar Cambios</span>
      </button>
      <button type="button">
        <span class="fa fa-key"></span>
        <span class="textOption">Cambiar Contrase&ntilde;a</span>
      </button>
      <button type="button" class="hide times">
        <span class="fa fa-times"></span>
        <span class="textOption">Cancelar</span>
      </button>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".opcionPerfil .fa-pencil").on("click", function(){
      $(".datosUsuario").addClass("hide");
      $(this).parent().addClass("hide");
      $(".opcionPerfil .fa-key").parent().addClass("hide");
      $(".opcionPerfil .datos").removeClass("hide");
      $(".opcionPerfil .times").removeClass("hide");
      $(".perfilCambios").removeClass("hide");
      $(".claveCambios").detach();
    });
    $(".opcionPerfil .fa-key").on("click", function(){
      $(".datosUsuario").addClass("hide");
      $(this).parent().addClass("hide");
      $(".opcionPerfil .fa-pencil").parent().addClass("hide");
      $(".opcionPerfil .clave").removeClass("hide");
      $(".opcionPerfil .times").removeClass("hide");
      $(".claveCambios").removeClass("hide");
      $(".perfilCambios").detach();
    });
    $(".opcionPerfil .times").on("click", function(){location.reload();});
    toastr.options = {
      "closeButton": true,
      "positionClass": "toast-top-center",
      "extendedTimeOut": "6000",
      "escapeHtml": true,
    }
    $(".opcionPerfil .datos").click(function(){
      var perfilCambios = new FormData(document.getElementById("perfilCambios"));
      $.ajax({
        url: "includes/perfilCambiosAccion.php",
        type: "POST",
        data: perfilCambios,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        success: function(response){
          $("#respuesta").append(response);
        }
      });
    });
    $(".opcionPerfil .clave").click(function(){
      var claveCambios = new FormData(document.getElementById("perfilCambios"));
      $.ajax({
        url: "includes/perfilCambiosAccion.php",
        type: "POST",
        data: claveCambios,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        success: function(response){
          $("#respuesta").append(response);
        }
      });
    });
  });
</script>
