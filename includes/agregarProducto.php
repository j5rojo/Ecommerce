<form class="form" id="tipop">
  <div class="row center-xs">
    <div class="col-xs-12">
      <h2>Escoja un Tipo de Producto</h2>
    </div>
  </div>
  <div class="col-xs-6 col-xs-offset-3">
    <div class="row">
      <div class="checkInput col-xs-6">
        <input type="radio" id="zapatos" name="tipop" value="zapatos"/>
        <label for="zapatos"><span></span>Zapatos</label>
      </div>
      <div class="checkInput col-xs-6">
        <input type="radio" id="bolsos" name="tipop" value="bolsos"/>
        <label for="bolsos"><span></span>Bolsos y Carteras</label>
      </div>
    </div>
  </div>
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $("input[name='tipop']").change(function(){
      var tipop = this.value;
      $.ajax({
        data:  {tipop: tipop},
        url:   'includes/accionProducto.php',
        type:  'post',
        beforeSend: function () {
          $("#categoriap").delay(500).html("Procesando, espere por favor...");
        },
        success:  function (response) {
          $("#categoriap").html(response);
        }
      });
      $("#formAgregarproducto").delay(500).fadeIn("slow");
    });
  });
</script>


      <div class="col-xs-12">
        <form id="formAgregarproducto" class="form hide" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="row center-xs">
            <div class="col-xs-12" id="respuesta">

            </div>
            <div class="col-xs-12">
              <div class="row center-xs">
                <input type="text" name="nombrep" id="nombrep" class="inputForm col-xs-7 placeholder" placeholder="Escriba el Nombre del Producto" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba el Nombre del Producto'">
              </div>
            </div>
            <div class="col-xs-12">
              <div class="row center-xs">
                <input type="text" name="stockp" id="stockp" class="inputForm col-xs-7 placeholder" placeholder="Escriba la Cantidad Disponible del Producto" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba la Cantidad Disponible del Producto'">
              </div>
            </div>
            <div class="col-xs-12">
              <div class="row center-xs">
                <textarea rows="4" name="descp" id="descp" class="inputForm col-xs-7 placeholder" placeholder="Escriba la Descripcion del Producto" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba la Descripcion del Producto'" style="font-family:arial;resize:none;"></textarea>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="row center-xs">
                <input type="text" name="preciop" id="preciop" class="inputForm col-xs-7 placeholder" placeholder="Escriba el Precio del Producto" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba el Precio del Producto'">
              </div>
            </div>
            <div class="col-xs-12">
              <div class="row center-xs">
                <select class="inputForm col-xs-7" name="categoriap" id="categoriap">
                </select>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="row center-xs groupButton">
                <button type="button" role="button" class="fotop col-xs-7" onclick="getElementById('fotop').click();">Seleccionar Foto</button>
                <input type="file" name="fotop" id="fotop"/>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="row groupButton">
                <input type="hidden" name="tipop" value="<?php $_POST['tipop']?>">
                <button type="submit" role="button" class="col-xs-6" name="btn-enviar">Agregar Producto</button>
                <button type="reset" role="button" class="col-xs-6">Reestablecer</button>
              </div>
            </div>
          </div>
        </form>
      </div>
