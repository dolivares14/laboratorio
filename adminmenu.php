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
    
}else{
    header('Location: index.html');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" type="text/css" href=css/main.css>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 <title>Menu - admin</title>
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
<div class="parallaxad1">
    <div class="container" style="margin-top:10%">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-12 col-12 bg-light mb-3  " style="padding-bottom:5%">
                <img class="rounded-circle" width="200" height="200"  src="img/medopc1.jpg" style="margin-top:5%;">
                <h5>Lista de solicitudes</h5>
                <a href="lexamadmin.php" class="btn btn-outline-primary">Ir</a>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12 col-12 bg-light mb-3 ">
                <img class="rounded-circle" width="200" height="200"  src="img/adopc1.jpg" style="margin-top:5%;">
                <h5>Lista de usuarios</h5>
                <a href="luser.php" class="btn btn-outline-primary">Ir</a>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12 col-12 bg-light mb-3 ">
                <img class="rounded-circle" width="200" height="200"  src="img/adopc1.jpg" style="margin-top:5%;">
                <h5>Lista de paciente</h5>
                <a href="lpac.php" class="btn btn-outline-primary">Ir</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>