<?php 
if(isset($seccion)){
	$json=file_get_contents('ingresos.json');
	$ingresos=json_decode($json,true);
	$ingresos[$seccion]++;
	$json=json_encode($ingresos);
	file_put_contents('ingresos.json', $json);
}
 ?>