<!-- Form Cliente -->

<div id="anotarse_modal" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">&times;</button>
    <h3>Anotate</h3>
  </div>
  <div class="modal-body">
    <p class="mensaje" style="display:none"></p>
    <form action="enviarForm.php" method="post" class="form-horizontal form_inscripcion" id="anotarse_form" name="anotarse_form">  
    <fieldset>
      <input type="hidden" name="asunto" id="asunto" value="0">
      <div class="control-group">
        <label class="control-label" for="dni">DNI</label>
        <div class="controls">
          <input id="dni" name="dni" type="text" value="">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="pass">Contrase&ntilde;a</label>
        <div class="controls">
          <input id="pass" name="pass" type="password" value="">
        </div>
      </div>
      <div class="form-actions">
        <button name="boton" type="submit" class="btn btn-primary" value="">Ingresar</button>&nbsp;<img src="images/ajax-loader.gif" class="loader" style="display:none">
      </div>
    </fieldset>

  </form>
  <legend></legend>
        No estás registrado?&nbsp;<button id="boton_registro" class="btn btn-default btn-sm btn-gris"><i class="fa fa-user"></i> <a>Registrate por única vez</a></button>
  </div>
</div>

<div id="anotarse_paso2_modal" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">&times;</button>
    <h3>Disponibilidad</h3>
  </div>
  <div class="modal-body">
    <p class="mensaje" style="display:none"></p>
    <form action="enviarForm.php" method="post" class="form-horizontal form_inscripcion" id="anotarse_paso2_form" name="anotarse_paso2_form">  
    <fieldset>
      <input type="hidden" name="asunto" id="asunto" value="0">
      <div class="control-group">
        <label class="control-label" for="dia">Día</label>
        <div class="controls">
          <select name="dia" required>
            <option value="">-</option>
            <option value="indistinto">Me da igual</option>
            <option>Sábado</option>
            <option>Domingo</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="horario">Horario</label>
        <div class="controls">
          <select name="horario" required>
            <option value="">-</option>
            <option value="indistinto">Me da igual</option>
            <option>Mañana</option>
            <option>Tarde</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="zona">Zona</label>
        <div class="controls">
          <select name="zona" required>
            <option value="">-</option>
            <option value="indistinto">Me da igual</option>
            <option value="zona_norte">Zona Norte</option>
            <option value="zona_sur">Zona Sur</option>
            <option value="zona_sudeste">Zona Sudeste</option>
            <option value="zona_noroeste">Zona Noroeste</option>
            <option value="zona_oeste">Zona Oeste</option>
            <option value="la_plata">La Plata</option>
          </select>
        </div>
      </div>
      
      <div class="form-actions">
        <button name="boton" type="submit" class="btn btn-primary" value="">Anotarme</button>&nbsp;<img src="images/ajax-loader.gif" class="loader" style="display:none">
      </div>
    </fieldset>

  </form>
 
  </div>
</div>



<div id="anotarse_final" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">&times;</button>
    <h3>Listo!</h3>
  </div>
  <div class="modal-body">
    <p>¡Muchas gracias por anotarte! Nos estaremos contactando con vos en los próximos días. Cualquier cosa no dudes en escribir a: <a href="" id="email_general"></a></p>
  </div>
</div>