<?php 
error_reporting(0);
session_start();
if(!isset($_SESSION['adminuser'])){
    header('Location: login.php');
    exit;
}
if($_POST){
	unset($_POST['boton']);
	$json=json_encode($_POST);
	file_put_contents('../mails.json', $json);
}

$json=file_get_contents('../mails.json');
$mails=json_decode($json,true);

$json=file_get_contents('../ingresos.json');
$ingresos=json_decode($json,true);

$planes_nombres['general']=utf8_decode('Ingresos al sitio');
$planes_nombres['dya']=utf8_decode('Detección y Asignación');
$planes_nombres['mesas']=utf8_decode('Mesas&nbsp;de&nbsp;Trabajo');
$planes_nombres['juegotecas']=utf8_decode('Juegotecas');
$planes_nombres['educacion']=utf8_decode('Educación');
$planes_nombres['apoyo']=utf8_decode('Apoyo&nbsp;Escolar');
$planes_nombres['talleres_arte']=utf8_decode('Talleres&nbsp;de&nbsp;Arte');
$planes_nombres['emprendedores']=utf8_decode('Emprendedores');
$planes_nombres['oficios']=utf8_decode('Oficios');
$planes_nombres['huertas']=utf8_decode('Huertas');
$planes_nombres['habitat']=utf8_decode('Hábitat');

$zonas_nombres['general']='General';
$zonas_nombres['indistinto']='Indistinto';
$zonas_nombres['zona_norte']='Zona&nbsp;Norte';
$zonas_nombres['zona_sur']='Zona&nbsp;Sur';
$zonas_nombres['zona_oeste']='Zona&nbsp;Oeste';
$zonas_nombres['zona_noroeste']='Zona&nbsp;Noroeste';
$zonas_nombres['zona_sudoeste']='Zona&nbsp;Sudoeste';
$zonas_nombres['la_plata']='La Plata';

/*$mails=array();
$mails['mesas']['zona_norte']='aledcrb@gmail.com';
$mails['mesas']['zona_sur']='aledcrb@gmail.com';
$mails['mesas']['zona_sudoeste']='aledcrb@gmail.com';
$mails['mesas']['zona_noroeste']='aledcrb@gmail.com';
$mails['mesas']['zona_oeste']='aledcrb@gmail.com';
$mails['juegotecas']['zona_norte']='aledcrb@gmail.com';
$mails['juegotecas']['zona_sur']='aledcrb@gmail.com';
$mails['juegotecas']['zona_sudoeste']='aledcrb@gmail.com';
$mails['juegotecas']['zona_noroeste']='aledcrb@gmail.com';
$mails['juegotecas']['zona_oeste']='aledcrb@gmail.com';
$mails['apoyo']['zona_norte']='aledcrb@gmail.com';
$mails['apoyo']['zona_sur']='aledcrb@gmail.com';
$mails['apoyo']['zona_sudoeste']='aledcrb@gmail.com';
$mails['apoyo']['zona_noroeste']='aledcrb@gmail.com';
$mails['apoyo']['zona_oeste']='aledcrb@gmail.com';
$mails['talleres_arte']['zona_norte']='aledcrb@gmail.com';
$mails['talleres_arte']['zona_sur']='aledcrb@gmail.com';
$mails['talleres_arte']['zona_sudoeste']='aledcrb@gmail.com';
$mails['talleres_arte']['zona_noroeste']='aledcrb@gmail.com';
$mails['talleres_arte']['zona_oeste']='aledcrb@gmail.com';
$mails['emprendedores']['zona_norte']='aledcrb@gmail.com';
$mails['emprendedores']['zona_sur']='aledcrb@gmail.com';
$mails['emprendedores']['zona_sudoeste']='aledcrb@gmail.com';
$mails['emprendedores']['zona_noroeste']='aledcrb@gmail.com';
$mails['emprendedores']['zona_oeste']='aledcrb@gmail.com';
$mails['oficios']['zona_norte']='aledcrb@gmail.com';
$mails['oficios']['zona_sur']='aledcrb@gmail.com';
$mails['oficios']['zona_sudoeste']='aledcrb@gmail.com';
$mails['oficios']['zona_noroeste']='aledcrb@gmail.com';
$mails['oficios']['zona_oeste']='aledcrb@gmail.com';
$mails['huertas']['zona_norte']='aledcrb@gmail.com';
$mails['huertas']['zona_sur']='aledcrb@gmail.com';
$mails['huertas']['zona_sudoeste']='aledcrb@gmail.com';
$mails['huertas']['zona_noroeste']='aledcrb@gmail.com';
$mails['huertas']['zona_oeste']='aledcrb@gmail.com';
$mails['habitat']['zona_norte']='aledcrb@gmail.com';
$mails['habitat']['zona_sur']='aledcrb@gmail.com';
$mails['habitat']['zona_sudoeste']='aledcrb@gmail.com';
$mails['habitat']['zona_noroeste']='aledcrb@gmail.com';
$mails['habitat']['zona_oeste']='aledcrb@gmail.com';

$json=json_encode($mails);
file_put_contents('mails.json', $json);*/

