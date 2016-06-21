<div class="row center-xs">
  <div class="col-xs-12">
    <h2>Ver Productos</h2>
    <div class="row">
      <?php
        require_once("includes/conexbd.php");
        $con = conexionBD('localhost', 'root', '', 'shalomimportca');
        $consulta = "SELECT * FROM tbl_productos";
        $resultado = mysqli_query($con, $consulta);
        while($fila=mysqli_fetch_assoc($resultado)){
          echo "
            <div class='col-xs-4 itProducto'>
              <form action='nivelAdministrador.php?section=admProductos&option=modProducto' method='post'>
                <input type='hidden' value='".$fila['id_producto']."' name='id_mod'/>
                <button class='mod' type='submit'>
                  <span class='fa fa-pencil'></span>
                </button>
              </form>
              <form action='nivelAdministrador.php?section=admProductos&option=delProducto' method='post'>
                <input type='hidden' value='".$fila['id_producto']."' name='id_del'/>
                <button class='del' type='submit'>
                  <span class='fa fa-times'></span>
                </button>
              </form>
              <table width='100%'>
                <tr>
                  <td>
                    <img src='includes/imagenProducto.php?id=".$fila['id_producto']."' alt='No se Encontro la Imagen' height='150px'/>
                  </td>
                </tr>
                <tr class='tercero' style='text-align:center !important;'>
                  <td>".$fila['nombre_producto']."</td>
                </tr>
              </table><br><br>
            </div>
          ";
        }
      ?>
    </div>
  </div>
</div>
