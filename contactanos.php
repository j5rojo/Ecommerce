<!-- Formulario de Contacto -->
  <div class="col-xs-12">
    <form id="formContacto" class="form" method="POST" autocomplete="off">
      <div class="row center-xs">
        <div class="col-xs-12">
          <?php
            require_once('includes/accionContacto.php');
          ?>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="text" title="Debes Escribir un Nombre" name="nombre" id="nombre" class="inputForm col-xs-7 placeholder" placeholder="Escriba su Nombre" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Nombre'">
          </div>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="text" title="Debes escribir un Correo Electrónico Válido" name="correo" id="correo" class="inputForm col-xs-7 placeholder" placeholder="Escriba su Correo Electrónico" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba su Correo Electrónico'">
          </div>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <input type="text" title="Debes Escribir un Asunto para el Mensaje" name="asunto" id="asunto" class="inputForm col-xs-7 placeholder" placeholder="Escriba un Asunto" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba un Asunto'">
          </div>
        </div>
        <div class="col-xs-12">
          <div class="row center-xs">
            <textarea rows="4" title="Debes Escribir un Mensaje" name="mensaje" id="mensaje" class="inputForm col-xs-7 placeholder" placeholder="Escriba un Mensaje" onfocus="this.placeholder=''" onblur="this.placeholder='Escriba un Mensaje'" style="font-family:arial;resize:none;"></textarea>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="row groupButton">
            <button type="submit" role="button" class="col-xs-6" name="btn-enviar">Enviar Mensaje</button>
            <button type="reset" role="button" class="col-xs-6">Reestablecer</button>
          </div>
        </div>
      </div>
    </form>
  </div>
<!-- Fin del Formulario de Contacto -->
<!-- Dirección -->
  <div class="col-xs-12" style="margin-top:20px;">
    <div class="row center-xs">
      <div class="col-xs-12">
        <h2>Encuéntranos en</h2>
      </div>
      <div class="col-xs-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.1147799016385!2d-67.60871198477557!3d10.25232587145068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e803c9d2b337b57%3A0x8162b4a06b46b450!2sGaler%C3%ADa+Plaza!5e0!3m2!1ses-419!2sve!4v1461534390365" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>      </div>
    </div>
  </div>
<!-- Fin de Dirección  -->
<!-- Redes Sociales -->
  <div class="col-xs-12" style="margin-top:20px;">
    <div class="row around-xs center-xs">
      <div class="col-xs-12">
        <h2>Síguenos en</h2>
      </div>
      <div class="col-xs-4">
        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FTiendas-Shalom-104895773179962&width=75&layout=button&action=like&show_faces=true&share=false&height=65&appId" width="75" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
      </div>
      <div class="col-xs-4">
        <a href="https://twitter.com/tiendasshalom" class="twitter-follow-button" data-show-count="false" data-lang="es" data-show-screen-name="false" data-dnt="true">Seguir a @tiendasshalom</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
      </div>
      <div class="col-xs-4">
        <style>.ig-b- { display: inline-block; }
        .ig-b- img { visibility: hidden; }
        .ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
        .ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
        .ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>
        <a href="https://www.instagram.com/shalomtiendas/?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
      </div>
    </div>
  </div>
<!-- Fin de Redes Sociales -->
