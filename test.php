<?php 
$json=file_get_contents('ingresos.json');
$ingresos=json_decode($json,true);

$ingresos=array();
$ingresos['general']=0;
$ingresos['dya']=0;
$ingresos['mesas']=0;
$ingresos['educacion']=0;
$ingresos['emprendedores']=0;
$ingresos['oficios']=0;
$ingresos['huertas']=0;
$ingresos['habitat']=0;

$json=json_encode($ingresos);
file_put_contents('ingresos.json', $json);
 ?>