<div class="row center-xs">
  <div class="col-xs-10">
    <h2>Ver Categorias</h2>
    <div class="row">
      <?php
        require_once("includes/conexbd.php");
        $con = conexionBD('localhost', 'root', '', 'shalomimportca');
        $consulta = "SELECT * FROM tbl_categorias";
        $resultado = mysqli_query($con, $consulta);
        while($fila=mysqli_fetch_assoc($resultado)){
          echo "
            <div class='col-xs-4 itProducto'>
              <form action='nivelAdministrador.php?section=admProductos&option=modCategoria' method='post'>
                <input type='hidden' value='".$fila['id_categoria']."' name='id_mod'/>
                <button class='mod' type='submit'>
                  <span class='fa fa-pencil'></span>
                </button>
              </form>
              <form action='nivelAdministrador.php?section=admProductos&option=delCategoria' method='post'>
                <input type='hidden' value='".$fila['id_categoria']."' name='id_del'/>
                <button class='del' type='submit'>
                  <span class='fa fa-times'></span>
                </button>
              </form>
              <table width='100%' style='text-align:justify;'>
                <tr>
                  <td style='text-transform:capitalize'><strong>Tipo:</strong>&nbsp;".$fila['tipo_categoria']."</td>
                </tr>
                <tr>
                  <td style='text-transform:capitalize'><strong>Nombre:</strong>&nbsp;".$fila['nombre_categoria']."</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td class='tercero'>&nbsp;</td></tr>
              </table><br><br>
            </div>
          ";
        }
      ?>
    </div>
  </div>
</div>
