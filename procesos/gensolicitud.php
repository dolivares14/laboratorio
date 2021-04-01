<?php
include_once('../conect.php');
session_start();
if(isset($_POST['registrar'])){
    if($_POST['registrar']=='registrar'){
      if($_POST['idpaciente']==""){
        $ci=$_POST['ci'];
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $dire=$_POST['direccion'];
        $telf= $_POST['telf'];
        $email= $_POST['email'];
        $edad= $_POST['edad'];
        $queryin="Insert Into pacientes (nombre, apellido, direccion, telefono, ci, correo, edad)";
        $queryin.= "values ('$nombre', '$apellido','$dire', '$telf', '$ci', '$email','$edad')";
        $rsqueryin=mysqli_query($con,$queryin) or die('Error  '.mysqli_error($con));
        $query2="Select * From pacientes Where ci='$ci'"; 
        $rsquery2=mysqli_query($con,$query2) or die('Error  '.mysqli_error($con));
        $filequery2=mysqli_fetch_array($rsquery2);
        $idpac=$filequery2['ID'];
      }else{
            $idpac=$_POST['idpaciente'];
        }
        $iddoc=$_SESSION['iddoc'];
        if(isset($_POST["op1"])){
          $querysol="Insert Into examenes (ID_paciente, ID_doctor, tipo, estado)";
          $querysol.= "values ('$idpac', '$iddoc','Heces', 'En espera')";
          $rsquerysol = mysqli_query($con,$querysol) or die('Error  '.mysqli_error($con));
        }
        if(isset($_POST["op2"])){
            $querysol="Insert Into examenes (ID_paciente, ID_doctor, tipo, estado)";
            $querysol.= "values ('$idpac', '$iddoc','Hematologia', 'En espera')";
            $rsquerysol = mysqli_query($con,$querysol) or die('Error  '.mysqli_error($con));
          }
          if(isset($_POST["op3"])){
            $querysol="Insert Into examenes (ID_paciente, ID_doctor, tipo, estado)";
            $querysol.= "values ('$idpac', '$iddoc','Orina', 'En espera')";
            $rsquerysol = mysqli_query($con,$querysol) or die('Error  '.mysqli_error($con));
          }
          if(isset($_POST["op4"])){
            $querysol="Insert Into examenes (ID_paciente, ID_doctor, tipo, estado)";
            $querysol.= "values ('$idpac', '$iddoc','Bioquimica', 'En espera')";
            $rsquerysol = mysqli_query($con,$querysol) or die('Error  '.mysqli_error($con));
          }
        header("Location: ../principal.php");
    }else{
      header("Location: ../nuevo.php");
    }
}else{
  header("Location: ../nuevo.php");
}



?>