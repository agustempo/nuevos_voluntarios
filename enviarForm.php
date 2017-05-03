<?php 
session_start();
error_reporting(0);
include('../CDB.php');

function sendMail($asunto,$cuerpo,$de,$para){
  $header="MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html; charset=utf-8\r\n";
  $header .= "From: {$de}\r\n";
  /*if($bcc!='')
    $header .= "Bcc: {$bcc}\r\n";*/
  $header .= "Reply-To: {$de}\r\n";
  return mail($para, $asunto, $cuerpo, $header);
}

function guardarInscripcion(){
	//$json=file_get_contents('inscriptos.json');
	//echo $json;
	//$inscriptos=json_decode($json,true);
	global $planes;
	global $zonas_nombres;
	$e_plan=$planes[$_SESSION["sAsunto"]];
	$e_zona=$zonas_nombres[$_POST['zona']];
	/*$inscriptos[]=array(
		'Id_vol'=>$_SESSION["Id_vol"],
		'nombre'=>$_SESSION['datos']['Nombre'],
		'apellido'=>$_SESSION['datos']['Apellido'],
		'DNI'=>$_SESSION['datos']['DNI'],
		'email'=>$_SESSION['Mail1'],
		'celular'=>$_SESSION['datos']['Celular'],
		'plan'=>$e_plan,
		'dia'=>$_POST['dia'],
		'horario'=>$_POST['horario'],
		'zona'=>$e_zona,
		'fecha'=>date('d/m/Y')
		);
	$json=json_encode($inscriptos);
	file_put_contents('inscriptos.json', $json);*/

	$sql="INSERT INTO `v_nuevos_voluntarios` (`id`, `Id_vol`, `plan`, `dia`, `horario`, `zona`) 
	VALUES (NULL, '{$_SESSION['Id_vol']}', '{$e_plan}', '{$_POST['dia']}', '{$_POST['horario']}', '{$e_zona}');";
	@mysql_query($sql);
}

$planes['dya']=utf8_decode('Deteccion y Asignacion');
$planes['mesas']=utf8_decode('Mesas de Trabajo');
$planes['juegotecas']=utf8_decode('Juegotecas');
$planes['apoyo']=utf8_decode('Apoyo Escolar');
$planes['talleres_arte']=utf8_decode('Espacios para adolescentes');
$planes['emprendedores']=utf8_decode('Emprendedores');
$planes['oficios']=utf8_decode('Oficios');
$planes['huertas']=utf8_decode('Huertas');
$planes['habitat']=utf8_decode('Desarrollo de Habitat');

$zonas_nombres['indistinto']='Me da igual';
$zonas_nombres['zona_norte']='Zona Norte';
$zonas_nombres['zona_sur']='Zona Sur';
$zonas_nombres['zona_oeste']='Zona Oeste';
$zonas_nombres['zona_noroeste']='Zona Noroeste';
$zonas_nombres['zona_sudoeste']='Zona Sudoeste';
$zonas_nombres['la_plata']='La Plata';