?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>TECHO - Nuevos Voluntarios</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style type="text/css">
        .techo{
            color: #FFF;
            padding-left: 10px;
        }
        .techo h2{
            background: rgba(2,2,2,0.7);
        }
        .techo p{
            background: rgba(2,2,2,0.5);
        }
        .bloque{
           /* height: 500px !important;*/
        }
        legend{
            font-size:16px !important;
        }
        </style>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    
                    <a class="brandi" href="../"><img src="../images/techo.png" style="height:40px;"></a><a class="brand" href="../"> VOLUNTARIOS</a></a>
                    <div class="nav-collapse collapse">
                        
                    
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
        	<div class="span8" id="content">
            <div class="row-fluid">
            	<div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Emails de contacto</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
						    <form action="" method="post" class="form-horizontal" id="anotarse_paso2_form" name="anotarse_paso2_form">  
						    <fieldset>
						      <?php foreach ($mails as $plan => $zonas): ?>
                              <legend style="cursor:pointer;" id="<?php echo $plan ?>"><?php echo $planes_nombres[$plan] ?> <i class="icon-chevron-right"></i></legend>
                              <?php foreach ($zonas as $zona => $mail): ?>
						      <div class="control-group hide plan" data-plan="<?php echo $plan ?>">
						        <label class="control-label" for="dia" style="font-size:12px;"><?php echo $zonas_nombres[$zona] ?></label>
						        <div class="controls">
						          <input type="text" class="span6" name="<?php echo $plan ?>[<?php echo $zona ?>]" value="<?php echo $mail ?>">
						        </div>
						      </div>
						      <?php endforeach ?>
                              <?php endforeach ?>
						      
						      
						      
						      <div class="form-actions">
						        <button name="boton" type="submit" class="btn btn-primary" value="">Guardar</button>
						      </div>
						    </fieldset>

						  </form>
						</div>
					</div>
				</div>
				</div>
                    
                    
                </div>
                
                <div class="span4">
                    <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Estad&iacute;sticas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <ul>
                                    <?php foreach ($ingresos as $key=>$value): ?>
                                        <li><?php echo $planes_nombres[$key] ?>: <strong><?php echo $value ?></strong></li>
                                    <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Herramientas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <!--<ul>
                                        <li><a href="../exportar2.php">Exportar Base de Inscriptos</a></li>
                                    </ul>-->
                                    <form method="post" action="../exportar2.php">
                                        Desde: <input type="date" name="desde"><br>
                                        Hasta: <input type="date" name="hasta"><br>
                                        <button type="submit" class="btn btn-primary">Exportar Base de Inscriptos</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!--<footer>
                <p>&copy; Vincent Gabriel 2013</p>
            </footer>-->
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
        $(function(){
            $('legend').click(function(){
                var plan=this.id;
                $("div.plan[data-plan!='"+plan+"']").hide('fast');
                console.log($("div.plan[data-plan!='"+plan+"']"));
                $("div[data-plan='"+plan+"']").toggle('fast');
            });
        });
        </script>
        
    </body>

</html>