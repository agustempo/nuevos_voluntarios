<?php 
require_once './Spreadsheet/Excel/Writer.php';
/*$json=file_get_contents('inscriptos.json');
$data=json_decode($json,true);*/

include('../CDB.php');

$sql="SELECT n.*, v.Nombre nombre, v.Apellido apellido, v.DNI, v.Mail1 email, v.Celular celular 
FROM v_nuevos_voluntarios n INNER JOIN voluntarios v ON v.Id_vol = n.Id_vol WHERE 1";
if(isset($_POST['desde']) && $_POST['desde']!=''){
	$sql.=" AND DATEDIFF(fecha,'{$_POST['desde']}')>=0";
}
if(isset($_POST['hasta']) && $_POST['hasta']!=''){
	$sql.=" AND DATEDIFF(fecha,'{$_POST['hasta']}')<=0";
}
//die($sql);
$resultado=mysql_query($sql);

function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

// file name for download
$filename = "inscriptos_{$_POST['desde']}_al_{$_POST['hasta']}.xls";

header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");

$flag = false;
//foreach($data as $row) {
while ($row = mysql_fetch_assoc($resultado)) {
if(!$flag) {
  // display field/column names as first row
  echo implode("\t", array_keys($row)) . "\n";
  $flag = true;
}

$row['dia']=utf8_decode($row['dia']);
$row['horario']=utf8_decode($row['horario']);

array_walk($row, 'cleanData');
echo implode("\t", array_values($row)) . "\n";
}

exit;

 ?>