<div class="row center-xs">
  <div class="col-xs-12 menuUsuario">
    <ul>
      <li>
        <a>
          <span class="fa fa-tags"></span>
          <span class="textOption">Productos</span>
        </a>
      </li>
      <li>
        <a>
          <span class="fa fa-folder"></span>
          <span class="textOption">Categorias</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<div class="row center-xs">
  <script type="text/javascript">
    $(".fa-tags").on('click', function(){
      $(".admCategorias").hide();
      $(".admProductos").animate({
        width: "toggle"
      }).delay(500);
    });
    $(".fa-folder").on('click', function(){
      $(".admProductos").hide();
      $(".admCategorias").animate({
        width: "toggle"
      }).delay(500);
    });
  </script>
  <div class="col-xs-10">
    <div class="admProductos hide menuUsuario">
      <ul>
        <li>
          <a href="nivelAdministrador.php?section=admProductos&option=agregarProducto">
            <span class="fa fa-plus"></span>
            <span class="textOption">Añadir Productos</span>
          </a>
        </li>
        <li>
          <a href="nivelAdministrador.php?section=admProductos&option=verProductos">
            <span class="fa fa-search-plus"></span>
            <span class="textOption">Ver Productos</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="admCategorias hide menuUsuario">
      <ul>
        <li>
          <a>
            <span class="fa fa-plus"></span>
            <span class="textOption">Añadir Categoria</span>
          </a>
        </li>
        <li>
          <a>
            <span class="fa fa-search-plus"></span>
            <span class="textOption">Ver Categorias</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-xs-12">
    <?php
      if(isset($_GET['option'])){
        if($_GET['option']=='agregarProducto'){
          require_once("includes/agregarProducto.php");
        }elseif($_GET['option']=='verProductos'){
          require_once("includes/verProductos.php");
        }
      }
    ?>
  </div>
</div>
