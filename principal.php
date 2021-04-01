<?php
include_once('conect.php');
session_start();
if(isset($_SESSION['user'])){
    $ID = $_SESSION['user'];
    $QUERY = "Select * from usuarios Where user='$ID'";
    $rsQUERY = mysqli_query($con, $QUERY) or die('Error: ' . mysqli_error($con));
    $filequery= mysqli_fetch_array($rsQUERY);
    $countQuery = mysqli_num_rows($rsQUERY);

    if($countQuery <= 0){
        header('Location: index.html');
    }elseif(!$filequery['clase']=="Doctor"){
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
 <title>Menu - doctores</title>
</head>
<body style="height:100%">
<nav class="navbar sticky-top navbar-dark" style="background-color: #2a52be;">
            <a class="navbar-brand" href="principal.php">
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
                    <a class="nav-link text-light" href="principal.php">Menu principal</a>
                    <a class="nav-link text-light" href="nuevo.php">Generar solicitud</a>
                    <a class="nav-link text-light" href="lexamdoc.php">Lista de solicitudes</a>
                </div>
            </div>
        </nav>
<div class="parallaxdoc">
<div class="container">
<div class="row" style="margin-top:10%;height:350px;text-align:center;">
    <div class="col-lg-5 col-md-5 col-sm-12 col-12 rounded"   style="margin-bottom:5%;padding-bottom:5%;opacity: 0.8;background-color: white;">
        <img class="rounded-circle" width="200" height="200"  src="img/medopc2.jpg" style="margin-top:5%;">
        <h5>Generar solicitud de laboratorio</h5>
        <a href="nuevo.php" class="btn btn-outline-primary">Ir</a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-12"></div>
    <div class="col-lg-5 col-md-5 col-sm-12 col-12 rounded"   style="margin-bottom:5%;padding-bottom:5%;opacity: 0.8;background-color: white;">
        <img class="rounded-circle" width="200" height="200" src="img/medopc1.jpg" style="margin-top:5%;">
        <h5>Lista de solicitudes</h5>
        <a href="lexamdoc.php" class="btn btn-outline-primary">Ir</a>
    </div>
</div>

</div>

</div>
</body>
</html>