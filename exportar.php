<?php 
error_reporting(E_ALL);
require_once './Spreadsheet/Excel/Writer.php';
$json=file_get_contents('inscriptos.json');
$inscriptos=json_decode($json,true);

include('../CDB.php');

$sql="SELECT n.*, v.Nombre nombre, v.Apellido apellido, v.DNI, v.Mail1 email, v.Celular celular 
FROM v_nuevos_voluntarios n INNER JOIN voluntarios v ON v.Id_vol = n.Id_vol";
$resultado=mysql_query($sql);
/*
$workbook = new Spreadsheet_Excel_Writer();
$workbook->send('insciptos_planes_'.date('d-m-Y').'.xls');

$worksheet =& $workbook->addWorksheet('productos');

$worksheet->write(0, 0, 'Nombre');

$worksheet->write(0, 1, 'Apellido');
$worksheet->write(0, 2, 'DNI');
$worksheet->write(0, 3, 'email');
$worksheet->write(0, 4, 'Celular');
$worksheet->write(0, 5, 'Plan');
$worksheet->write(0, 6, 'Dia');
$worksheet->write(0, 7, 'Horario');
$worksheet->write(0, 8, 'Zona');
$worksheet->write(0, 9, 'Fecha');


$c=1;
foreach ($inscriptos as $item) {
	if(isset($item['nombre']))
		$worksheet->write($c, 0, $item['nombre']);
	if(isset($item['apellido']))
		$worksheet->write($c, 1, $item['apellido']);
	if(isset($item['DNI']))
		$worksheet->write($c, 2, $item['DNI']);
	if(isset($item['email']))
		$worksheet->write($c, 3, $item['email']);
	if(isset($item['celular']))
		$worksheet->write($c, 4, $item['celular']);
	if(isset($item['plan']))
		$worksheet->write($c, 5, $item['plan']);
	if(isset($item['dia']))
		$worksheet->write($c, 6, utf8_decode($item['dia']));
	if(isset($item['horario']))
		$worksheet->write($c, 7, utf8_decode($item['horario']));
	if(isset($item['zona']))
		$worksheet->write($c, 8, $item['zona']);
	if(isset($item['fecha']))
		$worksheet->write($c, 9, $item['fecha']);
	$c++;
}*/

?>
<table border='1'>
<tr>
		<th>nombre</th>
		<th>apellido</th>
		<th>DNI</th>
		<th>email</th>
		<th>celular</th>
		<th>plan</th>
		<th>dia</th>
		<th>horario</th>
		<th>zona</th>
		<th>fecha</th>
	</tr>
<?php // foreach ($inscriptos as $item) {?>
<?php while ($item = mysql_fetch_assoc($resultado)) { ?>
	<tr>
		<td><?php echo $item['nombre']; ?></td>
		<td><?php echo $item['apellido']; ?></td>
		<td><?php echo $item['DNI']; ?></td>
		<td><?php echo $item['email']; ?></td>
		<td><?php echo $item['celular']; ?></td>
		<td><?php echo $item['plan']; ?></td>
		<td><?php echo $item['dia']; ?></td>
		<td><?php echo $item['horario']; ?></td>
		<td><?php echo $item['zona']; ?></td>
		<td><?php echo $item['fecha']; ?></td>
	</tr>
<?php } ?>
</table>
<?php
//$workbook->close();

 ?>