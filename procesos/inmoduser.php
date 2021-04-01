<?php
include_once('../conect.php');
session_start();
if(isset($_SESSION['user'])){
    $ID = $_SESSION['user'];
    $QUERY = "Select * from usuarios Where user='$ID'";
    $rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
    $countQuery = mysqli_num_rows($rsQUERY);

    if($countQuery <= 0){
        header('Location: ../index.html');
    }elseif($_SESSION['clase']!='admin'){
        header('Location: ../index.html');
    }
    
}else{
    header('Location: ../index.html');
}

if(isset($_POST['ingresar'])){
    if($_POST['ingresar']=='registrar'){
        $usuario= $_POST['user'];
        $password= $_POST['password'];
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $telf= $_POST['telf'];
        $email= $_POST['email'];
        $clase= $_POST['clase'];

        $QUERYInt = "Insert Into usuarios (user, nombre, apellido, telf, correo, password, clase)";
        $QUERYInt .= "values ('$usuario','$nombre', '$apellido', '$telf', '$email','$password', '$clase')";
        $rsQUERYInt = mysqli_query($con, $QUERYInt) or die('Error: ' . mysqli_error($con));
        if($rsQUERYInt == true){
            header('Location: ../luser.php');
        }
        if($rsQUERYInt == false){
            echo 'Error no se pudo registrar el usuario';
        }         
    }
}
elseif(isset($_POST['modificar'])){
    if($_POST['modificar']=='cambiar'){
        $iduser=$_POST['iduser'];
        $usuario= $_POST['user'];
        $password= $_POST['password'];
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $telf= $_POST['telf'];
        $email= $_POST['email'];
        $clase= $_POST['clase'];
        

        $QUERYmod = "UPDATE usuarios SET user='$usuario', nombre='$nombre', apellido='$apellido', telf='$telf', correo='$email', password='$password', clase='$clase' WHERE ID='$iduser'";
        $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
 
        if($rsQUERYmod == true){
           header('Location: ../luser.php');
        }
       if($rsQUERYmod == false){
           echo 'Error no se pudo Actualizar el usuario';
        }


    }
}
elseif(isset($_POST['modificarpac'])){
    if($_POST['modificarpac']=='cambiarpac'){
        $iduser=$_POST['iduser'];
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $direccion= $_POST['direccion'];
        $telf= $_POST['telefono'];
        $ci= $_POST['ci'];
        $edad= $_POST['edad'];
        $email= $_POST['email'];
        

        $QUERYmod = "UPDATE pacientes SET  nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telf', ci='$ci', correo='$email', edad='$edad' WHERE ID='$iduser'";
        $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
         header('Location: ../lpac.php');
        


    }
}

?>