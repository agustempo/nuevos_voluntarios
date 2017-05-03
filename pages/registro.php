<?php include('../CDB.php'); ?><!--/span-->
                <div class="span9" id="content">
                    
                    <div class="row-fluid">
                        <!-- block -->
                       <div class="block">
                    
                    <div class="navbar navbar-inner block-header">
                        <div class="pull-left">Registrate por única vez!</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="../ajax/ajax_inscribir_vol.php" name="form_registro" id="form_registro" method="post" class="form-horizontal">
                                <fieldset>
                                  
                                  <div class="control-group">
                                      <label class="control-label" for="Id_ciudad">Elegí la Sede</label>
                                      <div class="controls">
                                        <select name="Id_ciudad" id="Id_ciudad" required>
                                        <option value="">-</option>
                                        <option value="1">Buenos Aires</option>
                                        <option value="7">La Plata</option>
                                        </select> 
                                      </div>
                                    </div>
                                  <div id="datos" class="hide">
                                  <legend>Información Personal</legend>

                                    <div class="control-group">
                                      <label class="control-label" for="Apellido">Apellido</label>
                                      <div class="controls">
                                        <input type="text" class="input-xlarge" name="Apellido" id="Apellido" maxlength="50" required> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="Nombre">Nombre</label>
                                      <div class="controls">
                                        <input type="text" class="input-xlarge" name="Nombre" id="Nombre" maxlength="50" required> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="Sexo">Sexo</label>
                                      <div class="controls">
                                        <select name="Sexo" id="Sexo" style="width:55px;" required>
                                        <option value="">-</option>
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                        </select> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="dia">Fecha de Nacimiento</label>
                                      <div class="controls">
                                        <select name="dia" id="dia" style="width:55px;" required>
                                        <option value="">-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        </select>
                                        <select name="mes" id="mes" style="width:125px;" required>
                                        <option value="">-</option>
                                        <option value="01">Enero</option>
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                        </select>
                                        <select name="anyo" id="anyo" style="width:95px;" required>
                                        <option value="">-</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        </select> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="Mail1">Email</label>
                                      <div class="controls">
                                        <input type="email" class="input-xlarge" name="Mail1" id="Mail1" maxlength="50" required> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="Celular">Celular</label>
                                      <div class="controls">
                                        <input type="text" class="input-xlarge" name="Celular" id="Celular" maxlength="50" required> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="Telefono">Tel&eacute;fono</label>
                                      <div class="controls">
                                        <input type="text" class="input-xlarge" name="Telefono" id="Telefono" maxlength="50" required> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="DNI">DNI</label>
                                      <div class="controls">
                                        <input type="text" class="input-xlarge" name="DNI" id="DNI" maxlength="50" required> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="Password">Contraseña</label>
                                      <div class="controls">
                                        <input type="password" class="input-xlarge" name="Password" id="Password" maxlength="50" required> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="Password2">Confirmar Contraseña</label>
                                      <div class="controls">
                                        <input type="password" class="input-xlarge" name="Password2" id="Password2" maxlength="50" required> 
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="Id_provincia">Provincia</label>
                                      <div class="controls">
                                       <select name="Id_provincia" id="Id_provincia" size="1" required>
                                       <option value="" disabled selected>Seleccione una provincia</option>
                                        <?php
                                        $q1 = "SELECT * From v_provincia ORDER BY Provincia";
                                        $r1 = mysql_query($q1);
                                        
                                        while ($Tipo = mysql_fetch_assoc($r1))
                                              {?>
                                              <option value="<?php echo $Tipo['Id_provincia'] ?>"><?php echo $Tipo['Provincia'] ?></option>
                                             
                                            <?php  } ?>                 
                                        </select>
                                      </div>
                                    </div>

                                    <div class="control-group hide" id="tr_partido">
                                      <label class="control-label" for="Id_partido" id="td_titulopartido">Partido / Departamento</label>
                                      <div class="controls" id="td_partido">
                                       <select name="Id_partido" id="Id_partido" size="1"></select>
                                      </div>
                                    </div>

                                    <div class="control-group hide" id="tr_localidad">
                                      <label class="control-label" for="Id_localidad" id="td_titulolocalidad">Localidad</label>
                                      <div class="controls" id="td_localidad">
                                       <select name="Id_localidad" id="Id_localidad" size="1"></select>
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="Estudia">Estudia</label>
                                      <div class="controls">
                                        <input type="checkbox" name="Estudia" id="Estudia" />
                                      </div>
                                    </div>

                                    <div class="control-group estudios hide">
                                      <label class="control-label" for="Id_univ">Universidad</label>
                                      <div class="controls">
                                        <select name="Id_univ" id="Id_univ" size="1">
                                        <option value="" disabled selected>Selecione una universidad</option>
                                        <?php
                                        $q1 = "select Id_univ, universidad From universidad ORDER by universidad";
                                        $r1 = mysql_query($q1);
                                        while ($Tipo = mysql_fetch_assoc($r1))
                                          {
                                          echo '<option value="'.$Tipo[Id_univ].'">';
                                          echo $Tipo[universidad];
                                          echo "</option><br>";
                                          }
                                        
                                        ?></select>
                                      </div>
                                    </div>

                                    <div class="control-group estudios hide">
                                      <label class="control-label" for="Carrera">Carrera</label>
                                      <div class="controls">
                                        <select name="Carrera" id="Carrera" size="1">
                                        <option value="" disabled selected>Selecione una carrera</option>
                                        <option>Otra</option>
                                        <option>Abogac&iacute;a</option>
                                        <option>Actuaci&oacute;n</option>
                                        <option>Astronom&iacute;a</option>
                                        <option>Administracion</option>
                                        <option>Administracion de Empresas</option>
                                        <option>Administracion y Sistemas</option>
                                        <option>Agronomia</option>
                                        <option>Astrolog&iacute;a</option>
                                        <option>Antropolog&iacute;a</option>
                                        <option>Arquitectura</option>
                                        <option>Arquitectura y Urbanismo</option>
                                        <option>Artes Audiovisuales</option>
                                        <option>Agrimensor</option>
                                        <option>Bellas artes</option>
                                        <option>Biolog&iacute;a</option>
                                        <option>Bioquimica</option>
                                        <option>Biotecnolog&iacute;a</option>
                                        <option>Ciencias Ambientales</option>
                                        <option>Ciencias de la Comunicaci&oacute;n</option>
                                        <option>Ciencias de la Educaci&oacute;n</option>
                                        <option>Ciencias Politicas</option>
                                        <option>Comedia Musical</option>
                                        <option>Comercializaci&oacute;n</option>
                                        <option>Comercio Exterior</option>
                                        <option>Comercio Internacional</option>
                                        <option>Comunicaci&oacute;n Social</option>
                                        <option>Contador P&uacute;blico</option>
                                        <option>Despachante de aduana</option>
                                        <option>Direccion de Negocios</option>
                                        <option>Dise&ntilde;o de imagen y sonido</option>
                                        <option>Dise&ntilde;o de Indumentaria  </option>
                                        <option>Dise&ntilde;o de Interiores</option>
                                        <option>Dise&ntilde;o de modas</option>
                                        <option>Dise&ntilde;o en Comunicacion Visual</option>
                                        <option>Dise&ntilde;o Grafico</option>
                                        <option>Dise&ntilde;o industrial</option>
                                        <option>Dise&ntilde;o textil</option>
                                        <option>Economia</option>
                                        <option>Economia Empresarial</option>
                                        <option>Enfermer&iacute;a</option>
                                        <option>Escenografia</option>
                                        <option>Estudios Internacionales</option>
                                        <option>Farmacia</option>
                                        <option>Filosof&iacute;a</option>
                                        <option>Fonoaudiolog&iacute;a</option>
                                        <option>Fotograf&iacute;a</option>
                                        <option>Gastronom&iacute;a</option>
                                        <option>Geologia</option>
                                        <option>Historia</option>
                                        <option>Hoteleria</option>
                                        <option>Ingenier&iacute;a Agronoma</option>
                                        <option>Ingenieria Ambiental</option>
                                        <option>Ingenier&iacute;a Civil</option>
                                        <option>Ingenier&iacute;a Electrica</option>
                                        <option>Ingenieria Electr&oacute;nica</option>
                                        <option>Ingenieria en Alimentos</option>
                                        <option>Ingenier&iacute;a en Inform&aacute;tica</option>
                                        <option>Ingenier&iacute;a en Petr&oacute;leo</option>
                                        <option>Ingenieria en Produccion Agropecuaria</option>
                                        <option>Ingenieria en Sistemas</option>
                                        <option>Ingenieria en Telecomunicaciones</option>
                                        <option>Ingenieria Industrial</option>
                                        <option>Ingenier&iacute;a Mec&aacute;nica</option>
                                        <option>Ingenier&iacute;a Nuclear</option>
                                        <option>Ingenier&iacute;a Qu&iacute;mica</option>
                                        <option>Kinesiolog&iacute;a</option>
                                        <option>Letras</option>
                                        <option>Licenciatura en Biotecnolog&iacute;a</option>
                                        <option>Maestra Jardinera</option>
                                        <option>Magisterio</option>
                                        <option>Marketing</option>
                                        <option>Martillero y Corredor Publico</option>
                                        <option>Mec&aacute;nica</option>
                                        <option>Medicina</option>
                                        <option>Medicina Veterinaria</option>
                                        <option>M&uacute;sica</option>
                                        <option>M&uacute;sico profesional</option>
                                        <option>MUSICOTERAPIA</option>
                                        <option>Nutrici&oacute;n</option>
                                        <option>Obstetricia</option>
                                        <option>ODONTOLOGIA</option>
                                        <option>Organizaci&oacute;n de Eventos</option>
                                        <option>Periodismo</option>
                                        <option>Periodismo Deportivo</option>
                                        <option>Produccion de Moda</option>
                                        <option>Produccion de Radio</option>
                                        <option>Profesorado de Educaci&oacute;n F&iacute;sica</option>
                                        <option>Profesorado de Educacion Inicial</option>
                                        <option>Profesorado de Historia</option>
                                        <option>Profesorado de Ingl&eacute;s</option>
                                        <option>Profesorado de Matem&aacute;tica</option>
                                        <option>Profesorado de Nivel Inicial</option>
                                        <option>Psicolog&iacute;a</option>
                                        <option>Psicologia Social</option>
                                        <option>Psicomotricidad</option>
                                        <option>Psicopedagog&iacute;a</option>
                                        <option>Publicidad</option>
                                        <option>Recursos Humanos</option>
                                        <option>Relaciones de Trabajo</option>
                                        <option>Relaciones Internacionales</option>
                                        <option>Relaciones Laborales</option>
                                        <option>Relaciones P&uacute;blicas</option>
                                        <option>Servicio Social</option>
                                        <option>Sociolog&iacute;a</option>
                                        <option>Terapia Fisica</option>
                                        <option>Terapia Ocupacional</option>
                                        <option>Trabajo Social</option>
                                        <option>Traductorado de Ingl&eacute;s</option>
                                        <option>Traductorado Publico de Ingles</option>
                                        <option>Turismo</option>
                                        <option>TURISMO Y HOTELERIA</option>
                                        <option>Veterinaria</option>
                                        </select>
                                      </div>
                                    </div>




                                    
      
                                    
                                    

                                    <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Anotarme</button>
                                          

                                        </div>
                                  </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                        <!-- /block -->
                    </div>
