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
    }if($_GET['ID']){
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
        att11=document.getElementById("att11").value;
        att12=document.getElementById("att12").value;
        att2=document.getElementById("att2").value;
        att21=document.getElementById("att21").value;
        att22=document.getElementById("att22").value;
        att3=document.getElementById("att3").value;
        att31=document.getElementById("att31").value;
        att32=document.getElementById("att32").value;
        att4=document.getElementById("att4").value;
        att41=document.getElementById("att41").value;
        att42=document.getElementById("att42").value;
        att5=document.getElementById("att5").value;
        att51=document.getElementById("att51").value;
        att52=document.getElementById("att52").value;
        att6=document.getElementById("att6").value;
        att61=document.getElementById("att61").value;
        att62=document.getElementById("att62").value;
        att7=document.getElementById("att7").value;
        att71=document.getElementById("att71").value;
        att72=document.getElementById("att72").value;
        att8=document.getElementById("att8").value; 
        att81=document.getElementById("att81").value;
        att82=document.getElementById("att82").value;
        att9=document.getElementById("9").value;
             if(att1==""  || att11=="" || att12=="" || att2=="" || att21=="" || att22 ==""|| att3=="" || att31=="" || att32=="" || att4=="" || att41 =="" || att42=="" || att5=="" || att51=="" || att52=="" || att6 ==""|| att61=="" || att62==""|| att7=="" || att71=="" || att72 =="" || att8=="" || att81=="" || att82==""|| att9==""){
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
    <h2 style="margin-top:3%;margin-bottom:5%;">Ex. de Bioquimica</h2>
    <form name="nuevouser" action="procesos/genpdf.php" method="post">
        
           
            
                 
                 <input type="hidden" name="idexamen" value=<?php echo $idexamen;?>>
                    
    <div class="form-group row">
        <label class="col-4">Glicemia</label>
        <input  type="number" id="att1" name="att1">
        <div class="input-group-text">mg/dl</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-4">Valor de referencia</label>
        <input type="number" id="att11" name="att1-1"><div class="input-group-text">-</div><input type="number" id="att12" name="att1-2">
    </div>
    <div class="form-group row">
        <label class="col-4">Creatinina</label>
        <input type="number" id="att2" name="att2">
        <div class="input-group-text">mg/dl</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-4">Valor de referencia</label>
        <input type="number" id="att21" name="att2-1"><div class="input-group-text">-</div><input  type="number" id="att22" name="att2-2">
    </div>
    <div class="form-group row">
        <label class="col-4">Urea</label>
        <input type="number" id="att3" name="att3">
        <div class="input-group-text">mg/dl</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-4">Valor de referencia</label>
        <input type="number" id="att31" name="att3-1"><div class="input-group-text">-</div><input type="number" id="att32" name="att3-2">
    </div>
    <div class="form-group row">
        <label class="col-4">Colesterol</label>
        <input type="number" id="att4" name="att4">
        <div class="input-group-text">mg/dl</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-4">Valor de referencia</label>
        <input type="number" id="att41" name="att4-1"><div class="input-group-text">-</div><input type="number" id="att42" name="att4-2">
    </div>
    <div class="form-group row">
        <label class="col-4">Trigliceridos</label>
        <input type="number" id="att5" name="att5">
        <div class="input-group-text">mg/dl</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-4">Valor de referencia</label>
        <input type="number" id="att51" name="att5-1"><div class="input-group-text">-</div><input type="number" id="att52" name="att5-2">
    </div> 
    <div class="form-group row">
        <label class="col-4">HDL Colesterol</label>
        <input type="number" id="att6" name="att6">
        <div class="input-group-text">mg/dl</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-4">Valor de referencia</label>
        <input type="number" id="att61" name="att6-1"><div class="input-group-text">-</div><input type="number" id="att62" name="att6-2">
    </div>
    <div class="form-group row">
        <label class="col-4">LDL Colesterol</label>
        <input type="number" id="att7" name="att7">
        <div class="input-group-text">mg/dl</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-4">Valor de referencia</label>
        <input type="number" id="att71" name="att7-1"><div class="input-group-text">-</div><input type="number" id="att72" name="att7-2">
    </div>
    <div class="form-group row">
        <label class="col-4">VLDL Colesterol</label>
        <input type="number" id="att8" name="att8">
        <div class="input-group-text">mg/dl</div>
        <div style="margin-top:2%;" class="col-12"></div>
        <label class="col-4">Valor de referencia</label>
        <input type="number" id="att81" name="att8-1"><div class="input-group-text">-</div><input type="number"  id="att82" name="att8-2">
    </div>
    <div class="form-group">
        <label class="col-4">Relacion Colesterol/HDL</label>
        <input type="number" id="att9" name="att9">
    </div>
                          
                   
                    

         
        
        <button type="submit" name="ingresar" value="bioquimica"   class="btn btn-outline-primary">Completar solicitud</button>
        </form>
        
    </div>
</div>

</body>
</html>