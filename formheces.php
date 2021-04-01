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
    }elseif($_SESSION['clase']!='Laboratorio'){
        header('Location: index.html');
    }
    if($_GET['ID']){
        $idexamen=$_GET['ID'];
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
 <title>Formulario de examen</title>
 <script>
     function validar(){
         
        att1=document.getElementById("att1").value;
        att2=document.getElementById("att2").value;
        att3=document.getElementById("att3").value;
        att4=document.getElementById("att4").value;
        att5=document.getElementById("att5").value;
        att6=document.getElementById("att6").value;
         
             if(att1==""  || att2=="" || att3=="" || att4=="" || att5=="" || att6 =="" ){
                 alert("Error, uno o más campos estan vacios");
                 return false;
             }else if(att1.length<4||att2.length<4||att3.length<4||att4.length<4||att5.length<4||att6.length<4){
                 alert("El largo de los atributos en cada campo no puede ser menor a 4 caracteres");
                  return false;
             }else if(att1.length>10||att2.length>10||att3.length>10||att4.length>10||att5.length>10||att6.length>30){
                 alert("El largo de los atributos en alguno de los campos es demasiado largo, por favor revise");
                 return false;
             }else{
                 return true;
             }
         
     }
 </script>
</head>
<body>
<nav class="navbar sticky-top navbar-dark" style="background-color: #2a52be;">
            <a class="navbar-brand" href="labmenu.php">
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
                    <a class="nav-link text-light" href="labmenu.php">Menu principal</a>
                    <a class="nav-link text-light" href="prosolicitud.php">Procesar solicitudes</a>
                    <a class="nav-link text-light" href="lexamlab.php">Historial de solicitudes</a>
                </div>
            </div>
</nav>
<div class="parallaxad2">
    <div class="container bg-light" style="margin-top:3%;margin-bottom:10%;color:#2a52be;margin-left:8%;margin-right:8%;">
    <h2 style="margin-top:3%;margin-bottom:5%;">Ex. Heces Directo</h2>
    <form name="nuevouser" action="procesos/genpdf.php" method="post">
        <div class="row" style="text-align:right;">
           
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                 <h2>Ex. Macroscopico</h2>
                 <input type="hidden" name="idexamen" value=<?php echo $idexamen;?>>
                    
                        <div class="form-group">
                            <label>Aspecto</label>
                            <input type="text" id="att1" name="att1">
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" id="att2" name="att2">
                        </div>
                        <div class="form-group">
                            <label>Consistencia</label>
                            <input type="text" id="att3" name="att3">
                        </div>
                        <div class="form-group">
                            <label>Olor</label>
                            <input type="text" id="att4" name="att4">
                        </div>
                        <div class="form-group">
                            <label>Reaccion</label>
                            <input type="tel" id="att5" name="att5">
                        </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h2>EX. Microscopico</h2>
                    <div class="form-group">
                        <label>Observaciones adicionales</label>
                        <textarea style="width:200px;height:150px;" id="att6" name="att6"></textarea>
                    </div>
                          
                   
                    

            </div>
         
        </div>
        <button type="submit" name="ingresar" value="heces" onclick="return validar()"  class="btn btn-outline-primary">Completar solicitud</button>
        </form>
        
    </div>
</div>

</body>
</html>