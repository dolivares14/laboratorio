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
 <title>Lista de examenes - admin</title>
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
<div class="parallaxdoc2">
    <div class="container" style="margin-top:5%">
    <div class="row">
    <?php
        $query="Select * from examenes";
        $rsquery=mysqli_query($con,$query) or die ('Error: '.mysqli_error($con));
        while($fquery=mysqli_fetch_array($rsquery)){
            
                $idpac=$fquery['ID_paciente'];
            $iddoc=$fquery['ID_doctor'];
            $querypac="Select * from pacientes Where ID='$idpac'";
            $rsquerypac=mysqli_query($con,$querypac) or die ('Error: '.mysqli_error($con));
            $fquerypac=mysqli_fetch_array($rsquerypac);
            $querydoc="Select * from usuarios Where ID='$iddoc'";
            $rsquerydoc=mysqli_query($con,$querydoc) or die ('Error: '.mysqli_error($con));
            $fquerydoc=mysqli_fetch_array($rsquerydoc);
                ?>
                <div class="card text-dark col-lg-4 col-md-4 col-sm-12 col-12 bg-light mb-3 mr-3" style="max-width: 18rem;">
                   <div class="card-header"><?php echo "Examen de ".$fquery['tipo']; ?></div>
                   <div class="card-body">
                      <h5 class="card-title"><?php echo $fquerypac['nombre']." ".$fquerypac['apellido'];?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?php echo "Cedula: ".$fquerypac['ci'];?></h6>
                      <p class="card-text"><?php echo "Doctor que emitio la solicitud:"." ".$fquerydoc['nombre']." ".$fquerydoc['apellido'];?></p>
                      <?php 
                      $idexamen=$fquery['ID_examen'];
                         if($fquery['estado']=="En espera"){
                             ?>
                             <span class="badge badge-dark">En espera</span>
                             <div class="card-footer">
                             <a href="procesos/retirarsolicitud.php?id=<?php echo $idexamen;?>&location=admin" class="btn btn-outline-danger">Retirar solicitud</a>
                             </div>
                             <?php
                         }elseif($fquery['estado']=="Procesada"){
                            $idlab=$fquery['ID_lab'];
                            $querylab="Select * from usuarios Where ID='$idlab'";
                            $rsquerylab=mysqli_query($con,$querylab) or die ('Error: '.mysqli_error($con));
                            $fquerylab=mysqli_fetch_array($rsquerylab);
                             ?>
                             <p class="card-text"><?php echo "Personal de laboratorio que proceso la solicitud:"." ".$fquerylab['nombre']." ".$fquerylab['apellido'];?></p>
                             <span class="badge badge-success">Procesada exitosamente</span>
                             <div class="card-footer">
                             <a href="procesos/descargarpdf.php?id=<?php echo $idexamen;?>" class="btn btn-outline-success">Descargar PDF</a>
                              </div>
                             <?php
                         }else{
                             ?>
                             <span class="badge badge-danger">Cancelada</span>
                             <div class="card-footer">
                              </div>
                             <?php
                         }
                      ?>

                    </div>
                </div>
                <?php 
                
        }
     ?>

    </div>

    </div>
</div>
</body>
</html>