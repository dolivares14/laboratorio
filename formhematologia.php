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
 <title>Formulario de examenes</title>
 <script>
     function validar(){
         
        att1=document.getElementById("att1").value;
        att2=document.getElementById("att2").value;
        att3=document.getElementById("att3").value;
        att31=document.getElementById("att31").value;
        att32=document.getElementById("att32").value;
        att4=document.getElementById("att4").value;
        att5=document.getElementById("att5").value;
        att6=document.getElementById("att6").value;
        att7=document.getElementById("att7").value;
        att8=document.getElementById("att8").value;
        att81=document.getElementById("att81").value;
        att82=document.getElementById("att82").value;
        att9=document.getElementById("att9").value;
        att91=document.getElementById("att91").value;
        att92=document.getElementById("att92").value;
        att10=document.getElementById("att10").value;
        att101=document.getElementById("att101").value;
        att102=document.getElementById("att102").value;
        att11=document.getElementById("att11").value;
        att111=document.getElementById("att111").value;
        att112=document.getElementById("att112").value;
        att12=document.getElementById("att12").value; 
        att121=document.getElementById("att121").value;
        att122=document.getElementById("att122").value;
             if(att1==""  || att2=="" || att3=="" || att31=="" || att32=="" || att4 ==""|| att5=="" || att6=="" || att7=="" || att8=="" || att81 =="" || att82=="" || att9=="" || att91=="" || att92=="" || att10 ==""|| att101=="" || att102==""|| att11=="" || att111=="" || att112 =="" || att12=="" || att121=="" || att122==""){
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
<div class="parallaxad2" style="height:1400px;">
    <div class="container bg-light" style="margin-top:3%;margin-bottom:10%;color:#2a52be;margin-left:8%;margin-right:8%;">
    <h2 style="margin-top:3%;margin-bottom:5%;">Ex. de Hematologia</h2>
    <form name="nuevouser" action="procesos/genpdf.php" method="post">
        
           
            
                 
                 <input type="hidden" name="idexamen" value=<?php echo $idexamen;?>>
                    
    <div class="form-group row">
        <label class="col-4">Hemoglobina</label>
        <input type="number" step="any" id="att1" name="att1">
    </div>
    <div class="form-group row">
        <label class="col-4">Hematocrito</label>
        <input  type="number" id="att2" name="att2">
        <div class="input-group-text">%</div>
    </div>
    <div class="form-group row">
        <label  class="col-3">Contaje de globulos blancos</label>
        <input  step="any" type="number" id="att3" name="att3">
        <div class="input-group-text">x mm3</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label  class="col-3">Valor de referencia</label>
        <input step="any" type="number" id="att31" name="att3-1"><div class="input-group-text">-</div><input step="any" type="number" id="att32" name="att3-2">
    </div>
    <h2>Formula Leucocitaria</h2>
    <div class="form-group row">
        <label class="col-4">SEG.</label>
        <input  type="number" id="att4" name="att4">
        <div class="input-group-text">%</div>
    </div>
    <div class="form-group row">
        <label class="col-4">LINF.</label>
        <input type="number" id="att5" name="att5">
        <div class="input-group-text">%</div>
    </div>
    <div class="form-group row">
        <label class="col-4">EOS.</label>
        <input type="number" id="att6" name="att6">
        <div class="input-group-text">%</div>
    </div>  
    <div class="form-group row">
        <label class="col-4">Total Celulas</label>
        <input type="number" id="att7" name="att7">
        <div class="input-group-text">%</div>
    </div>
    <div class="form-group row">
        <label class="col-3">Contaje de Plaquetas</label>
        <input type="number" step="any" id="att8" name="att8"><div class="input-group-text">mm3</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-3">Valor de referencia</label>
        <input type="number" step="any" id="att81" name="att8-1"><div class="input-group-text">-</div><input step="any" type="number" id="att82" name="att8-2">
    </div>
    <h2>Otros Parametros</h2>
    <div class="form-group row">
        <label class="col-3">RBC</label>
        <input step="any" type="number" id="att9" name="att9">
        <div class="input-group-text">x mm3</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-3">Valor de referencia</label>
        <input step="any" type="number" id="att91"  name="att9-1"><div class="input-group-text">-</div><input step="any" type="number" id="att92" name="att9-2">
    </div>
    <div class="form-group row">
        <label class="col-3">MCV</label>
        <input type="number" id="att10" name="att10">    
        <div class="input-group-text">fL</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-3">Valor de referencia</label>
        <input type="number" id="att101" name="att10-1"><div class="input-group-text">-</div><input type="number" id="att102" name="att10-2">
    </div>
    <div class="form-group row">
        <label class="col-3">MCH</label>
        <input step="any" type="number" id="att11" name="att11">
        <div class="input-group-text">pg</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-3">Valor de referencia</label>
        <input type="number" id="att111" name="att11-1"><div class="input-group-text">-</div><input type="number" id="att112" name="att11-2">
    </div>
    <div class="form-group row">
        <label class="col-3">MCHC</label>
        <input step="any" type="number" id="att12" name="att12">
        <div class="input-group-text">g/dL</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-3">Valor de referencia</label>
        <input type="number" id="att121" name="att12-1"><div class="input-group-text">-</div><input type="number" id="att122" name="att12-2">
    </div>
                          
                   
                    

         
        
        <button type="submit" name="ingresar" value="hematologia" onclick="return validar()"  class="btn btn-outline-primary">Completar solicitud</button>
        </form>
        
    </div>
</div>

</body>
</html>