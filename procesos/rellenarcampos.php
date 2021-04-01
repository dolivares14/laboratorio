<?php
include_once('../conect.php');
session_start();

if(isset($_POST['idpaciente'])){
    $idpac=$_POST['idpaciente'];
    $query="Select * From pacientes Where ID='$idpac'";
    $rsquery=mysqli_query($con,$query) or die('Error: ' . mysqli_error($con));
    $fquery = mysqli_fetch_row($rsquery);
    // $datos=[$fquery['ID'],$fquery['nombre'],$fquery['apellido'],$fquery['direccion'],$fquery['telefono'],$fquery['ci'],$fquery['correo'],$fquery['edad']];
    echo json_encode($fquery);
}




?>