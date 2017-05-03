<?php 
include('../CDB.php');

$json=file_get_contents('inscriptos.json');
$inscriptos=json_decode($json,true);
$error='';
foreach ($inscriptos as $item){
	$fecha=explode('/', $item['fecha']);
	$fecha="{$fecha[2]}-{$fecha[1]}-{$fecha[0]}";
	$sql="INSERT INTO `v_nuevos_voluntarios` (`id`, `Id_vol`, `plan`, `dia`, `horario`, `zona`, `fecha`) 
	VALUES (NULL, '{$item['Id_vol']}', '{$item['plan']}', '{$item['dia']}', '{$item['horario']}', '{$item['zona']}', '{$fecha} 00:00:00');";
	mysql_query($sql) or $error.="<br/><br/>".$myQuery."<br/><br/>".mysql_error();
}
if($error!='')
	echo $error;
else
	echo 'Ok!';
 ?>