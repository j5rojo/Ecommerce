<form class="form" id="tipop">
  <div class="row center-xs">
    <div class="col-xs-12">
      <h2>Cambia el Tipo de Producto</h2>
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
        url:   'includes/accionProductotipop.php',
        type:  'post',
        success:  function(response){
          $("#categoriap").html(response);
        }
      });
    });
  });
</script>
<div class="col-xs-12">
  <?php
    require_once("includes/conexbd.php");
    $con=conexionBD('localhost', 'root', '', 'shalomimportca');
    $id_producto=$_POST['id_mod'];
    $consulta="SELECT * FROM tbl_productos WHERE id_producto=$id_producto";
    $row=mysqli_fetch_assoc(mysqli_query($con, $consulta));
  ?>
  <form id="formAgregarproducto" class="form" autocomplete="off" enctype="multipart/form-data" method="post">
    <div class="row center-xs">
      <div class="col-xs-12" id="respuesta">
        <h2>Modifica los datos necesarios</h2>
      </div>
      <div class="col-xs-12">
        <div class="row center-xs">
          <input type="text" value="<?php echo $row['nombre_producto']?>" name="nombrep" id="nombrep" class="inputForm col-xs-7 placeholder" placeholder="Escriba el Nombre del Producto" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba el Nombre del Producto'">
        </div>
      </div>
      <div class="col-xs-12">
        <div class="row center-xs">
          <input type="text" value="<?php echo $row['cantidad_producto']?>" name="stockp" id="stockp" class="inputForm col-xs-7 placeholder" placeholder="Escriba la Cantidad Disponible del Producto" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba la Cantidad Disponible del Producto'">
        </div>
      </div>
      <div class="col-xs-12">
        <div class="row center-xs">
          <textarea rows="4" name="descp" id="descp" class="inputForm col-xs-7 placeholder" placeholder="Escriba la Descripcion del Producto" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba la Descripcion del Producto'" style="font-family:arial;resize:none;"><?php echo $row['descripcion_producto']?></textarea>
        </div>
      </div>
      <div class="col-xs-12">
        <div class="row center-xs">
          <!-- Se rellena solo con ajax -->
          <select class="inputForm col-xs-7" name="categoriap" id="categoriap">
            <?php
              $cat=$row['categoria_producto'];
              $catcon="SELECT nombre_categoria FROM tbl_categorias WHERE id_categoria=$cat";
              $catre=mysqli_query($con, $catcon);
              $categoria=mysqli_fetch_assoc($catre);
            ?>
            <option value="<?php echo $cat?>"><?php echo $categoria['nombre_categoria']?></option>
          </select>
        </div>
      </div>
      <div class="col-xs-12">
        <div class="row center-xs">
          <input type="text" value="<?php echo $row['precio_producto']?>" name="preciop" id="preciop" class="inputForm col-xs-7 placeholder" placeholder="Escriba el Precio del Producto" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba el Precio del Producto'">
        </div>
      </div>
      <div class="col-xs-12">
        <div class="row center-xs">
          <select class="inputForm col-xs-7" name="destacadop" id="destacadop">
            <?php
              if($row['destacado_producto']==0){
                echo '<option value="'.$row['destacado_producto'].'" selected>No Destacar Producto</option>';
                echo '<option value="1">Destacar Producto</option>';
              }elseif($row['destacado_producto']==1){
                echo '<option value="'.$row['destacado_producto'].'" selected>Destacar Producto</option>';
                echo '<option value="0">No Destacar Producto</option>';
              }
            ?>
          </select>
        </div>
      </div>
      <!-- <div class="col-xs-12">
        <div class="row center-xs groupButton">
          <button type="button" class="fotop col-xs-7" onclick="getElementById('fotop').click();"><?php echo $row['fotoName_producto']?></button>
          <input type="file" name="fotop" id="fotop"/>
        </div>
      </div> -->
      <div class="col-xs-6">
        <div class="row groupButton">
          <input type="hidden" name="id" value="<?php echo $row['id_producto']?>">
          <button type="button" class="col-xs-6" name="btn-enviar">Modificar Producto</button>
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
      var formulario = new FormData(document.getElementById("formAgregarproducto"));
      $.ajax({
        url: "includes/accionModProductos.php",
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
