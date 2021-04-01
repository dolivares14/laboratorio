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
 <link rel="stylesheet" type="text/css" href=css/main.css>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Nueva Solicitud</title>
 <script>
     window.onload=function(){
        seleccion = document.getElementById('sel');
        seleccion.addEventListener("change",rellenarcampos);
     }
     function rellenarcampos(){
        sel = document.getElementById('sel');
        idpaciente=sel.options[sel.selectedIndex].value;
         if(idpaciente<=0){
             document.getElementById("nombre").value="";
             document.getElementById("idpaciente").value="";
             document.getElementById("apellido").value="";
             document.getElementById("email").value="";
             document.getElementById("telf").value="";
             document.getElementById("ci").value="";
             document.getElementById("edad").value="";
             document.getElementById("direccion").value="";
             document.getElementById("nombre").disabled=false;
             document.getElementById("apellido").disabled=false;
             document.getElementById("email").disabled=false;
             document.getElementById("telf").disabled=false;
             document.getElementById("ci").disabled=false;
             document.getElementById("edad").disabled=false;
             document.getElementById("direccion").disabled=false;  
         }else{
             var valores={
                 "idpaciente":idpaciente
             };
             $.ajax({
                    url:"procesos/rellenarcampos.php",
                    type: "post",
                    data: valores,

                    beforeSend: function() {
                        
                    },
                    fail: function() {
                        
                    },
                    success: function(datos) {
                    datos= JSON.parse(datos);
                    document.getElementById("idpaciente").value=datos[0];
                    document.getElementById("nombre").value=datos[1];
                    document.getElementById("apellido").value=datos[2];
                    document.getElementById("email").value=datos[6];
                    document.getElementById("telf").value=datos[4];
                    document.getElementById("ci").value=datos[5];
                    document.getElementById("edad").value=datos[7];
                    document.getElementById("direccion").value=datos[3];
                    document.getElementById("nombre").disabled=true;
                    document.getElementById("apellido").disabled=true;
                    document.getElementById("email").disabled=true;
                    document.getElementById("telf").disabled=true;
                    document.getElementById("ci").disabled=true;
                    document.getElementById("edad").disabled=true;
                    document.getElementById("direccion").disabled=true;             
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
         }
     }
     
     function validar(){
         
        nom=document.getElementById("nombre").value;
        ape=document.getElementById("apellido").value;
        email=document.getElementById("email").value;
        telf=document.getElementById("telf").value;
        ci=document.getElementById("ci").value;
        edad=document.getElementById("edad").value;
        dir=document.getElementById("direccion").value;
        op1=document.getElementById("op1").checked;
        op2=document.getElementById("op2").checked;
        op3=document.getElementById("op3").checked;
        op4=document.getElementById("op4").checked;
            if(nom==""  || ape=="" || email=="" || telf=="" || ci=="" || edad =="" || dir=="" ){
                alert("Error, uno o más campos estan vacios");
                return false;
            }else if(ci<1000000 ||edad<=0){
                alert("Ingrese unos valores validos para los campos cedula o edad");
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
            }else if(!op1 && !op2 && !op3 && !op4){
                alert("Error seleccione por lo menos un examen a realizar");
                return false;
            }
        
    }
 </script>
</head>
<body>
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
<div class="parallaxdoc2">
    
    
    <div class="container " style="opacity: 0.8;background-color: white;color:#2a52be;margin-top:5%;margin-bottom:3%;padding-bottom:3%;padding-right:3%;text-align:center;">
    <h2 style="margin-top:5%;margin-bottom:3%;">Ingrese los datos</h2>  
    <select id="sel" class="form-control border-primary" style="width:200px;margin-top:5%;margin-bottom:5%">
        <option value="0">Nuevo registro</option>
        <?php
        $query="Select * from pacientes";
        $rsquery=mysqli_query($con,$query) or die ('Error: '.mysqli_error($con));
        while($fquery=mysqli_fetch_array($rsquery)){
        ?>
        <option  value="<?php echo $fquery['ID']; ?>"><?php echo $fquery['nombre']." ".$fquery['apellido']." C.I: ".$fquery['ci'];?></option>
        <?php
        }
        mysqli_close($con);
        ?>
       </select>
       <h3 style="margin-bottom:3%">Datos del paciente</h3>
     <form name="form1" action="procesos/gensolicitud.php" method="post">
     <div class="row" style="text-align:right;">
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <input class="border-primary" type="hidden" id="idpaciente" name="idpaciente" value="">
             
             <div class="form-group">
                  <label>Nombre</label>
                  <input class="border-primary" type="text" id="nombre" name="nombre">
             </div>
             <div class="form-group">
                    <label>Apellido</label>
                    <input class="border-primary" type="text" id="apellido" name="apellido">
              </div>
              <div class="form-group">
                        <label>Correo Electronico</label>
                       <input class="border-primary" type="email" id="email" name="email">
               </div>
               <div class="form-group">
                    <label>Telefono</label>
                    <input class="border-primary" type="tel" id="telf" name="telf">
               </div>
               <div class="form-group">
                       <label>Cedula</label>
                    <input class="border-primary" type="number" id="ci" name="ci">
                </div>
               <div class="form-group">
                    <label>Edad</label>
                    <input class="border-primary" type="number" id="edad" name="edad">
                </div>
                
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
           <div class="form-group">
                 <label>Dirección</label>
                 <textarea class="border-primary" style="width:200px;height:150px;" id="direccion" name="direccion"></textarea>  
           </div>  
           <div class="form-check">
                <h3>Examenes a realizar</h3>
                <input  class="form-check-input border-primary" type="checkbox" id="op1" name="op1" value="heces">
                <label class="form-check-label" for="op1">Examen parasitario de heces</label>
                <br />
                <input class="form-check-input border-primary" type="checkbox" id="op2" name="op2" value="sangre">
                <label class="form-check-label " for="op2">Hematologia</label>
                <br />
                <input class="form-check-input border-primary" type="checkbox" id="op3" name="op3" value="orina">
                <label class="form-check-label" for="op3">Examen de orina</label>    
                <br />
                <input class="form-check-input border-primary" type="checkbox" id="op4" name="op4" value="orina">
                <label class="form-check-label" for="op3">Bioquimica</label>
            </div>
        </div>
        <button type="submit" style="margin-left:40%;" name="registrar" value="registrar" onclick="return validar()" class="btn btn-outline-primary">Registrar solicitud</button>
        
        
    </div>
    </form>   
    

    </div>
</div>
</body>
</html>