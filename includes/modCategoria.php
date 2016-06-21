<?php
  require_once('includes/conexbd.php');
  $id_categoria=$_POST['id_mod'];
  $con=conexionBD('localhost', 'root', '', 'shalomimportca');
  $consulta="SELECT * FROM tbl_categorias WHERE id_categoria=$id_categoria";
  $resultado=mysqli_query($con, $consulta);
  $cat=mysqli_fetch_assoc($resultado);
?>
<div class="col-xs-12">
  <form id="formAgregarCategoria" class="form" autocomplete="off" enctype="multipart/form-data" method="post">
    <div class="row center-xs">
      <div class="col-xs-12" id="respuesta">
        <h2>Modifica los Datos Necesarios</h2>
      </div>
      <div class="col-xs-12">
        <div class="row center-xs">
          <input type="text" value="<?php echo $cat['nombre_categoria']?>" name="nombrec" id="nombrec" class="inputForm col-xs-7 placeholder" placeholder="Escriba el Nombre de la Categoria" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba el Nombre de la Categoria'">
        </div>
      </div>
      <div class="col-xs-12">
        <div class="row center-xs">
          <select class="inputForm col-xs-7" name="categoriap" id="categoriap">
            <option value="">Selecciona un Tipo de Categoria</option>
            <option value="bolsos">Bolsos</option>
            <option value="zapatos">Zapatos</option>
          </select>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="row groupButton">
          <input type="hidden" name="id" value="<?php echo $cat['id_categoria']?>">
          <button type="button" class="col-xs-6" name="btn-enviar">Modificar Categoria</button>
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
      var formulario = new FormData(document.getElementById("formAgregarCategoria"));
      $.ajax({
        url: "includes/accionModCategorias.php",
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
