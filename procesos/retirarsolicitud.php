<?php
include_once('../conect.php');
session_start();

$idex=$_GET['id'];
$query="Update examenes Set estado='Cancelada'  Where ID_examen='$idex' ";
$rsquery=mysqli_query($con,$query) or die ('Error: '.mysqli_error($con));
if ($_GET['location']=="doc"){
    header('Location: ../lexamdoc.php');
}else{
    header('Location: ../lexamadmin.php');
}
?>