<?php 
$pages[]=array('title'=>'Detección y Asignación','page'=>'dya');
$pages[]=array('title'=>'Mesas de Trabajo','page'=>'mesas');
$pages[]=array('title'=>'Educación','page'=>'educacion');
$pages[]=array('title'=>'Programa de Emprendedores','page'=>'emprendedores');
//$pages[]=array('title'=>'Huertas','page'=>'huertas');
$pages[]=array('title'=>'Oficios','page'=>'oficios');
$pages[]=array('title'=>'Desarrollo de Hábitat','page'=>'habitat');
?>

                <div class="span3" id="sidebar">
                    
                    <p style="margin-top:30px;margin-left:5px;font-weight:bold;">Nuestras Actividades Semanales:</p>
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="margin-top:10px;">
                        <!--<li><a class="titulo_menu" style="font-size:16px;text-align:center">Nuestras Actividades Semanales</a></li>-->
                        
                        <?php foreach ($pages as $item): ?>
                        <li <?php if($page==$item['page']) echo 'class="active"' ?>>
                            <a href="?page=<?php echo $item['page'] ?>"><i class="icon-chevron-right"></i><?php echo $item['title'] ?></a>
                        </li>
                        <?php endforeach ?> 
                        
                    </ul>
                    <p style="margin-top:30px;margin-left:5px;font-weight:bold; ">Actividad &Uacute;nica:</p>
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse" style="margin-top:10px;">
                        <li><a href="https://sites.google.com/a/techo.org/veni-a-construir/cons" style="background-color:#0092dd;color:#fff;"><i class="icon-chevron-right"></i>Anotate a Construir</a></li>
                        <!--<li><a href="?page=rai" style="background-color:#0092dd;color:#fff;"><i class="icon-chevron-right"></i>Relevamiento</a></li>-->
                    </ul>
                    <p style="margin-top: 10px;"><span style="padding-left: 10px;font-size: 12px">Seguinos en:</span><br>
  <a href="https://www.facebook.com/groups/264300800305853/" target="_blank"><img src="images/fb.png" style="height:55px"></a> <a href="https://twitter.com/TECHOarg" target="_blank"><img src="images/tw.png" style="height:55px"></a> </p>
                    <p> <a href="http://www.techo.org/paises/argentina/" style="padding-left: 10px;">www.techo.org/paises/argentina/</a> </p>
                    <p><span style="padding-left: 10px;font-size: 12px;">Cualquier cosa no dudes en escribirnos a: </span>
                        <a href="mailto:voluntariado.argentina@techo.org" style="padding-left: 10px;">voluntariado.argentina@techo.org</a> </p>
                </div>
