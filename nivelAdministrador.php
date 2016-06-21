<?php require_once('includes/seguridadAdm.php') ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <title>.:Página Principal:.</title>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/flexboxgrid.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/menuIcons.css">
    <link rel="stylesheet" href="css/toastr.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
  </head>
  <body>
    <!-- Plantilla -->
      <div id="wrap">
        <!-- Cabecera de la Plantilla -->
          <header>
            <div class="container-fluid">
              <div class="row middle-xs">
                <!-- Logo -->
                  <div class="logo col-xs-4">
                      <img src="images/LOGO.png" alt="Not Found" width="300" height="80">
                  </div>
                <!-- Fin del Logo -->
                <!-- Menu Principal -->
                  <nav class="col-xs-8">
                    <div class="row end-xs">
                      <div class="col-xs-3">
                        <a href="nivelAdministrador.php?section=inicio"><span class="icon-web"></span>&nbsp;Inicio</a>
                      </div>
                      <div class="col-xs-3">
                        <a href="nivelAdministrador.php?section=nosotros"><span class="icon-people"></span>&nbsp;Nosotros</a>
                      </div>
                      <div class="col-xs-3">
                        <a href="nivelAdministrador.php?section=productos"><span class="icon-fashion"></span>&nbsp;Productos</a>
                      </div>
                      <div class="col-xs-3">
                        <a href="nivelAdministrador.php?section=usuarios"><span class="fa fa-users"></span>&nbsp;Usuarios</a>
                      </div>
                    </div>
                  </nav>
                <!-- Fin del Menu Principal -->
              </div>
            </div>
          </header>
        <!-- Fin de la Cabecera de la Plantilla -->
        <!-- Cuerpo de la Plantilla -->
          <div id="main" class="container-fluid">
            <div class="row">
              <!-- Sección Principal -->
                <div class="col-xs-8">
                <section>
                  <div class="col-xs-12">
                    <?php
                      if(!isset($_GET['section'])){
                        echo "
                        <div class='row center-xs'>
                        <h2 id='tituloSection' class='col-xs-12'>Inicio</h2>
                        </div>
                        ";
                        include('inicio.php');
                        echo "<script type='text/javascript'>document.title='.:Página Principal:.';</script>";
                      }else{
                        $section=$_GET['section'];
                        switch($section){
                          case 'inicio':
                            echo "
                            <div class='row center-xs'>
                            <h2 id='tituloSection' class='col-xs-12'>Inicio</h2>
                            </div>
                            ";
                            include('inicio.php');
                            echo "<script type='text/javascript'>document.title='.:Página Principal:.';</script>";
                          break;
                          case 'nosotros':
                            echo "
                            <div class='row center-xs'>
                            <h2 id='tituloSection' class='col-xs-12'>Nosotros</h2>
                            </div>
                            ";
                            include('nosotros.php');
                            echo "<script type='text/javascript'>document.title='.:Nosotros:.';</script>";
                          break;
                          case 'productos':
                            echo "
                              <div class='row center-xs'>
                                <h2 id='tituloSection' class='col-xs-12'>Productos</h2>
                              </div>
                            ";
                            include('productos.php');
                            echo "<script type='text/javascript'>document.title='.:Productos:.';</script>";
                          break;
                          case 'usuarios':
                            echo "
                              <div class='row center-xs'>
                                <h2 id='tituloSection' class='col-xs-12'>Usuarios</h2>
                              </div>
                            ";
                            include('usuarios.php');
                            echo "<script type='text/javascript'>document.title='.:Usuarios:.';</script>";
                          break;
                          case 'perfilUsuario':
                            echo "
                              <div class='row center-xs'>
                                <h2 id='tituloSection' class='col-xs-12'>Perfil de Usuario</h2>
                              </div>
                            ";
                            include('includes/perfilUsuario.php');
                            echo "<script type='text/javascript'>document.title='.:Perfil de Usuario:.';</script>";
                          break;
                          case 'ventas':
                            echo "
                              <div class='row center-xs'>
                                <h2 id='tituloSection' class='col-xs-12'>Ventas Realizadas</h2>
                              </div>
                            ";
                            include('ventas.php');
                            echo "<script type='text/javascript'>document.title='.:Ventas Realizadas:.';</script>";
                          break;
                          case 'admProductos':
                            echo "
                              <div class='row center-xs'>
                                <h2 id='tituloSection' class='col-xs-12'>Administraci&oacute;n de Productos</h2>
                              </div>
                            ";
                            include('admProductos.php');
                            echo "<script type='text/javascript'>document.title='.:Administración de Productos:.';</script>";
                          break;
                          default:
                            echo "
                              <div class='row center-xs'>
                                <h2 id='tituloSection' class='col-xs-12'>Inicio</h2>
                              </div>
                            ";
                            include('inicio.php');
                            echo "<script type='text/javascript'>document.title='.:Página Principal:.';</script>";
                          break;
                        }
                      }
                    ?>
                  </div>
                </section>
              </div>
              <!-- Fin la Sección Principal -->
              <!-- Asides de la Plantilla -->
                <div class="col-xs-4">
                  <!-- Formulario de Inicio de Sesión -->
                    <aside class="middle-xs center-xs">
                      <div id="formInicioSesion">
                        <h2 class="col-xs-12" class="panelUsuario">
                          Bienvenido <?php echo $_SESSION['usuario']?>
                          <a href="includes/cerrarSesion.php" class="cerrarSesion">
                            <span class="fa fa-sign-out"></span>
                          </a>
                        </h2>
                        <div class="col-xs-12 menuUsuario">
                          <ul>
                            <li>
                              <a href="nivelAdministrador.php?section=perfilUsuario">
                                <span class="fa fa-user"></span>
                                <span class="textOption">Perfil</span>
                              </a>
                            </li>
                            <li>
                              <a href="nivelAdministrador.php?section=admProductos">
                                <span class="fa fa-cogs"></span>
                                <span class="textOption">Administraci&oacute;n</span>
                              </a>
                            </li>
                            <li>
                              <a href="nivelAdministrador.php?section=ventas">
                                <span class="fa fa-money"></span>
                                <span class="textOption">Ventas</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </aside>
                  <!-- Fin del Formulario de Inicio de Sesión -->
                  <!-- Instagram -->
                    <aside class="instagram middle-xs center-xs">
                      <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BFy7yRqwClQ/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">Sensualidad plena 👠. #shoes #zapatos #leopardo #hermosos -no disponibles - proxima  temporada</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">Una foto publicada por Tiendas Shalom. (@shalomtiendas) el <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-05-24T15:57:39+00:00">24 de May de 2016 a la(s) 8:57 PDT</time></p></div></blockquote>
                      <script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
                    </aside>
                  <!-- Fin de Instagram -->
                  <!-- Twitter -->
                    <aside class="twitter middle-xs center-xs">
                      <a class="twitter-timeline" href="https://twitter.com/TiendasShalom" data-widget-id="722112100458459138">Tweets por el @TiendasShalom.</a>
                      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                      </script>
                    </aside>
                  <!-- Fin de Twitter -->
                </div>
              <!-- Fin de los Asides de la Plantilla -->
            </div>
          </div>
        <!-- Fin del Cuerpo de la Plantilla -->
      </div>
      <!-- Pie de Pagina -->
        <footer>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12 middle-xs">

              </div>
            </div>
          </div>
        </footer>
      <!-- Fin del Pie de Pagina -->
    <!-- Fin de la Plantilla -->
  </body>
</html>
