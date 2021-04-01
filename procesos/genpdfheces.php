<?php
if(isset($_POST['ingresar'])){
    require 'pasarpdf/vendor/autoload.php';
    use pasarpdf\vendor\spipu\html2pdf\Html2pdf;

    if($_POST['ingresar']=="heces"){
        ob_start();
        require_once 'modeloheces.php';
        $html= ob_get_clean();
    }
}


?>