<?php
include_once('../conect.php');
session_start();
$att1=$_POST['att1'];
$att11=$_POST['att1-1'];
$att12=$_POST['att1-2'];
$att2=$_POST['att2'];
$att21=$_POST['att2-1'];
$att22=$_POST['att2-2'];
$att3=$_POST['att3'];
$att31=$_POST['att3-1'];
$att32=$_POST['att3-2'];
$att4=$_POST['att4'];
$att41=$_POST['att4-1'];
$att42=$_POST['att4-2'];
$att5=$_POST['att5'];
$att51=$_POST['att5-1'];
$att52=$_POST['att5-2'];
$att6=$_POST['att6'];
$att61=$_POST['att6-1'];
$att62=$_POST['att6-2'];
$att7=$_POST['att7'];
$att71=$_POST['att7-1'];
$att72=$_POST['att7-2'];
$att8=$_POST['att8'];
$att81=$_POST['att8-1'];
$att82=$_POST['att8-2'];
$att9=$_POST['att9'];

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
<table class="tresultadosori">
  <thead>
    <tr>
      <th scope="col">Examen de Bioquimica</th>
      <th scope="col">Resultado Unidad</th>
      <th scope="col">Valor de referencia</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <td>Glicemia</td>
      <td><?php echo $att1." mg/dl";?></td>
      <td><?php echo $att11."-".$att12;?></td>
    </tr>
    <tr>
    <td>Creatinina</td>
      <td><?php echo $att2." mg/dl";?></td>
      <td><?php echo $att21."-".$att22;?></td>
    </tr>
    <tr>
      <td>Urea</td>
      <td><?php echo $att3." mg/dl";?></td>
      <td><?php echo $att31."-".$att32;?></td>
    </tr>
    <tr>
      <td>Colesterol</td>
      <td><?php echo $att4." mg/dl";?></td>
      <td><?php echo $att41."-".$att42;?></td>
    </tr>
    <tr>
      <td>Trigliceridos</td>
      <td><?php echo $att5." mg/dl";?></td>
      <td><?php echo $att51."-".$att52;?></td>
    </tr>
    <tr>
      <td>HDL Colesterol</td>
      <td><?php echo $att6." mg/dl";?></td>
      <td><?php echo $att61."-".$att62;?></td>
    </tr>
    <tr>
      <td>LDL Colesterol</td>
      <td><?php echo $att7." mg/dl";?></td>
      <td><?php echo $att71."-".$att72;?></td>
    </tr>
    <tr>
      <td>VLDL Colesterol</td>
      <td><?php echo $att8." mg/dl";?></td>
      <td><?php echo $att81."-".$att82;?></td>
    </tr>
    <tr>
    <td>Relacion Colesterol/HDL</td>
      <td><?php echo $att9;?></td>
      <td></td>
    </tr>
  </tbody>
</table>
<page_footer>
        <hr>
        <h5>Sistema de laboratorio centro medico los amados</h5>
</page_footer>
</body>
</html>