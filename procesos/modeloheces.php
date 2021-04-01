<?php
include_once('../conect.php');
session_start();
$att1=$_POST['att1'];
$att2=$_POST['att2'];
$att3=$_POST['att3'];
$att4=$_POST['att4'];
$att5=$_POST['att5'];
$att6=$_POST['att6'];

$idexamen=$_POST['idexamen'];
$query="Select * From examenes Where ID_examen='$idexamen'";
$rsquery= mysqli_query($con,$query) or die('Error: ' . mysqli_error($con));
$fquery= mysqli_fetch_array($rsquery);

$idpaciente=$fquery['ID_paciente'];
$iddoctor=$fquery['ID_doctor'];

$query2="Select * from pacientes Where ID='$idpaciente'";
$rsquery2= mysqli_query($con,$query2) or die('Error: ' . mysqli_error($con));
$fquery2= mysqli_fetch_array($rsquery2);

$query3="Select * From usuarios Where ID='$iddoctor'";
$rsquery3= mysqli_query($con,$query3) or die('Error: ' . mysqli_error($con));
$fquery3= mysqli_fetch_array($rsquery3);

?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" type="text/css" href="../css/estilopdf.css">
</head>
<body>
<div>
<img class="inline" src="../img/logo.png">
<div class="alinear">
<h5>Centro Medico Los Amados av 14A entre calles 77 y 78</h5>
<h5>telefono:0261-74753568 / 0424-6568535</h5>
<h5>laboratiolosamados@gmail.com</h5>
</div>
</div>
<br>
<div class="header">
<table class="tablahead">
    <tbody>
        <tr>
            <td class="esp"><?php echo "N° orden: ".$idexamen; ?></td>
            
            <td class="esp"><?php echo "Fecha: ". date("d n Y");?></td>
            
            <td class="esp"><?php echo "Paciente: ".$fquery2['nombre']." ".$fquery2['apellido'];?></td>
        </tr>
        <tr>
        <td class="esp"><?php echo "Doctor: ".$fquery3['nombre']." ".$fquery3['apellido'];?></td>
        
        <td class="esp"><?php echo "C.I. ".$fquery2['ci'];?></td>
       
        <td class="esp"><?php echo "edad: ".$fquery2['edad'];?></td>
        </tr>
    </tbody>
</table>
</div>
<table class="tresultados">
  <thead>
    <tr>
      <th scope="col">Examen de heces</th>
      <th scope="col">Resultado Unidad</th>
      <th scope="col">Valor de referencia</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>>>EX. Macroscopico</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td>Aspecto</td>
      <td><?php echo $att1;?></td>
      <td></td>
    </tr>
    <tr>
      <td>Color</td>
      <td><?php echo $att2;?></td>
      <td></td>
    </tr>
    <tr>
      <td>Consistencia</td>
      <td><?php echo $att3;?></td>
      <td></td>
    </tr>
    <tr>
      <td>Olor</td>
      <td><?php echo $att4;?></td>
      <td></td>
    </tr>
    <tr>
      <td>Reaccion</td>
      <td><?php echo $att5;?></td>
      <td></td>
    </tr>
    <tr>
      <td>>>Ex. Microscopico</td>
      <td colspan="2"><?php echo $att6;?></td>
    </tr>
  </tbody>
</table>
<page_footer>
        <hr>
        <h5>Sistema de laboratorio centro medico los amados</h5>
</page_footer>
</body>
</html>