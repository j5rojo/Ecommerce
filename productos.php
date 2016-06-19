<div class="row center-xs">
  <div class="col-xs-12">
    <ul id="categorias">
      <?php
        require_once('includes/conexbd.php');
        $con=conexionBD('localhost', 'root', '', 'shalomimportca');
        $consulta="SELECT DISTINCT tipo_categoria FROM tbl_categorias";
        $resultado=mysqli_query($con, $consulta);
        while($categoria=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
          ?>
            <li>
              <a>
                <?php echo $categoria['tipo_categoria'];?>
              </a>
              <ul>
                <?php
                  $consulta2="SELECT * FROM tbl_categorias WHERE tipo_categoria='".$categoria['tipo_categoria']."'";
                  $resultado2=mysqli_query($con, $consulta2);
                  $count=mysqli_num_rows($resultado2);
                  if($count!=0){
                    while($categoria2=mysqli_fetch_array($resultado2, MYSQLI_ASSOC)){
                      ?>
                      <li>
                        <a href="index.php?section=productos&categoria=<?php echo $categoria2['id_categoria']?>">
                          <?php echo $categoria2['nombre_categoria'];?>
                        </a>
                      </li>
                      <?php
                    }
                  }
                ?>
              </ul>
            </li>
          <?php
        }
      ?>
    </ul>
  </div>
</div>
<div class="row">
  <?php
    if(!isset($_GET['categoria'])){
      $consulta="SELECT * FROM tbl_productos WHERE cantidad_producto > 0";
    }else{
      $consulta="SELECT * FROM tbl_productos WHERE cantidad_producto > 0 AND categoria_producto='".$_GET['categoria']."'";
    }
    $resultado=mysqli_query($con, $consulta);
    $cantidad=mysqli_num_rows($resultado);
    if($cantidad > 0){
      while($producto=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        ?>
          <div class="producto col-xs-4">
            <img src="includes/imagenProducto.php?id=<?php echo $producto['id_producto']?>" alt="No se Encontro la Imagen" />
            <div class="mascara">
              <h2><?php echo $producto['nombre_producto']?></h2>
              <div class="row center-xs">
                <div class="col-xs-9">
                  <p>Descripci&oacute;n:&nbsp;<?php echo $producto['descripcion_producto']?></p>
                </div>
                <div class="col-xs-9">
                  <p>Cantidad:&nbsp;<?php echo $producto['cantidad_producto']?></p>
                </div>
                <div class="col-xs-9">
                  <p>Precio:&nbsp;<?php echo $producto['precio_producto']?>Bs.F</p>
                </div>
                <div class="col-xs-9 groupButton">
                  <a href="#" class="link compra">Añadir al Carrito</a>
                </div>
              </div>
            </div>
          </div>
        <?php
      }
    }else{
      echo "<h1 class='tituloh1'>No hay productos en esta categoria.</h1>";
    }
  ?>
  <script type="text/javascript">
    $(".compra").each(function(){
      $(this).on("click", function(){
        toastr.info("Debes iniciar sesi\u00F3n para añadir productos al carrito");
      })
    });
  </script>
</div>
