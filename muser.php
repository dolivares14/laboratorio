<?php
include_once('conect.php');
session_start();
if(isset($_SESSION['user'])){
    $ID = $_SESSION['user'];
    $QUERY = "Select * from usuarios Where user='$ID'";
    $rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
    $countQuery = mysqli_num_rows($rsQUERY);

    if($countQuery <= 0){
        header('Location: index.html');
    }elseif($_SESSION['clase']!='admin'){
        header('Location: index.html');
    }
    if($_GET['ID']){
        $iduser= $_GET['ID'];

    }else{
        header('Location: luser.php');
    }
    
}else{
    header('Location: index.html');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" type="text/css" href=css/main.css>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Modificar usuario</title>
 <script>
     function validar(){
         
         nom=document.getElementById("nombre").value;
         ape=document.getElementById("apellido").value;
         email=document.getElementById("email").value;
         telf=document.getElementById("telf").value;
         user=document.getElementById("user").value;
         passw=document.getElementById("password").value;
         
             if(nom==""  || ape=="" || email=="" || telf=="" || user=="" || passw =="" ){
                 alert("Error, uno o más campos estan vacios");
                 return false;
             }else if(user.length<4||user.length>15){
                 alert("El largo del usuario tiene que ser entre 4 y 15 caracteres");
                  return false;
             }else if(nom.length<4 || ape.length<5){
                 alert("El largo de los campos nombre o apellido es muy corto");
                 return false;
             }else if(nom.length>20 || ape.length>20){
                 alert("El largo de los campos nombre o apellido es muy largo");
                 return false;
             }else if(!email.includes("@") || !email.includes(".")){
                 alert("El formato del correo es incorrecto");
                 return false;
             }else if(passw.length<9||passw.length>15){
                 alert("El largo de la contraseña tiene que ser entre 9 y 15 caracteres");
                 return false;
             }else{
                 return true;
             }
         
     }
 </script>
</head>
<body>
<nav class="navbar sticky-top navbar-dark" style="background-color: #2a52be;">
            <a class="navbar-brand" href="adminmenu.php">
                <img src="img/logonav.png" width="200" height="60" class="d-inline-block align-top" alt="" loading="lazy">
            </a>
            <h3 style="color: white;">Sistema de laboratorio</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav text-light">
                    <div>Bienvenido: <?php echo $_SESSION['user'];?></div>
                    <a class="nav-link text-light" href="index.html">Cerrar Sesion</a>
                    <a class="nav-link text-light" href="adminmenu.php">Menu principal</a>
                    <a class="nav-link text-light" href="luser.php">Lista de usuarios</a>
                    <a class="nav-link text-light" href="lpac.php">Lista de pacientes</a>
                    <a class="nav-link text-light" href="lexamadmin.php">Lista de solicitudes</a>
                </div>
            </div>
</nav>
<div class="parallaxad2">
    <div class="container bg-light" style="margin-top:3%;margin-bottom:10%;color:#2a52be;margin-left:8%;margin-right:8%;">
    <h2 style="margin-top:3%;margin-bottom:5%;">Ingrese los datos</h2>
    <form name="nuevouser" action="procesos/inmoduser.php" method="post">
    <?php
         $QUERYmod = "Select * From usuarios Where ID='$iduser'";
         $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
         $fileQUERYmod = mysqli_fetch_array($rsQUERYmod);
    ?>
        <div class="row" style="text-align:right;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
                    <div class="form-group">
                         <label>Usuario</label>
                         <input type="text" id="user" name="user" value="<?php echo $fileQUERYmod['user']; ?>">
                    </div>
                    <div class="form-group">
                            <label>Contraseña</label>
                           <input type="password" id="password"  name="password" value="<?php echo $fileQUERYmod['password']; ?>">
                    </div>
                   <div class="form-group">
                             <label>Nombre</label>
                             <input type="text"  id="nombre" name="nombre" value="<?php echo $fileQUERYmod['nombre']; ?>">
                    </div>
                    <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" id="apellido" name="apellido" value="<?php echo $fileQUERYmod['apellido']; ?>">
                    </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                        <label>Telefono</label>
                       <input type="tel" id="telf" name="telf" value="<?php echo $fileQUERYmod['telf']; ?>">
                  </div>
                <div class="form-group">
                     <label>Correo Electronico</label>
                      <input type="email" id="email" name="email" value="<?php echo $fileQUERYmod['correo']; ?>">
                </div>  
                <div class="form-group row">
                     <label class="col-6">Privilegio</label>
                     <div>
                     <select id="clase" style="width:170px; name="clase" class="form-control" value="<?php echo $fileQUERYmod['clase']; ?>">
                           <option>Doctor</option>
                           <option>Miembro de laboratorio</option>
                            <option>Administrador</option>
                     </select>
                     </div>        
             </div> 
            </div>
            <button style="margin-left:42%" type="submit" name="modificar" value="cambiar" onclick=" return validar()"  class="btn btn-outline-primary">Registrar solicitud</button>
            </form>
        </div>
    </div>
</div>
<?php
mysqli_close($con);
?>
</body>
</html>