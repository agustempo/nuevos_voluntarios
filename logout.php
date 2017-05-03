<?php 
session_start();
unset($_SESSION["Id_vol"]);
header('Location: index.php');
 ?>