if(!isset($_SESSION["Id_vol"])){
	$dni=limpiar_sql($_POST['dni']);
	$pass=limpiar_sql($_POST['pass']);
	$asunto=limpiar_sql($_POST['asunto']);
	$mensaje='';
	$query="SELECT Id_vol, Nombre, Apellido, DNI, Celular, Id_ciudad, Password, Mail1 FROM voluntarios WHERE DNI={$dni}";
	$result=mysql_query($query) or $error=$myQuery."<br/><br/>".mysql_error();
	
	if(mysql_num_rows($result)==1){
		$object = mysql_fetch_assoc($result);
		if($pass==$object['Password']){
			$_SESSION["Id_vol"]=$object['Id_vol'];
	        $_SESSION["Nombre_index"]=$object['Nombre'];
	        $_SESSION["Id_ciudad"]=$object['Id_ciudad'];
	        $_SESSION["Mail1"]=$object['Mail1'];
	        $_SESSION['datos']['Nombre']=$object['Nombre'];
	        $_SESSION['datos']['Apellido']=$object['Apellido'];
	        $_SESSION['datos']['DNI']=$object['DNI'];
	        $_SESSION['datos']['Celular']=$object['Celular'];

	        $_SESSION["sPaso"]='2';
	        $_SESSION["sAsunto"]=$asunto;
			
			$mensaje="Enviado!";
		}else
			$error="Tu Clave es incorrecta";
	}else
		$error='Tu DNI no est&aacute; cargado en la base de datos';

	$arr=array();
	if($error==''){
		$arr['enviado']=0;
		$arr['mensaje']='<span style="color:#0A0;">'.$mensaje.'</span>';
		if($asunto=='dya'){

			$arr['paso']=3;
			$arr['redirect']='../V_d_Anotdeteccion.php?Id_ciudad='.$_SESSION["Id_ciudad"];
			guardarInscripcion();
			
		}else{
			$arr['paso']=2;
			$arr['redirect']='-';
		}
	}else{
		$arr['enviado']=0;
		$arr['mensaje']='<span style="color:#A00;">'.$error.'</span>';
		$arr['paso']=1;
		$arr['redirect']='-';
	}
}else{
	if (isset($_POST['dni'])) {
		if($_SESSION["sAsunto"]=='dya'){
			$arr['paso']=3;
			$arr['redirect']='../V_d_Anotdeteccion.php?Id_ciudad='.$_SESSION["Id_ciudad"];
		}else{
			$arr['paso']=2;
			$arr['redirect']='-';
		}
		$arr['enviado']=0;
		
		
		$arr['mensaje']='';
	}else{
		$zona=$zonas_nombres[$_POST['zona']];
		$plan=$planes[$_SESSION['sAsunto']];
		$cuerpo="
		Hola, 
 		<br><br>
		<strong>{$_SESSION['datos']['Nombre']} {$_SESSION['datos']['Apellido']}</strong> está interesada en participar en <strong>{$plan}</strong>. Debajo encontrarás sus datos, así ya podés ponerte en contacto.
		<br><br>
		<strong>Nombre</strong>: {$_SESSION['datos']['Nombre']} {$_SESSION['datos']['Apellido']}<br>
		<strong>DNI</strong>: {$_SESSION['datos']['DNI']}<br>
		<strong>Mail</strong>: {$_SESSION['Mail1']}<br>
		<strong>Telefóno</strong>: {$_SESSION['datos']['Celular']}<br>
		<strong>Disponibilidad</strong>: <br>
		- Día: {$_POST['dia']}<br>
		- Horario: {$_POST['horario']}<br>
		- Zona: {$zona}<br>
		<br>
		Muchas gracias!<br>
		<br>
		<em>Equipo de Inserción de Voluntarios</em>";

		$json=file_get_contents('mails.json');
		$mails=json_decode($json,true);
		//print_r($mails);

		$mail_zonal=$mails[$_SESSION['sAsunto']][$_POST['zona']];

		sendMail('TECHO - Nuevo voluntario anotado para el plan '.$plan,$cuerpo,'TECHO - Nuevos Voluntarios <info@techo.org>',$mail_zonal);
		//sendMail('TECHO - Nuevo voluntario anotado para el plan '.$plan,$cuerpo,'TECHO - Nuevos Voluntarios <info@techo.org>','aledcrb@gmail.com');

		//$r=$cuerpo.'<br>asunto:'.$plan.'<br>para:'.$mails[$_SESSION['sAsunto']][$_POST['zona']].'<br>mail:'.$mails[$_SESSION['sAsunto']];
		//echo $r;

		$cuerpo="<p>Hola <strong>{$_SESSION['datos']['Nombre']}</strong></p>
		<p>Muchas gracias por haberte anotado a <strong>$plan</strong><br>
		En los proximos dias nos vamos a estar contactando con vos. Cualquier cosa no dudes en escribir a <a href='mailto:$mail_zonal'>$mail_zonal</a>.</p>
		<p>¡Saludos!<br>
		<em>Equipo de TECHO</em></p>";
		sendMail('TECHO - Gracias por anotarte',$cuerpo,'TECHO - Nuevos Voluntarios <info@techo.org>',$_SESSION['Mail1']);

		$arr['enviado']=1;
		$arr['mensaje']='<span style="color:#0A0;">'.$_SESSION["Mail1"].'</span>';
		$arr['paso']=2;
		$arr['redirect']='-';
		$arr['email']=$mails[$_SESSION['sAsunto']]['general'];

		//guardo el registro
		guardarInscripcion();


		unset($_SESSION["Id_vol"]);
	    unset($_SESSION["Nombre_index"]);
	    unset($_SESSION["Id_ciudad"]);
	    unset($_SESSION["sPaso"]);
	    unset($_SESSION["sAsunto"]);
	}
	
}

echo json_encode($arr);
 ?>