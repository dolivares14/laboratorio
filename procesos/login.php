<?php
include_once('../conect.php');
session_start();
$user=null;
$passw=null;
if(isset($_POST['btn'])){
    if(isset($_POST['user']) && isset($_POST['passw'])){
        if(!empty($_POST['user']) && !empty($_POST['passw'])){
            $user= $_POST['user'];
            $passw= $_POST['passw'];

            $QUERYLog = "Select * From usuarios Where user='$user' And password='$passw'";
            $rsquerylog = mysqli_query($con,$QUERYLog) or die('Error  '.mysqli_error($con));
            $filequerylog = mysqli_fetch_array($rsquerylog);
            $nfilequerylog = mysqli_num_rows($rsquerylog);
            if($nfilequerylog>0){
                $_SESSION['iddoc']=$filequerylog['ID'];
                $_SESSION['user'] = $filequerylog['user'];
                $_SESSION['nombre'] = $filequerylog['nombre'].' '.$filequerylog['apellido'];
                $_SESSION['clase'] = $filequerylog['clase'];
                if($_SESSION['clase']=='admin'){
                    header('Location: ../adminmenu.php');
                }elseif($_SESSION['clase']=='Doctor'){
                    header('Location: ../principal.php');
                }else{
                    header('Location: ../labmenu.php');
                }
            }else{
                header('Location: ../index.html');
            }
        }else{
            header('Location: ../index.html');
        }
    }else{
        header('Location: ../index.html');

    }
}



?>