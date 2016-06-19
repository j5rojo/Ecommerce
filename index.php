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
                        <a href="index.php?section=inicio"><span class="icon-web"></span>&nbsp;Inicio</a>
                      </div>
                      <div class="col-xs-3">
                        <a href="index.php?section=nosotros"><span class="icon-people"></span>&nbsp;Nosotros</a>
                      </div>
                      <div class="col-xs-3">
                        <a href="index.php?section=productos"><span class="icon-fashion"></span>&nbsp;Productos</a>
                      </div>
                      <div class="col-xs-3">
                        <a href="index.php?section=contactanos"><span class="icon-apple"></span>&nbsp;Cont&aacute;ctanos</a>
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
                          case 'contactanos':
                            echo "
                              <div class='row center-xs'>
                                <h2 id='tituloSection' class='col-xs-12'>Contáctanos</h2>
                              </div>
                            ";
                            include('contactanos.php');
                            echo "<script type='text/javascript'>document.title='.:Contáctanos:.';</script>";
                          break;
                          case 'registro':
                            echo "
                              <div class='row center-xs'>
                                <h2 id='tituloSection' class='col-xs-12'>Registro de Usuario</h2>
                              </div>
                            ";
                            include('registro.php');
                            echo "<script type='text/javascript'>document.title='.:Registro de Usuario:.';</script>";
                          break;
                          case 'agregarProductos':
                            echo "
                              <div class='row center-xs'>
                                <h2 id='tituloSection' class='col-xs-12'>Nuevo Producto</h2>
                              </div>
                            ";
                            include('includes/agregarProducto.php');
                            echo "<script type='text/javascript'>document.title='.:Agregar Productos:.';</script>";
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
                      <form id="formInicioSesion" method="POST" autocomplete="off">
                        <h2 class="col-xs-12">Iniciar Sesión</h2>
                        <div class="row center-xs" id="answer"></div>
                        <div class="row center-xs">
                          <input type="text" name="user" id="user" class="inputForm col-xs-6 placeholder" placeholder="Nombre de Usuario" onfocus="this.placeholder=''" onblur="this.placeholder='Nombre de Usuario'">
                        </div>
                        <div class="row center-xs">
                          <input type="password" name="pass" id="pass" class="inputForm col-xs-6 placeholder" placeholder="Contraseña" onfocus="this.placeholder=''" onblur="this.placeholder='Contraseña'">
                        </div>
                        <div class="row center-xs">
                          <div class="row groupButton">
                            <button type="button" name="btn-inicioSesion" class="col-xs-6">Conectarse</button>
                            <a href="index.php?section=registro" class="col-xs-6">Registrarse</a>
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
                        $("button[name='btn-inicioSesion']").click(function(){
                          var form = new FormData(document.getElementById("formInicioSesion"));
                          $.ajax({
                            url: "includes/inicioSesion.php",
                            type: "POST",
                            data: form,
                            processData: false,  // tell jQuery not to process the data
                            contentType: false,   // tell jQuery not to set contentType
                            success: function(response){
                              $("#answer").append(response);
                            }
                          });
                        });
                        $("button[name='btn-reset']").click(function(){
                          location.reload();
                        });
                      </script>
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
