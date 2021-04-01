<?php
include_once('../conect.php');
session_start();

$idex=$_GET['id'];
$query="Select * from examenes Where ID_examen='$idex' ";
$rsquery=mysqli_query($con,$query) or die ('Error: '.mysqli_error($con));
$fquery=mysqli_fetch_array($rsquery);
$name=$fquery['pdf'];
$ruta="pdf/".$fquery['pdf'];
header("Content-disposition: attachment; filename=$name");
header("Content-type: application/pdf");
readfile($ruta);

?>