<div class="col-xs-12">
  <form id="formAgregarCategoria" class="form" autocomplete="off" enctype="multipart/form-data" method="post">
    <div class="row center-xs">
      <div class="col-xs-12" id="respuesta">
        <h2>Completa los Datos para Agregar una Nueva Categoria</h2>
      </div>
      <div class="col-xs-12">
        <div class="row center-xs">
          <input type="text" name="nombrec" id="nombrec" class="inputForm col-xs-7 placeholder" placeholder="Escriba el Nombre de la Categoria" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba el Nombre de la Categoria'">
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
          <button type="button" class="col-xs-6" name="btn-enviar">Agregar Categoria</button>
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
        url: "includes/accionCategoriaregistrar.php",
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
