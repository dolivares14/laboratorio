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
 <title>Formulario de exmamen</title>
 <script>
     function validar(){
         
        att1=document.getElementById("att1").value;
        att2=document.getElementById("att2").value;
        att3=document.getElementById("att3").value;
        att4=document.getElementById("att4").value;
        att5=document.getElementById("att5").value;
        att6=document.getElementById("att6").value;
        att1=document.getElementById("att7").value;
        att2=document.getElementById("att8").value;
        att3=document.getElementById("att9").value;
        att4=document.getElementById("att10").value;
        att5=document.getElementById("att11").value;
        att6=document.getElementById("att12").value;
        att1=document.getElementById("att13").value;
        att2=document.getElementById("att141").value;
        att3=document.getElementById("att142").value;
        att4=document.getElementById("att15").value;
        att5=document.getElementById("att161").value;
        att6=document.getElementById("att161").value;
         
             if(att1==""  || att2=="" || att3=="" || att4=="" || att5=="" || att6 ==""|| att7=="" || att8=="" || att9=="" || att10=="" || att11 =="" || att12=="" || att13=="" || att141=="" || att142=="" || att15 ==""|| att161=="" || att162==""){
                 alert("Error, uno o más campos estan vacios");
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
<div class="parallaxad2" style="height:1200px;">
    <div class="container bg-light" style="margin-top:3%;margin-bottom:10%;color:#2a52be;margin-left:8%;margin-right:8%;">
    <h2 style="margin-top:3%;margin-bottom:5%;">Ex. de Orina</h2>
    <form name="nuevouser" action="procesos/genpdf.php" method="post">
        
           
            
                 <h2>Ex. Macroscopico</h2>
                 <input type="hidden" name="idexamen" value=<?php echo $idexamen;?>>
                    
                        <div class="form-group row">
                            <label class="col-4">Volumen</label>
                            <input   type="number" id="att1" name="att1"><div class="input-group-text">cc</div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Color</label>
                            <input  type="text" id="att2" name="att2">
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Aspecto</label>
                            <input type="text" id="att2" name="att3">
                        </div>
                        <h2>Ex. quimico</h2>
                        <div class="form-group row">
                            <label class="col-4">Densidad</label>
                            <input  step="any" id="att4" type="number" name="att4">
                        </div>
                        <div class="form-group row">
                            <label class="col-4">PH</label>
                            <input  type="text" id="att5" name="att5">
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Proteinas</label>
                            <input  type="text" id="att6" name="att6">
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Glucosa</label>
                            <input  type="text" id="att7" name="att7">
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Hemoglobina</label>
                            <input  type="text" id="att8" name="att8">
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Pigmentos Biliares</label>
                            <input  type="text" id="att9" name="att9">
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Cuerpos Cetonicos</label>
                            <input  type="text" id="att10" name="att10">
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Nitritos</label>
                            <input  type="text" id="att11" name="att11">
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Urobilinogeno</label>
                            <input  type="text" id="att12" name="att12">
                        </div>
            
                    <h2>EX. Microscopico</h2>
                    <div class="form-group row">
                        <label class="col-4">CEL. EPIT. PLANAS</label>
                        <input  type="text" id="att13" name="att13">
                    </div>
                    <div class="form-group row">
                        <label class="col-4">Leucolitos</label>
                        <input type="number" id="att141" name="att14-1"><div class="input-group-text">-</div>
                        <input type="number" id="att142" name="att14-2">
                        <div class="input-group-text">x c</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4">Bacterias</label>
                        <input  type="text" id="att15" name="att15">
                    </div>
                    <div class="form-group row">
                        <label class="col-4">Hematies</label>
                        <input  type="number" id="att161" name="att16-1"><div class="input-group-text">-</div>
                        <input type="number" id="att162" name="att16-2">
                        <div class="input-group-text">x c</div>
                    </div>
                          
                   
                    

         
        
        <button type="submit" name="ingresar" value="orina" onclick="return validar()"  class="btn btn-outline-primary">Completar solicitud</button>
        </form>
        
    </div>
</div>
</body>
</html>